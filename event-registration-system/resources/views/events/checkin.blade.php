@extends('layouts.app')

@section('title', 'Event Check-in - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="text-center mb-5">
                <h2 class="mb-2">Event Check-in</h2>
                <p class="text-muted">Scan QR codes to check-in attendees</p>
            </div>

            <!-- Event Information -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light border-0 py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-calendar text-primary me-2"></i>Tech Conference 2024
                            </h5>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-success">Active Event</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="text-center">
                                <h4 class="text-primary mb-1">245</h4>
                                <small class="text-muted">Total Tickets</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h4 class="text-success mb-1">167</h4>
                                <small class="text-muted">Checked In</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h4 class="text-warning mb-1">78</h4>
                                <small class="text-muted">Pending</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h4 class="text-info mb-1">68%</h4>
                                <small class="text-muted">Attendance Rate</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- QR Scanner -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-qrcode text-primary me-2"></i>QR Code Scanner
                            </h5>
                        </div>
                        <div class="card-body text-center">
                            <!-- Camera View -->
                            <div class="position-relative mb-3" style="height: 300px; background: #f8f9fa; border: 2px dashed #dee2e6; border-radius: 0.5rem;">
                                <video id="qr-video" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.5rem; display: none;"></video>
                                <div id="qr-placeholder" class="d-flex align-items-center justify-content-center h-100">
                                    <div class="text-center">
                                        <i class="fas fa-camera fa-3x text-muted mb-3"></i>
                                        <p class="text-muted mb-3">Click start to begin scanning QR codes</p>
                                        <button class="btn btn-gradient" id="start-scan">
                                            <i class="fas fa-play me-2"></i>Start Scanner
                                        </button>
                                    </div>
                                </div>

                                <!-- Scanning overlay -->
                                <div id="scan-overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 200px; height: 200px; border: 2px solid #fff; display: none;">
                                    <div style="position: absolute; top: -2px; left: -2px; width: 20px; height: 20px; border-top: 4px solid #007bff; border-left: 4px solid #007bff;"></div>
                                    <div style="position: absolute; top: -2px; right: -2px; width: 20px; height: 20px; border-top: 4px solid #007bff; border-right: 4px solid #007bff;"></div>
                                    <div style="position: absolute; bottom: -2px; left: -2px; width: 20px; height: 20px; border-bottom: 4px solid #007bff; border-left: 4px solid #007bff;"></div>
                                    <div style="position: absolute; bottom: -2px; right: -2px; width: 20px; height: 20px; border-bottom: 4px solid #007bff; border-right: 4px solid #007bff;"></div>
                                </div>
                            </div>

                            <!-- Scanner Controls -->
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-success" id="stop-scan" style="display: none;">
                                    <i class="fas fa-stop me-2"></i>Stop Scanner
                                </button>
                                <button class="btn btn-outline-primary" onclick="toggleFlash()">
                                    <i class="fas fa-flashlight me-2"></i>Flash
                                </button>
                                <button class="btn btn-outline-secondary" onclick="switchCamera()">
                                    <i class="fas fa-sync me-2"></i>Switch Camera
                                </button>
                            </div>

                            <!-- Manual Entry -->
                            <div class="mt-4">
                                <hr>
                                <h6 class="mb-3">Manual Entry</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter ticket ID or confirmation number" id="manual-input">
                                    <button class="btn btn-outline-primary" type="button" onclick="manualCheckIn()">
                                        <i class="fas fa-check me-1"></i>Check In
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Check-in Results -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-list text-primary me-2"></i>Recent Check-ins
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div id="checkin-results" style="max-height: 400px; overflow-y: auto;">
                                <!-- Success Example -->
                                <div class="border-bottom p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">John Doe</h6>
                                            <p class="text-muted mb-1 small">Ticket: #TK-001234-001</p>
                                            <p class="text-success mb-0 small">
                                                <i class="fas fa-clock me-1"></i>Checked in at 10:15 AM
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span class="badge bg-success">Success</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Error Example -->
                                <div class="border-bottom p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center"
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Invalid Ticket</h6>
                                            <p class="text-muted mb-1 small">Ticket: #TK-999999-999</p>
                                            <p class="text-danger mb-0 small">
                                                <i class="fas fa-exclamation-triangle me-1"></i>Ticket not found
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span class="badge bg-danger">Error</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Already Checked In Example -->
                                <div class="border-bottom p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center"
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-exclamation"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Jane Smith</h6>
                                            <p class="text-muted mb-1 small">Ticket: #TK-001234-002</p>
                                            <p class="text-warning mb-0 small">
                                                <i class="fas fa-clock me-1"></i>Already checked in at 9:45 AM
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span class="badge bg-warning">Duplicate</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- No results message -->
                            <div id="no-checkins" class="text-center p-4" style="display: none;">
                                <i class="fas fa-qrcode fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No check-ins yet. Start scanning to see results here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendee List -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-0 py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-users text-primary me-2"></i>Attendee List
                            </h5>
                        </div>
                        <div class="col-auto">
                            <div class="input-group" style="width: 250px;">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search attendees..." id="attendee-search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Attendee</th>
                                    <th>Ticket ID</th>
                                    <th>Ticket Type</th>
                                    <th>Check-in Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="attendee-table-body">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=32&h=32&fit=crop&crop=face"
                                                 class="rounded-circle me-3" width="32" height="32">
                                            <div>
                                                <h6 class="mb-0">John Doe</h6>
                                                <small class="text-muted">john.doe@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="font-monospace">#TK-001234-001</span></td>
                                    <td><span class="badge bg-primary">Regular</span></td>
                                    <td>10:15 AM</td>
                                    <td><span class="badge bg-success">Checked In</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="viewTicket('TK-001234-001')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=32&h=32&fit=crop&crop=face"
                                                 class="rounded-circle me-3" width="32" height="32">
                                            <div>
                                                <h6 class="mb-0">Jane Smith</h6>
                                                <small class="text-muted">jane.smith@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="font-monospace">#TK-001234-002</span></td>
                                    <td><span class="badge bg-warning">VIP</span></td>
                                    <td>9:45 AM</td>
                                    <td><span class="badge bg-success">Checked In</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="viewTicket('TK-001234-002')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=32&h=32&fit=crop&crop=face"
                                                 class="rounded-circle me-3" width="32" height="32">
                                            <div>
                                                <h6 class="mb-0">Mike Johnson</h6>
                                                <small class="text-muted">mike.johnson@example.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="font-monospace">#TK-001234-003</span></td>
                                    <td><span class="badge bg-primary">Regular</span></td>
                                    <td>-</td>
                                    <td><span class="badge bg-secondary">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="manualCheckInUser('TK-001234-003')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.js"></script>
<script>
let video, canvas, canvasContext, scanning = false;

document.addEventListener('DOMContentLoaded', function() {
    video = document.getElementById('qr-video');
    canvas = document.createElement('canvas');
    canvasContext = canvas.getContext('2d');

    // Start scan button
    document.getElementById('start-scan').addEventListener('click', startScanning);
    document.getElementById('stop-scan').addEventListener('click', stopScanning);

    // Search functionality
    document.getElementById('attendee-search').addEventListener('input', filterAttendees);
});

async function startScanning() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: 'environment' }
        });

        video.srcObject = stream;
        video.style.display = 'block';
        document.getElementById('qr-placeholder').style.display = 'none';
        document.getElementById('scan-overlay').style.display = 'block';
        document.getElementById('start-scan').style.display = 'none';
        document.getElementById('stop-scan').style.display = 'inline-block';

        scanning = true;
        video.play();
        requestAnimationFrame(tick);

        showNotification('QR scanner started. Point camera at QR codes to scan.', 'info');
    } catch (err) {
        console.error('Error accessing camera:', err);
        showNotification('Could not access camera. Please check permissions.', 'error');
    }
}

