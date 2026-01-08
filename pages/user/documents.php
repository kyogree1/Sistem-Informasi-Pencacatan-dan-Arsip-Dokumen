<?php
session_start();
require_once '../../config/config.php';
require_once '../../config/database.php';
require_once '../../includes/functions.php';

// Check if user is logged in
if (!isLoggedIn()) {
    redirect('../../index.php');
}

$db = new Database();
$conn = $db->getConnection();

// Get all active documents
$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';

$query = "SELECT d.*, c.name as category_name, u.full_name as uploaded_by_name 
          FROM documents d 
          LEFT JOIN categories c ON d.category_id = c.id 
          LEFT JOIN users u ON d.uploaded_by = u.id 
          WHERE d.status = 'active'";

if (!empty($search)) {
    $query .= " AND (d.title LIKE '%$search%' OR d.document_number LIKE '%$search%' OR d.keywords LIKE '%$search%')";
}

if (!empty($categoryFilter)) {
    $query .= " AND d.category_id = $categoryFilter";
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
    <title>Dokumen - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2><?php echo APP_NAME; ?></h2>
                <p>User</p>
            </div>
            <ul class="sidebar-menu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="documents.php" class="active">Dokumen</a></li>
                <li><a href="../../logout.php">Logout</a></li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="content-header">
                <h1>Daftar Dokumen</h1>
                <p>Cari dan lihat dokumen arsip</p>
            </div>
            
            <!-- Search and Filter -->
            <div class="card">
                <div class="card-header">
                    <h3>Pencarian Dokumen</h3>
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
                                            <a href="../admin/view_document.php?id=<?php echo $doc['id']; ?>" class="btn btn-info btn-sm">Lihat</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada dokumen ditemukan</td>
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
