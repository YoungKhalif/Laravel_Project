<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Smart Event Registration & Ticketing System')</title>

    <!-- Fonts - Optimized loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS - Minified -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome - Optimized loading -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Optimized CSS -->
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --dark-color: #1f2937;
            --light-color: #f9fafb;
            --border-radius: 8px;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        /* Optimized Button Styles */
        .btn-primary-custom {
            background: var(--primary-color);
            border: none;
            color: white;
            font-weight: 500;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            box-shadow: var(--shadow-md);
        }

        .btn-outline-primary-custom {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            font-weight: 500;
            border-radius: var(--border-radius);
        }

        .btn-outline-primary-custom:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Simplified Card Styles */
        .card {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: var(--shadow-sm);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        /* Text Gradient */
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Minimal Loading Spinner */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        /* Performance optimized utilities */
        .will-change-transform {
            will-change: transform;
        }

        .transition-fast {
            transition: all 0.15s ease;
        }

        .transition-normal {
            transition: all 0.3s ease;
        }

        /* Responsive utilities */
        @media (max-width: 768px) {
            .container-xl {
                padding: 0 1rem;
            }
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Header -->
    @include('components.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Optimized Scripts -->
    <!-- Bootstrap 5 JS - Async loading -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" async></script>

    <!-- Alpine.js - Essential for interactivity -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Optimized Custom JS -->
    <script>
        // Navbar scroll effect - debounced
        let scrollTimer;
        window.addEventListener('scroll', function() {
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(function() {
                const navbar = document.querySelector('.navbar-custom');
                if (navbar) {
                    navbar.classList.toggle('scrolled', window.scrollY > 50);
                }
            }, 10);
        });

        // Simple toast function
        window.showToast = function(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} position-fixed top-0 end-0 m-3`;
            toast.style.zIndex = '9999';
            toast.textContent = message;
            document.body.appendChild(toast);

            setTimeout(() => toast.remove(), 3000);
        };
    </script>

    @stack('scripts')
</body>
</html>
