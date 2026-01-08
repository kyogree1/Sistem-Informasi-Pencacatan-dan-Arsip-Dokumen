<?php
session_start();
require_once '../../config/config.php';
require_once '../../config/database.php';
require_once '../../includes/functions.php';

// Check if user is logged in and is admin
if (!isLoggedIn() || !isAdmin()) {
    redirect('../../index.php');
}

$db = new Database();
$conn = $db->getConnection();

$message = '';
$error = '';

// Handle document upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])) {
    $title = sanitize($_POST['title']);
    $description = sanitize($_POST['description']);
    $categoryId = $_POST['category_id'];
    $keywords = sanitize($_POST['keywords']);
    
    if (empty($title)) {
        $error = 'Judul dokumen harus diisi';
    } elseif (!isset($_FILES['document'])) {
        $error = 'File dokumen harus dipilih';
    } else {
        $fileErrors = validateFile($_FILES['document']);
        
        if (!empty($fileErrors)) {
            $error = implode('<br>', $fileErrors);
        } else {
            $file = $_FILES['document'];
            $fileName = $file['name'];
            $fileSize = $file['size'];
            $fileExt = getFileExtension($fileName);
            $documentNumber = generateDocumentNumber();
            
            // Generate unique file name
            $newFileName = $documentNumber . '.' . $fileExt;
            $filePath = UPLOAD_PATH . $newFileName;
            
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $stmt = $conn->prepare("INSERT INTO documents (document_number, title, description, category_id, file_name, file_path, file_size, file_type, uploaded_by, keywords) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if ($stmt->execute([$documentNumber, $title, $description, $categoryId, $fileName, $filePath, $fileSize, $fileExt, $_SESSION['user_id'], $keywords])) {
                    $message = 'Dokumen berhasil diupload';
                } else {
                    $error = 'Gagal menyimpan data dokumen';
                    unlink($filePath);
                }
            } else {
                $error = 'Gagal mengupload file';
            }
        }
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("SELECT file_path FROM documents WHERE id = ?");
    $stmt->execute([$id]);
    $doc = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($doc) {
        if (file_exists($doc['file_path'])) {
            unlink($doc['file_path']);
        }
        $stmt = $conn->prepare("DELETE FROM documents WHERE id = ?");
        if ($stmt->execute([$id])) {
            $message = 'Dokumen berhasil dihapus';
        }
    }
}

// Handle archive
if (isset($_GET['archive'])) {
    $id = $_GET['archive'];
    $stmt = $conn->prepare("UPDATE documents SET status = 'archived', archived_date = NOW() WHERE id = ?");
    if ($stmt->execute([$id])) {
        $message = 'Dokumen berhasil diarsipkan';
    }
}

// Get all documents
$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$statusFilter = isset($_GET['status']) ? $_GET['status'] : '';

$query = "SELECT d.*, c.name as category_name, u.full_name as uploaded_by_name 
          FROM documents d 
          LEFT JOIN categories c ON d.category_id = c.id 
          LEFT JOIN users u ON d.uploaded_by = u.id 
          WHERE 1=1";

if (!empty($search)) {
    $query .= " AND (d.title LIKE '%$search%' OR d.document_number LIKE '%$search%' OR d.keywords LIKE '%$search%')";
}

if (!empty($categoryFilter)) {
    $query .= " AND d.category_id = $categoryFilter";
}

if (!empty($statusFilter)) {
    $query .= " AND d.status = '$statusFilter'";
}

$query .= " ORDER BY d.upload_date DESC";

$stmt = $conn->query($query);
$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get categories for dropdown
$stmt = $conn->query("SELECT * FROM categories ORDER BY name");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Dokumen - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2><?php echo APP_NAME; ?></h2>
                <p>Administrator</p>
            </div>
            <ul class="sidebar-menu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="documents.php" class="active">Kelola Dokumen</a></li>
                <li><a href="categories.php">Kategori</a></li>
                <li><a href="users.php">Kelola User</a></li>
                <li><a href="reports.php">Laporan</a></li>
                <li><a href="../../logout.php">Logout</a></li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="content-header">
                <h1>Kelola Dokumen</h1>
                <p>Upload dan kelola dokumen arsip</p>
            </div>
            
            <?php if ($message): ?>
                <div class="alert alert-success"><?php echo $message; ?></div>
            <?php endif; ?>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <!-- Upload Form -->
            <div class="card">
                <div class="card-header">
                    <h3>Upload Dokumen Baru</h3>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Judul Dokumen *</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="keywords">Kata Kunci (pisahkan dengan koma)</label>
                        <input type="text" id="keywords" name="keywords" class="form-control" placeholder="contoh: surat, pengumuman, 2024">
                    </div>
                    
                    <div class="form-group">
                        <label for="document">File Dokumen *</label>
                        <input type="file" id="document" name="document" class="form-control" required>
                        <small>Tipe file yang diperbolehkan: <?php echo implode(', ', ALLOWED_EXTENSIONS); ?>. Maksimal <?php echo formatFileSize(MAX_FILE_SIZE); ?></small>
                    </div>
                    
                    <button type="submit" name="upload" class="btn btn-primary">Upload Dokumen</button>
                </form>
            </div>
            
            <!-- Search and Filter -->
            <div class="card mt-20">
                <div class="card-header">
                    <h3>Daftar Dokumen</h3>
                </div>
                
                <form method="GET" class="search-filter">
                    <input type="text" name="search" placeholder="Cari dokumen..." value="<?php echo htmlspecialchars($search); ?>">
                    
                    <select name="category">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat['id']; ?>" <?php echo $categoryFilter == $cat['id'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    
                    <select name="status">
                        <option value="">Semua Status</option>
                        <option value="active" <?php echo $statusFilter === 'active' ? 'selected' : ''; ?>>Aktif</option>
                        <option value="archived" <?php echo $statusFilter === 'archived' ? 'selected' : ''; ?>>Diarsipkan</option>
                    </select>
                    
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No. Dokumen</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Ukuran</th>
                                <th>Tanggal Upload</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($documents)): ?>
                                <?php foreach ($documents as $doc): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($doc['document_number']); ?></td>
                                        <td><?php echo htmlspecialchars($doc['title']); ?></td>
                                        <td><?php echo htmlspecialchars($doc['category_name'] ?? '-'); ?></td>
                                        <td><?php echo formatFileSize($doc['file_size']); ?></td>
                                        <td><?php echo formatDateIndo($doc['upload_date']); ?></td>
                                        <td>
                                            <?php if ($doc['status'] === 'active'): ?>
                                                <span style="color: green;">Aktif</span>
                                            <?php else: ?>
                                                <span style="color: orange;">Diarsipkan</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="view_document.php?id=<?php echo $doc['id']; ?>" class="btn btn-info btn-sm">Lihat</a>
                                            <?php if ($doc['status'] === 'active'): ?>
                                                <a href="?archive=<?php echo $doc['id']; ?>" class="btn btn-warning btn-sm" onclick="return confirm('Arsipkan dokumen ini?')">Arsipkan</a>
                                            <?php endif; ?>
                                            <a href="?delete=<?php echo $doc['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus dokumen ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada dokumen</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
