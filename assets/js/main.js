/**
 * JavaScript functions for Sistem Arsip Dokumen
 */

// Confirmation dialogs
function confirmDelete(message) {
    return confirm(message || 'Apakah Anda yakin ingin menghapus data ini?');
}

function confirmArchive(message) {
    return confirm(message || 'Apakah Anda yakin ingin mengarsipkan dokumen ini?');
}

// Form validation
function validateFileUpload(input, maxSize) {
    const file = input.files[0];
    if (!file) {
        return true;
    }
    
    if (file.size > maxSize) {
        alert('Ukuran file terlalu besar! Maksimal ' + formatBytes(maxSize));
        input.value = '';
        return false;
    }
    
    return true;
}

// Format bytes to readable size
function formatBytes(bytes) {
    if (bytes === 0) return '0 Bytes';
    
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    
    return Math.round((bytes / Math.pow(k, i)) * 100) / 100 + ' ' + sizes[i];
}

// Show/hide loading indicator
function showLoading() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.style.display = 'block';
    }
}

function hideLoading() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.style.display = 'none';
    }
}

// Auto-hide alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.style.display = 'none';
            }, 500);
        }, 5000);
    });
});