function stopScanning() {
    scanning = false;

    if (video.srcObject) {
        video.srcObject.getTracks().forEach(track => track.stop());
    }

    video.style.display = 'none';
    document.getElementById('qr-placeholder').style.display = 'flex';
    document.getElementById('scan-overlay').style.display = 'none';
    document.getElementById('start-scan').style.display = 'inline-block';
    document.getElementById('stop-scan').style.display = 'none';

    showNotification('QR scanner stopped.', 'info');
}

function tick() {
    if (video.readyState === video.HAVE_ENOUGH_DATA && scanning) {
        canvas.height = video.videoHeight;
        canvas.width = video.videoWidth;
        canvasContext.drawImage(video, 0, 0, canvas.width, canvas.height);

        const imageData = canvasContext.getImageData(0, 0, canvas.width, canvas.height);
        const code = jsQR(imageData.data, imageData.width, imageData.height, {
            inversionAttempts: "dontInvert",
        });

        if (code) {
            processQRCode(code.data);
            // Brief pause after successful scan
            setTimeout(() => {
                if (scanning) requestAnimationFrame(tick);
            }, 1000);
        } else {
            requestAnimationFrame(tick);
        }
    } else if (scanning) {
        requestAnimationFrame(tick);
    }
}

function processQRCode(data) {
    try {
        // Parse QR code data
        const ticketData = JSON.parse(data);

        // Simulate API call to check in attendee
        checkInAttendee(ticketData);

    } catch (e) {
        // If not JSON, treat as ticket ID
        checkInAttendee({ ticketId: data });
    }
}

