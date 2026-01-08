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

if (!isset($_GET['id'])) {
    redirect(isAdmin() ? 'documents.php' : '../user/documents.php');
}

$id = $_GET['id'];

// Get document details
$stmt = $conn->prepare("SELECT d.*, c.name as category_name, u.full_name as uploaded_by_name 
                        FROM documents d 
                        LEFT JOIN categories c ON d.category_id = c.id 
                        LEFT JOIN users u ON d.uploaded_by = u.id 
                        WHERE d.id = ?");
$stmt->execute([$id]);
$document = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$document) {
    redirect(isAdmin() ? 'documents.php' : '../user/documents.php');
}

// Log the view
logActivity($conn, $id, $_SESSION['user_id'], 'view', getClientIP());

// Handle download
if (isset($_GET['download'])) {
    if (file_exists($document['file_path'])) {
        logActivity($conn, $id, $_SESSION['user_id'], 'download', getClientIP());
        
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $document['file_name'] . '"');
        header('Content-Length: ' . filesize($document['file_path']));
        readfile($document['file_path']);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokumen - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2><?php echo APP_NAME; ?></h2>
                <p><?php echo isAdmin() ? 'Administrator' : 'User'; ?></p>
            </div>
            <ul class="sidebar-menu">
                <li><a href="<?php echo isAdmin() ? 'dashboard.php' : '../user/dashboard.php'; ?>">Dashboard</a></li>
                <li><a href="<?php echo isAdmin() ? 'documents.php' : '../user/documents.php'; ?>" class="active">Kelola Dokumen</a></li>
                <?php if (isAdmin()): ?>
                    <li><a href="categories.php">Kategori</a></li>
                    <li><a href="users.php">Kelola User</a></li>
                    <li><a href="reports.php">Laporan</a></li>
                <?php endif; ?>
                <li><a href="../../logout.php">Logout</a></li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="content-header">
                <h1>Detail Dokumen</h1>
                <p>Informasi lengkap dokumen</p>
            </div>
            
            <div class="card">
                <div class="card-header flex justify-between align-center">
                    <h3><?php echo htmlspecialchars($document['title']); ?></h3>
                    <div>
                        <a href="?id=<?php echo $id; ?>&download=1" class="btn btn-success btn-sm">Download</a>
                        <a href="<?php echo isAdmin() ? 'documents.php' : '../user/documents.php'; ?>" class="btn btn-info btn-sm">Kembali</a>
                    </div>
                </div>
                
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Nomor Dokumen</td>
                        <td style="padding: 10px;"><?php echo htmlspecialchars($document['document_number']); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Judul</td>
                        <td style="padding: 10px;"><?php echo htmlspecialchars($document['title']); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Deskripsi</td>
                        <td style="padding: 10px;"><?php echo htmlspecialchars($document['description'] ?? '-'); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Kategori</td>
                        <td style="padding: 10px;"><?php echo htmlspecialchars($document['category_name'] ?? '-'); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Nama File</td>
                        <td style="padding: 10px;"><?php echo htmlspecialchars($document['file_name']); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Ukuran File</td>
                        <td style="padding: 10px;"><?php echo formatFileSize($document['file_size']); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Tipe File</td>
                        <td style="padding: 10px;"><?php echo strtoupper($document['file_type']); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Kata Kunci</td>
                        <td style="padding: 10px;"><?php echo htmlspecialchars($document['keywords'] ?? '-'); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Diupload Oleh</td>
                        <td style="padding: 10px;"><?php echo htmlspecialchars($document['uploaded_by_name'] ?? '-'); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Tanggal Upload</td>
                        <td style="padding: 10px;"><?php echo formatDateIndo($document['upload_date']); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 200px; font-weight: bold; padding: 10px;">Status</td>
                        <td style="padding: 10px;">
                            <?php if ($document['status'] === 'active'): ?>
                                <span style="color: green; font-weight: bold;">Aktif</span>
                            <?php else: ?>
                                <span style="color: orange; font-weight: bold;">Diarsipkan</span>
                                <?php if ($document['archived_date']): ?>
                                    <br><small>Diarsipkan pada: <?php echo formatDateIndo($document['archived_date']); ?></small>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
