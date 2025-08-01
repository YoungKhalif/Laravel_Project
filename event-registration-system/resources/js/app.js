import './bootstrap';
<<<<<<< HEAD
=======
import 'bootstrap';
import { Chart, registerables } from 'chart.js';

// Register Chart.js components
Chart.register(...registerables);

// Global app initialization
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize popovers
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            if (alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    });

    // Event search functionality
    const searchInput = document.getElementById('eventSearch');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const eventCards = document.querySelectorAll('.event-card');
            
            eventCards.forEach(function(card) {
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                const description = card.querySelector('.card-text').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }

    // Form validation
    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });

    // Copy to clipboard functionality
    const copyButtons = document.querySelectorAll('.copy-btn');
    copyButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const target = document.querySelector(this.dataset.target);
            if (target) {
                navigator.clipboard.writeText(target.textContent).then(function() {
                    button.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
                    setTimeout(function() {
                        button.innerHTML = '<i class="fas fa-copy me-2"></i>Copy';
                    }, 2000);
                });
            }
        });
    });

    // QR Code scanner functionality
    const scannerElement = document.getElementById('qr-scanner');
    if (scannerElement) {
        initQRScanner();
    }

    // Real-time notifications
    initNotifications();
});

// QR Scanner initialization
function initQRScanner() {
    // This would integrate with a QR scanning library
    console.log('QR Scanner initialized');
}

// Notification system
function initNotifications() {
    // Check for new notifications every 30 seconds
    setInterval(function() {
        fetch('/api/notifications/check')
            .then(response => response.json())
            .then(data => {
                if (data.count > 0) {
                    updateNotificationBadge(data.count);
                }
            })
            .catch(error => console.log('Notification check failed:', error));
    }, 30000);
}

function updateNotificationBadge(count) {
    const badge = document.querySelector('.notification-badge');
    if (badge) {
        badge.textContent = count;
        badge.style.display = count > 0 ? 'inline' : 'none';
    }
}

// Chart utilities
window.createChart = function(ctx, config) {
    return new Chart(ctx, config);
};

// Export functions for global use
window.showAlert = function(message, type = 'info') {
    const alertContainer = document.getElementById('alert-container') || document.body;
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible fade show`;
    alert.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    alertContainer.appendChild(alert);
    
    setTimeout(function() {
        if (alert.parentNode) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 5000);
};

// Loading overlay
window.showLoading = function() {
    const overlay = document.createElement('div');
    overlay.id = 'loading-overlay';
    overlay.className = 'd-flex justify-content-center align-items-center position-fixed top-0 start-0 w-100 h-100';
    overlay.style.background = 'rgba(0,0,0,0.5)';
    overlay.style.zIndex = '9999';
    overlay.innerHTML = '<div class="loading-spinner"></div>';
    document.body.appendChild(overlay);
};

window.hideLoading = function() {
    const overlay = document.getElementById('loading-overlay');
    if (overlay) {
        overlay.remove();
    }
};
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
