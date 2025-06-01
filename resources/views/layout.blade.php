<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

    .theme-dark {
        background-color: #121212;
        color: #ffffff;
    }

    .theme-dark input,
    .theme-dark textarea,
    .theme-dark select {
        background-color: #2a2a2a;
        color: #ffffff;
        border-color: #444;
    }

    .theme-dark .form-control::placeholder,
    .theme-dark .form-check-label {
        color: #cccccc;
    }

    .theme-dark .card,
    .theme-dark .bg-white {
        background-color: #1e1e1e !important;
        color: #ffffff;
    }

    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }


        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.01);
        }

        .toggle-mode {
            cursor: pointer;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

@if (session('success'))
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const toastEl = document.getElementById('toast-success');
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
</script>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
    <div id="toast-success" class="toast align-items-center text-bg-success border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>
@endif

<body class="bg-light" id="theme" data-theme="">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="w-100" style="max-width: 400px;">
            <div class="text-end mb-3">
                <span class="toggle-mode text-success fw-semibold">
                    <i class="bi bi-moon-stars-fill"></i> Toggle Dark Mode
                </span>
            </div>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const body = document.getElementById('theme');
    const toggle = document.querySelector('.toggle-mode');

    function applyTheme(theme) {
        if (theme === 'dark') {
            body.classList.add('theme-dark');
            body.classList.remove('bg-light');
        } else {
            body.classList.remove('theme-dark');
            body.classList.add('bg-light');
        }
        body.setAttribute('data-theme', theme);
    }

    const savedTheme = localStorage.getItem('theme') || 'light';
    applyTheme(savedTheme);

    toggle.addEventListener('click', () => {
        const newTheme = body.classList.contains('theme-dark') ? 'light' : 'dark';
        localStorage.setItem('theme', newTheme);
        applyTheme(newTheme);
    });
</script>

</body>
</html>
