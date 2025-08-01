@extends('layouts.app')

@section('title', 'Notifications - EventSmart')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Header -->
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Notifications</h2>
                    <p class="text-muted mb-0">Stay updated with your events and activities</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary" onclick="markAllRead()">
                        <i class="fas fa-check-double me-2"></i>Mark All Read
                    </button>
                    <button class="btn btn-gradient" data-bs-toggle="modal" data-bs-target="#notificationSettings">
                        <i class="fas fa-cog me-2"></i>Settings
                    </button>
                </div>
            </div>
        </div>

        <!-- Notification Filters -->
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="notificationFilter" id="all" checked>
                                <label class="btn btn-outline-primary" for="all">All (24)</label>
                                
                                <input type="radio" class="btn-check" name="notificationFilter" id="unread">
                                <label class="btn btn-outline-primary" for="unread">Unread (8)</label>
                                
                                <input type="radio" class="btn-check" name="notificationFilter" id="events">
                                <label class="btn btn-outline-primary" for="events">Events (12)</label>
                                
                                <input type="radio" class="btn-check" name="notificationFilter" id="payments">
                                <label class="btn btn-outline-primary" for="payments">Payments (5)</label>
                                
                                <input type="radio" class="btn-check" name="notificationFilter" id="system">
                                <label class="btn btn-outline-primary" for="system">System (7)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search notifications...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notifications List -->
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <!-- Unread Notifications -->
                    <div class="notification-item unread" data-type="event">
                        <div class="d-flex align-items-start p-4 border-bottom">
                            <div class="notification-icon bg-primary bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" 
                                 style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="fas fa-calendar text-primary"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="mb-0 fw-bold">New Event Registration</h6>
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-2">2 minutes ago</small>
                                        <div class="dropdown">
                                            <button class="btn btn-link btn-sm p-0" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" onclick="markAsRead(this)">Mark as read</a></li>
                                                <li><a class="dropdown-item" href="#">View event</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteNotification(this)">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-1 text-muted">John Doe registered for "Tech Conference 2024"</p>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-primary bg-opacity-10 text-primary me-2">Event</span>
                                    <small class="text-muted">Registration #TC2024-1234</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="notification-item unread" data-type="payment">
                        <div class="d-flex align-items-start p-4 border-bottom">
                            <div class="notification-icon bg-success bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" 
                                 style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="fas fa-dollar-sign text-success"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="mb-0 fw-bold">Payment Received</h6>
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-2">15 minutes ago</small>
                                        <div class="dropdown">
                                            <button class="btn btn-link btn-sm p-0" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" onclick="markAsRead(this)">Mark as read</a></li>
                                                <li><a class="dropdown-item" href="#">View transaction</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteNotification(this)">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-1 text-muted">Payment of $99.00 received for Digital Marketing Summit ticket</p>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success bg-opacity-10 text-success me-2">Payment</span>
                                    <small class="text-muted">Transaction #PAY-78945612</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="notification-item unread" data-type="event">
                        <div class="d-flex align-items-start p-4 border-bottom">
                            <div class="notification-icon bg-warning bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" 
                                 style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="fas fa-exclamation-triangle text-warning"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="mb-0 fw-bold">Event Reminder</h6>
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-2">1 hour ago</small>
                                        <div class="dropdown">
                                            <button class="btn btn-link btn-sm p-0" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" onclick="markAsRead(this)">Mark as read</a></li>
                                                <li><a class="dropdown-item" href="#">View event</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteNotification(this)">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-1 text-muted">Don't forget! "AI Workshop" starts tomorrow at 10:00 AM</p>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-warning bg-opacity-10 text-warning me-2">Reminder</span>
                                    <a href="#" class="btn btn-sm btn-outline-primary">View Event</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Read Notifications -->
                    <div class="notification-item read" data-type="system">
                        <div class="d-flex align-items-start p-4 border-bottom">
                            <div class="notification-icon bg-info bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" 
                                 style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="fas fa-info-circle text-info"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="mb-0">System Update</h6>
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-2">2 hours ago</small>
                                        <div class="dropdown">
                                            <button class="btn btn-link btn-sm p-0" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" onclick="markAsUnread(this)">Mark as unread</a></li>
                                                <li><a class="dropdown-item" href="#">View details</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteNotification(this)">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-1 text-muted">EventSmart has been updated with new features and security improvements</p>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-info bg-opacity-10 text-info me-2">System</span>
                                    <small class="text-muted">Version 2.1.0</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="notification-item read" data-type="event">
                        <div class="d-flex align-items-start p-4 border-bottom">
                            <div class="notification-icon bg-success bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" 
                                 style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="fas fa-check-circle text-success"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="mb-0">Event Completed</h6>
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-2">1 day ago</small>
                                        <div class="dropdown">
                                            <button class="btn btn-link btn-sm p-0" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" onclick="markAsUnread(this)">Mark as unread</a></li>
                                                <li><a class="dropdown-item" href="#">View event</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteNotification(this)">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-1 text-muted">"Startup Networking Event" has been completed successfully with 134 attendees</p>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success bg-opacity-10 text-success me-2">Event</span>
                                    <a href="#" class="btn btn-sm btn-outline-primary me-2">View Report</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary">Rate Event</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Load More Button -->
                    <div class="text-center p-4">
                        <button class="btn btn-outline-primary" onclick="loadMoreNotifications()">
                            <i class="fas fa-plus me-2"></i>Load More Notifications
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notification Settings Modal -->
<div class="modal fade" id="notificationSettings" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-4">
                        <div class="col-12">
                            <h6 class="border-bottom pb-2 mb-3">Email Notifications</h6>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="emailEvents" checked>
                                <label class="form-check-label" for="emailEvents">
                                    <strong>Event Updates</strong>
                                    <br><small class="text-muted">Get notified about event registrations, cancellations, and updates</small>
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="emailPayments" checked>
                                <label class="form-check-label" for="emailPayments">
                                    <strong>Payment Notifications</strong>
                                    <br><small class="text-muted">Receive confirmations for payments and refunds</small>
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="emailReminders" checked>
                                <label class="form-check-label" for="emailReminders">
                                    <strong>Event Reminders</strong>
                                    <br><small class="text-muted">Get reminded about upcoming events you're attending</small>
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="emailMarketing">
                                <label class="form-check-label" for="emailMarketing">
                                    <strong>Marketing Communications</strong>
                                    <br><small class="text-muted">Receive newsletters and promotional offers</small>
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <h6 class="border-bottom pb-2 mb-3">Push Notifications</h6>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="pushEvents" checked>
                                <label class="form-check-label" for="pushEvents">
                                    <strong>Event Updates</strong>
                                    <br><small class="text-muted">Real-time notifications for event activities</small>
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="pushMessages" checked>
                                <label class="form-check-label" for="pushMessages">
                                    <strong>Messages</strong>
                                    <br><small class="text-muted">Notifications for direct messages and announcements</small>
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="pushReminders" checked>
                                <label class="form-check-label" for="pushReminders">
                                    <strong>Reminders</strong>
                                    <br><small class="text-muted">Event and task reminders</small>
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <h6 class="border-bottom pb-2 mb-3">Frequency Settings</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Email Digest Frequency</label>
                                    <select class="form-select">
                                        <option>Immediately</option>
                                        <option selected>Daily</option>
                                        <option>Weekly</option>
                                        <option>Never</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Reminder Timing</label>
                                    <select class="form-select">
                                        <option>1 hour before</option>
                                        <option>6 hours before</option>
                                        <option selected>1 day before</option>
                                        <option>3 days before</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-gradient" onclick="saveNotificationSettings()">Save Settings</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeNotificationFilters();
});