function checkInAttendee(ticketData) {
    // Simulate API call
    setTimeout(() => {
        const success = Math.random() > 0.2; // 80% success rate for demo

        if (success) {
            addCheckInResult({
                name: 'John Doe',
                ticketId: ticketData.ticketId || 'Unknown',
                status: 'success',
                message: 'Checked in successfully',
                time: new Date().toLocaleTimeString()
            });
            playSuccessSound();
        } else {
            addCheckInResult({
                name: 'Invalid Ticket',
                ticketId: ticketData.ticketId || 'Unknown',
                status: 'error',
                message: 'Ticket not found or already used',
                time: new Date().toLocaleTimeString()
            });
            playErrorSound();
        }
    }, 500);
}

function addCheckInResult(result) {
    const resultsContainer = document.getElementById('checkin-results');
    const resultElement = document.createElement('div');
    resultElement.className = 'border-bottom p-3';

    const statusIcon = result.status === 'success' ? 'check' : 'times';
    const statusColor = result.status === 'success' ? 'success' : 'danger';
    const statusBadge = result.status === 'success' ? 'Success' : 'Error';

    resultElement.innerHTML = `
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <div class="bg-${statusColor} text-white rounded-circle d-flex align-items-center justify-content-center"
                     style="width: 40px; height: 40px;">
                    <i class="fas fa-${statusIcon}"></i>
                </div>
            </div>
            <div class="flex-grow-1 ms-3">
                <h6 class="mb-1">${result.name}</h6>
                <p class="text-muted mb-1 small">Ticket: ${result.ticketId}</p>
                <p class="text-${statusColor} mb-0 small">
                    <i class="fas fa-clock me-1"></i>${result.message} at ${result.time}
                </p>
            </div>
            <div class="flex-shrink-0">
                <span class="badge bg-${statusColor}">${statusBadge}</span>
            </div>
        </div>
    `;

    resultsContainer.insertBefore(resultElement, resultsContainer.firstChild);

    // Keep only last 10 results
    while (resultsContainer.children.length > 10) {
        resultsContainer.removeChild(resultsContainer.lastChild);
    }
}

function manualCheckIn() {
    const input = document.getElementById('manual-input');
    const ticketId = input.value.trim();

    if (!ticketId) {
        showNotification('Please enter a ticket ID', 'error');
        return;
    }

    checkInAttendee({ ticketId: ticketId });
    input.value = '';
}

function manualCheckInUser(ticketId) {
    checkInAttendee({ ticketId: ticketId });
}

function toggleFlash() {
    // Flash functionality would be implemented here
    showNotification('Flash toggled', 'info');
}

function switchCamera() {
    // Camera switching functionality would be implemented here
    showNotification('Switching camera...', 'info');
}

function viewTicket(ticketId) {
    window.open(`/tickets/view/${ticketId}`, '_blank');
}

function filterAttendees() {
    const searchTerm = document.getElementById('attendee-search').value.toLowerCase();
    const rows = document.querySelectorAll('#attendee-table-body tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
}

function playSuccessSound() {
    // Create a simple success sound
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    const oscillator = audioContext.createOscillator();
    const gainNode = audioContext.createGain();

    oscillator.connect(gainNode);
    gainNode.connect(audioContext.destination);

    oscillator.frequency.value = 800;
    oscillator.type = 'sine';
    gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);

    oscillator.start();
    oscillator.stop(audioContext.currentTime + 0.2);
}

function playErrorSound() {
    // Create a simple error sound
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    const oscillator = audioContext.createOscillator();
    const gainNode = audioContext.createGain();

    oscillator.connect(gainNode);
    gainNode.connect(audioContext.destination);

    oscillator.frequency.value = 300;
    oscillator.type = 'sawtooth';
    gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);

    oscillator.start();
    oscillator.stop(audioContext.currentTime + 0.3);
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
@endsection
