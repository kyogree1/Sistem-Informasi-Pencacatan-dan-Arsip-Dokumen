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

// Get statistics
$totalDocuments = 0;
$myDocuments = 0;
$recentDocuments = [];

if ($conn) {
    // Total documents
    $stmt = $conn->query("SELECT COUNT(*) as total FROM documents WHERE status = 'active'");
    $totalDocuments = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // My documents
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM documents WHERE uploaded_by = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $myDocuments = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Recent documents
    $stmt = $conn->prepare("SELECT d.*, c.name as category_name 
                           FROM documents d 
                           LEFT JOIN categories c ON d.category_id = c.id 
                           WHERE d.status = 'active'
                           ORDER BY d.upload_date DESC LIMIT 10");
    $stmt->execute();
    $recentDocuments = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - <?php echo APP_NAME; ?></title>
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
                <li><a href="dashboard.php" class="active">Dashboard</a></li>
                <li><a href="documents.php">Dokumen</a></li>
                <li><a href="../../logout.php">Logout</a></li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="content-header">
                <h1>Dashboard</h1>
                <p>Selamat datang, <?php echo $_SESSION['full_name']; ?></p>
            </div>
            
            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3><?php echo $totalDocuments; ?></h3>
                    <p>Total Dokumen Aktif</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo $myDocuments; ?></h3>
                    <p>Dokumen Saya</p>
                </div>
            </div>
            
            <!-- Recent Documents -->
            <div class="card">
                <div class="card-header">
                    <h3>Dokumen Terbaru</h3>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No. Dokumen</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recentDocuments)): ?>
                                <?php foreach ($recentDocuments as $doc): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($doc['document_number']); ?></td>
                                        <td><?php echo htmlspecialchars($doc['title']); ?></td>
                                        <td><?php echo htmlspecialchars($doc['category_name'] ?? '-'); ?></td>
                                        <td><?php echo formatDateIndo($doc['upload_date']); ?></td>
                                        <td>
                                            <a href="../admin/view_document.php?id=<?php echo $doc['id']; ?>" class="btn btn-info btn-sm">Lihat</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada dokumen</td>
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