function initializeNotificationFilters() {
    const filterButtons = document.querySelectorAll('input[name="notificationFilter"]');
    filterButtons.forEach(button => {
        button.addEventListener('change', function() {
            filterNotifications(this.id);
        });
    });
}

function filterNotifications(filter) {
    const notifications = document.querySelectorAll('.notification-item');
    
    notifications.forEach(notification => {
        const type = notification.getAttribute('data-type');
        const isUnread = notification.classList.contains('unread');
        
        let show = false;
        
        switch(filter) {
            case 'all':
                show = true;
                break;
            case 'unread':
                show = isUnread;
                break;
            case 'events':
                show = type === 'event';
                break;
            case 'payments':
                show = type === 'payment';
                break;
            case 'system':
                show = type === 'system';
                break;
        }
        
        notification.style.display = show ? 'block' : 'none';
    });
    
    updateFilterCounts();
}

function updateFilterCounts() {
    // Update badge counts (mock data)
    const counts = {
        all: 24,
        unread: 8,
        events: 12,
        payments: 5,
        system: 7
    };
    
    Object.keys(counts).forEach(filter => {
        const label = document.querySelector(`label[for="${filter}"]`);
        if (label) {
            const text = label.textContent.replace(/\(\d+\)/, `(${counts[filter]})`);
            label.textContent = text;
        }
    });
}

function markAsRead(element) {
    const notificationItem = element.closest('.notification-item');
    notificationItem.classList.remove('unread');
    notificationItem.classList.add('read');
    
    // Update the notification title styling
    const title = notificationItem.querySelector('h6');
    title.classList.remove('fw-bold');
    
    showNotification('Notification marked as read', 'success');
    updateFilterCounts();
}

function markAsUnread(element) {
    const notificationItem = element.closest('.notification-item');
    notificationItem.classList.remove('read');
    notificationItem.classList.add('unread');
    
    // Update the notification title styling
    const title = notificationItem.querySelector('h6');
    title.classList.add('fw-bold');
    
    showNotification('Notification marked as unread', 'success');
    updateFilterCounts();
}

function markAllRead() {
    const unreadNotifications = document.querySelectorAll('.notification-item.unread');
    unreadNotifications.forEach(notification => {
        notification.classList.remove('unread');
        notification.classList.add('read');
        
        const title = notification.querySelector('h6');
        title.classList.remove('fw-bold');
    });
    
    showNotification(`${unreadNotifications.length} notifications marked as read`, 'success');
    updateFilterCounts();
}

function deleteNotification(element) {
    if (confirm('Are you sure you want to delete this notification?')) {
        const notificationItem = element.closest('.notification-item');
        notificationItem.style.transition = 'opacity 0.3s ease';
        notificationItem.style.opacity = '0';
        
        setTimeout(() => {
            notificationItem.remove();
            showNotification('Notification deleted', 'success');
            updateFilterCounts();
        }, 300);
    }
}

function loadMoreNotifications() {
    showNotification('Loading more notifications...', 'info');
    
    // Simulate loading delay
    setTimeout(() => {
        showNotification('No more notifications to load', 'info');
    }, 1000);
}

function saveNotificationSettings() {
    showNotification('Notification settings saved successfully!', 'success');
    
    // Close the modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('notificationSettings'));
    modal.hide();
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 1050; min-width: 300px;';
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}
</script>
@endpush

<style>
.notification-item.unread {
    background-color: rgba(99, 102, 241, 0.02);
    border-left: 4px solid rgb(99, 102, 241);
}

.notification-item.read {
    opacity: 0.8;
}

.notification-item:hover {
    background-color: rgba(0, 0, 0, 0.02);
}

.notification-icon {
    transition: transform 0.2s ease;
}

.notification-item:hover .notification-icon {
    transform: scale(1.05);
}
</style>
@endsection
