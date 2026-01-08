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

// Get report period
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01');
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');

// Get document statistics
$stmt = $conn->prepare("SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN status = 'active' THEN 1 ELSE 0 END) as active,
    SUM(CASE WHEN status = 'archived' THEN 1 ELSE 0 END) as archived,
    SUM(file_size) as total_size
    FROM documents 
    WHERE upload_date BETWEEN ? AND ?");
$stmt->execute([$startDate, $endDate]);
$stats = $stmt->fetch(PDO::FETCH_ASSOC);

// Get documents by category
$stmt = $conn->prepare("SELECT c.name, COUNT(d.id) as count 
    FROM categories c 
    LEFT JOIN documents d ON c.id = d.category_id AND d.upload_date BETWEEN ? AND ?
    GROUP BY c.id, c.name
    ORDER BY count DESC");
$stmt->execute([$startDate, $endDate]);
$byCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get most active users
$stmt = $conn->prepare("SELECT u.full_name, COUNT(d.id) as count 
    FROM users u 
    LEFT JOIN documents d ON u.id = d.uploaded_by AND d.upload_date BETWEEN ? AND ?
    GROUP BY u.id, u.full_name
    ORDER BY count DESC
    LIMIT 10");
$stmt->execute([$startDate, $endDate]);
$activeUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get activity log
$stmt = $conn->prepare("SELECT dal.*, d.title as document_title, u.full_name as user_name
    FROM document_access_log dal
    LEFT JOIN documents d ON dal.document_id = d.id
    LEFT JOIN users u ON dal.user_id = u.id
    WHERE dal.access_time BETWEEN ? AND ?
    ORDER BY dal.access_time DESC
    LIMIT 50");
$stmt->execute([$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
$activityLog = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - <?php echo APP_NAME; ?></title>
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
                <li><a href="documents.php">Kelola Dokumen</a></li>
                <li><a href="categories.php">Kategori</a></li>
                <li><a href="users.php">Kelola User</a></li>
                <li><a href="reports.php" class="active">Laporan</a></li>
                <li><a href="../../logout.php">Logout</a></li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="content-header">
                <h1>Laporan Sistem</h1>
                <p>Statistik dan aktivitas sistem</p>
            </div>
            
            <!-- Date Filter -->
            <div class="card">
                <div class="card-header">
                    <h3>Filter Periode</h3>
                </div>
                <form method="GET" class="search-filter">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="start_date" value="<?php echo $startDate; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="end_date" value="<?php echo $endDate; ?>" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </form>
            </div>
            
            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3><?php echo $stats['total']; ?></h3>
                    <p>Total Dokumen</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo $stats['active']; ?></h3>
                    <p>Dokumen Aktif</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo $stats['archived']; ?></h3>
                    <p>Dokumen Diarsipkan</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo formatFileSize($stats['total_size']); ?></h3>
                    <p>Total Ukuran File</p>
                </div>
            </div>
            
            <!-- Documents by Category -->
            <div class="card">
                <div class="card-header">
                    <h3>Dokumen per Kategori</h3>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Jumlah Dokumen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($byCategory as $cat): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($cat['name']); ?></td>
                                    <td><?php echo $cat['count']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Most Active Users -->
            <div class="card mt-20">
                <div class="card-header">
                    <h3>User Paling Aktif</h3>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Jumlah Upload</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activeUsers as $user): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                                    <td><?php echo $user['count']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Activity Log -->
            <div class="card mt-20">
                <div class="card-header">
                    <h3>Log Aktivitas (50 Terakhir)</h3>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>User</th>
                                <th>Dokumen</th>
                                <th>Aktivitas</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activityLog as $log): ?>
                                <tr>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($log['access_time'])); ?></td>
                                    <td><?php echo htmlspecialchars($log['user_name'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($log['document_title'] ?? '-'); ?></td>
                                    <td><?php echo ucfirst($log['access_type']); ?></td>
                                    <td><?php echo htmlspecialchars($log['ip_address']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
