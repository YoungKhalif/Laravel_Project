{{-- Ticket Purchase Section for Event Detail Page --}}
<div class="ticket-purchase-section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">
                    <div class="card-header bg-primary text-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0 fw-bold">Available Tickets</h3>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-white text-primary px-3 py-2 fs-6 fw-semibold">
                                    <i class="fas fa-clock me-1"></i>
                                    @if($event->ticket_sale_end_date && $event->ticket_sale_end_date->isFuture())
                                        Sale ends in {{ $event->ticket_sale_end_date->diffForHumans() }}
                                    @elseif($event->end_date && $event->end_date->isFuture())
                                        Event in {{ $event->start_date->diffForHumans() }}
                                    @else
                                        Event has ended
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if($event->tickets->isEmpty())
                            <div class="p-5 text-center">
                                <div class="empty-state">
                                    <div class="empty-state-icon mb-4">
                                        <i class="fas fa-ticket-alt fa-3x text-muted"></i>
                                    </div>
                                    <h4 class="fw-bold text-muted">No Tickets Available</h4>
                                    <p class="text-secondary">Tickets for this event are not yet available or have sold out.</p>
                                </div>
                            </div>
                        @else
                            <div class="ticket-list">
                                @foreach($event->tickets as $ticket)
                                    <div class="ticket-item border-bottom" x-data="{
                                        quantity: 0,
                                        price: {{ $ticket->price }},
                                        max: {{ $ticket->quantity }},
                                        available: {{ $ticket->available_quantity ?? $ticket->quantity }},
                                        increment() { if (this.quantity < this.available) this.quantity++ },
                                        decrement() { if (this.quantity > 0) this.quantity-- },
                                        total() { return (this.price * this.quantity).toFixed(2) }
                                    }">
                                        <div class="p-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="ticket-info">
                                                    <h5 class="fw-bold mb-2">{{ $ticket->name }}</h5>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="badge {{ $ticket->type === 'vip' ? 'bg-warning' : 'bg-info' }} me-2">
                                                            {{ ucfirst($ticket->type) }}
                                                        </span>
                                                        <span class="text-muted small">
                                                            @if($ticket->available_quantity)
                                                                <i class="fas fa-ticket-alt me-1"></i>
                                                                {{ $ticket->available_quantity }} left
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <p class="text-muted small mb-0">{{ $ticket->description }}</p>
                                                </div>
                                                <div class="ticket-price text-end">
                                                    <div class="fw-bold fs-4 mb-2">
                                                        ${{ number_format($ticket->price, 2) }}
                                                    </div>
                                                    <div class="text-muted small">Per ticket</div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <div class="ticket-features">
                                                    @if($ticket->features)
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach(explode(',', $ticket->features) as $feature)
                                                                <span class="badge bg-light text-dark">
                                                                    <i class="fas fa-check-circle text-success me-1"></i>
                                                                    {{ trim($feature) }}
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="ticket-actions">
                                                    <div class="input-group">
                                                        <button class="btn btn-outline-secondary"
                                                                type="button"
                                                                @click="decrement()"
                                                                :disabled="quantity <= 0">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="number"
                                                               class="form-control text-center"
                                                               x-model="quantity"
                                                               min="0"
                                                               max="{{ $ticket->available_quantity ?? $ticket->quantity }}"
                                                               readonly>
                                                        <button class="btn btn-outline-secondary"
                                                                type="button"
                                                                @click="increment()"
                                                                :disabled="quantity >= available || available <= 0">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <template x-if="quantity > 0">
                                                <div class="mt-3 d-flex justify-content-between align-items-center bg-light p-3 rounded-3">
                                                    <div>
                                                        <span class="fw-semibold">Total:</span>
                                                        <span class="fw-bold ms-2" x-text="`$${total()}`"></span>
                                                    </div>
                                                    <form method="POST" action="{{ route('tickets.add-to-cart') }}">
                                                        @csrf
                                                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                        <input type="hidden" name="quantity" x-model="quantity">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                                                        </button>
                                                    </form>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <!-- Event Summary Card -->
                    <div class="card border-0 shadow rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-light p-4">
                            <h4 class="mb-0 fw-bold">Event Summary</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="event-summary-info">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-box bg-primary-light rounded-3 p-3 me-3">
                                        <i class="fas fa-calendar-day text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Date & Time</div>
                                        <div class="fw-semibold">
                                            {{ $event->start_date->format('F j, Y') }}
                                            <br>{{ $event->start_time->format('g:i A') }} - {{ $event->end_time->format('g:i A') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-box bg-primary-light rounded-3 p-3 me-3">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Location</div>
                                        <div class="fw-semibold">{{ $event->location }}</div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-box bg-primary-light rounded-3 p-3 me-3">
                                        <i class="fas fa-user-tie text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Organized By</div>
                                        <div class="fw-semibold">{{ $event->company->name ?? 'Event Organizer' }}</div>
                                    </div>
                                </div>

                                <!-- Cart Summary (Shows when items are in cart) -->
                                <div id="cart-summary" class="mt-4" style="display: none;" x-data="{
                                    tickets: JSON.parse(localStorage.getItem('event_tickets') || '[]'),
                                    event_id: {{ $event->id }},

                                    get hasItems() {
                                        return this.tickets.filter(t => t.event_id === this.event_id).length > 0;
                                    },

                                    get totalQuantity() {
                                        return this.tickets
                                            .filter(t => t.event_id === this.event_id)
                                            .reduce((sum, item) => sum + item.quantity, 0);
                                    },

                                    get totalAmount() {
                                        return this.tickets
                                            .filter(t => t.event_id === this.event_id)
                                            .reduce((sum, item) => sum + (item.price * item.quantity), 0)
                                            .toFixed(2);
                                    }
                                }" x-init="$watch('tickets', value => {
                                    document.getElementById('cart-summary').style.display = hasItems ? 'block' : 'none';
                                })">
                                    <template x-if="hasItems">
                                        <div>
                                            <div class="divider my-4"></div>
                                            <h5 class="fw-bold mb-3">Your Selection</h5>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Total Tickets:</span>
                                                <span class="fw-semibold" x-text="totalQuantity"></span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-4">
                                                <span>Total Amount:</span>
                                                <span class="fw-bold" x-text="`$${totalAmount}`"></span>
                                            </div>
                                            <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg w-100">
                                                <i class="fas fa-shopping-cart me-2"></i> Proceed to Checkout
                                            </a>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Share Card -->
                    <div class="card border-0 shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Share This Event</h5>
                            <div class="d-flex gap-2">
                                <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(route('events.show', $event)) }}"
                                   class="btn btn-outline-primary btn-sm" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('events.show', $event)) }}&text={{ urlencode($event->title) }}"
                                   class="btn btn-outline-info btn-sm" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('events.show', $event)) }}&title={{ urlencode($event->title) }}"
                                   class="btn btn-outline-secondary btn-sm" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="mailto:?subject={{ urlencode('Check out this event: ' . $event->title) }}&body={{ urlencode('I thought you might be interested in this event: ' . route('events.show', $event)) }}"
                                   class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                <button type="button" class="btn btn-outline-dark btn-sm copy-link"
                                        data-url="{{ route('events.show', $event) }}">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Copy link functionality
    document.querySelectorAll('.copy-link').forEach(button => {
        button.addEventListener('click', function() {
            const url = this.dataset.url;
            navigator.clipboard.writeText(url).then(() => {
                // Show tooltip
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check"></i> Copied!';
                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 2000);
            });
        });
    });

    // Cart management
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize cart from local storage
        const eventTickets = JSON.parse(localStorage.getItem('event_tickets') || '[]');
        const currentEventId = {{ $event->id }};

        // Check if this event has items in cart
        const hasItems = eventTickets.some(item => item.event_id === currentEventId);

        if (hasItems) {
            document.getElementById('cart-summary').style.display = 'block';
        }

        // Listen for form submissions to add tickets to cart
        document.querySelectorAll('form[action*="add-to-cart"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const ticketId = parseInt(this.querySelector('input[name="ticket_id"]').value);
                const quantity = parseInt(this.querySelector('input[name="quantity"]').value);

                if (quantity <= 0) return;

                // Find the ticket data
                const ticketItem = document.querySelector(`.ticket-item[x-data*="ticket_id: ${ticketId}"]`);
                const ticketName = ticketItem.querySelector('h5').innerText;
                const ticketPrice = parseFloat(ticketItem.querySelector('.ticket-price .fw-bold').innerText.replace('$', ''));

                // Add or update the cart
                const existingItemIndex = eventTickets.findIndex(item =>
                    item.event_id === currentEventId && item.ticket_id === ticketId
                );

                if (existingItemIndex > -1) {
                    eventTickets[existingItemIndex].quantity = quantity;
                } else {
                    eventTickets.push({
                        event_id: currentEventId,
                        ticket_id: ticketId,
                        name: ticketName,
                        price: ticketPrice,
                        quantity: quantity
                    });
                }

                localStorage.setItem('event_tickets', JSON.stringify(eventTickets));
                document.getElementById('cart-summary').style.display = 'block';

                // Show a notification
                const toast = document.createElement('div');
                toast.className = 'position-fixed bottom-0 end-0 p-3';
                toast.style.zIndex = 11;
                toast.innerHTML = `
                    <div class="toast show align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-check-circle me-2"></i> ${quantity} ticket(s) added to cart
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                `;
                document.body.appendChild(toast);
                setTimeout(() => document.body.removeChild(toast), 3000);
            });
        });
    });
</script>
@endpush

{{-- Add custom styles for the ticket section --}}
@push('styles')
<style>
    .ticket-purchase-section {
        position: relative;
    }

    .ticket-item {
        transition: all 0.3s ease;
    }

    .ticket-item:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .ticket-item:last-child {
        border-bottom: none !important;
    }

    .icon-box {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bg-primary-light {
        background-color: rgba(59, 130, 246, 0.1);
    }

    .divider {
        height: 1px;
        background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.1), transparent);
    }

    /* Empty state styling */
    .empty-state {
        padding: 2rem;
    }

    .empty-state-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    /* Toast notification styling */
    .toast {
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush
