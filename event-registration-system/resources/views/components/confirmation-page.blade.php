{{-- Success/Confirmation Component --}}

<div class="confirmation-page my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 rounded-4 shadow-lg overflow-hidden" data-aos="zoom-in">
                    <div class="card-body p-0">
                        <!-- Success Header with Animation -->
                        <div class="confirmation-header bg-{{ $type ?? 'success' }} text-white text-center py-4 px-4">
                            <div class="success-animation-container my-4">
                                @if($type == 'success')
                                    <div class="checkmark-circle">
                                        <div class="checkmark draw"></div>
                                    </div>
                                @elseif($type == 'info')
                                    <div class="info-circle">
                                        <div class="info-icon">i</div>
                                    </div>
                                @elseif($type == 'warning')
                                    <div class="warning-circle">
                                        <div class="warning-sign">!</div>
                                    </div>
                                @endif
                            </div>
                            <h2 class="fw-bold mb-2">{{ $title }}</h2>
                            <p class="mb-0 fs-5 fw-light">{{ $subtitle }}</p>
                        </div>

                        <!-- Confirmation Details -->
                        <div class="confirmation-details p-4 p-md-5">
                            @if(isset($message))
                                <div class="confirmation-message text-center mb-4">
                                    <p class="lead">{{ $message }}</p>
                                </div>
                            @endif

                            <!-- Details Section -->
                            @if(isset($details) && count($details) > 0)
                                <div class="details-section mb-4">
                                    <div class="card bg-light border-0 rounded-4">
                                        <div class="card-body p-4">
                                            <h5 class="fw-bold mb-3">{{ $detailsTitle ?? 'Details' }}</h5>
                                            <ul class="list-group list-group-flush">
                                                @foreach($details as $label => $value)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0 py-3 border-bottom">
                                                        <span class="text-muted">{{ $label }}</span>
                                                        <span class="fw-semibold">{{ $value }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Additional Information -->
                            @if(isset($additionalInfo))
                                <div class="additional-info alert alert-light border-0 rounded-4 mb-4">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="fas fa-info-circle fs-4 text-{{ $type ?? 'success' }}"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-2">Important Information</h6>
                                            <p class="mb-0">{{ $additionalInfo }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div class="confirmation-actions d-grid gap-3 mt-4">
                                @if(isset($primaryButtonText) && isset($primaryButtonUrl))
                                    <a href="{{ $primaryButtonUrl }}" class="btn btn-{{ $type ?? 'success' }} btn-lg fw-semibold">
                                        @if(isset($primaryButtonIcon))
                                            <i class="{{ $primaryButtonIcon }} me-2"></i>
                                        @endif
                                        {{ $primaryButtonText }}
                                    </a>
                                @endif

                                @if(isset($secondaryButtonText) && isset($secondaryButtonUrl))
                                    <a href="{{ $secondaryButtonUrl }}" class="btn btn-outline-{{ $type ?? 'success' }} fw-semibold">
                                        @if(isset($secondaryButtonIcon))
                                            <i class="{{ $secondaryButtonIcon }} me-2"></i>
                                        @endif
                                        {{ $secondaryButtonText }}
                                    </a>
                                @endif

                                @if(isset($tertiaryButtonText) && isset($tertiaryButtonUrl))
                                    <a href="{{ $tertiaryButtonUrl }}" class="btn btn-link text-{{ $type ?? 'success' }} fw-semibold">
                                        @if(isset($tertiaryButtonIcon))
                                            <i class="{{ $tertiaryButtonIcon }} me-2"></i>
                                        @endif
                                        {{ $tertiaryButtonText }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Optional Footer -->
                        @if(isset($footerText))
                            <div class="confirmation-footer p-4 bg-light border-top text-center">
                                <p class="text-muted mb-0 small">{{ $footerText }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Social Sharing Options -->
                @if(isset($showSocialSharing) && $showSocialSharing)
                    <div class="social-sharing text-center mt-4">
                        <p class="text-muted mb-2">Share your experience</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle" title="Share on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-info rounded-circle" title="Share on Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-danger rounded-circle" title="Share on Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-success rounded-circle" title="Share on WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Custom styles for confirmation components --}}
@push('styles')
<style>
    /* Success Animation */
    .checkmark-circle {
        width: 100px;
        height: 100px;
        position: relative;
        display: inline-block;
        vertical-align: top;
        margin: 0 auto;
    }

    .checkmark-circle .background {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #ffffff;
        position: absolute;
    }

    .checkmark-circle .checkmark {
        border-radius: 5px;
    }

    .checkmark-circle .checkmark.draw:after {
        animation-delay: 300ms;
        animation-duration: 1s;
        animation-timing-function: ease;
        animation-name: checkmark;
        transform: scaleX(-1) rotate(135deg);
        animation-fill-mode: forwards;
        opacity: 0;
        transform-origin: left top;
        border-right: 8px solid #fff;
        border-top: 8px solid #fff;
        content: '';
        height: 60px;
        position: absolute;
        width: 30px;
        left: 30px;
        top: 50px;
    }

    @keyframes checkmark {
        0% {
            height: 0;
            width: 0;
            opacity: 1;
        }
        20% {
            height: 0;
            width: 30px;
            opacity: 1;
        }
        40% {
            height: 60px;
            width: 30px;
            opacity: 1;
        }
        100% {
            height: 60px;
            width: 30px;
            opacity: 1;
        }
    }

    /* Info Animation */
    .info-circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 8px solid #fff;
        position: relative;
        display: inline-block;
        animation: info-pulse 2s infinite;
    }

    .info-icon {
        font-style: italic;
        font-size: 60px;
        font-weight: bold;
        color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    @keyframes info-pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(255, 255, 255, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
        }
    }

    /* Warning Animation */
    .warning-circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 8px solid #fff;
        position: relative;
        display: inline-block;
        animation: warning-pulse 2s infinite;
    }

    .warning-sign {
        font-size: 60px;
        font-weight: bold;
        color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    @keyframes warning-pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .bg-success {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .bg-info {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }

    .bg-warning {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .confirmation-header {
        position: relative;
        overflow: hidden;
    }

    .confirmation-header::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        transform: rotate(45deg);
    }

    .confirmation-details {
        position: relative;
    }

    .confirmation-details::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(to right, transparent, rgba(0,0,0,0.05), transparent);
    }

    .confirmation-page .card {
        transform: translateY(0);
        transition: all 0.5s ease;
    }

    .confirmation-page .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush
