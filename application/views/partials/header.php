<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'CyberCareer' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        :root {
            --color-primary: #0d6efd;
            --color-orange: #fd7e14;
            --sidebar-width: 280px;
            --top-spacing: 2rem;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #334155;
            transition: background 0.3s, color 0.3s;
            overflow-x: hidden;
        }

        .sidebar-wrapper {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1030;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease-in-out;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2.5rem;
            min-height: 100vh;
            width: calc(100% - var(--sidebar-width));
            transition: all 0.3s ease-in-out;
        }

        .nav-pills .nav-link {
            color: #64748b;
            font-weight: 500;
            padding: 14px 24px;
            margin-bottom: 8px;
            border-radius: 12px;
            transition: all 0.2s ease;
        }
        .nav-pills .nav-link:hover {
            background-color: #f1f5f9;
            color: var(--color-primary);
            transform: translateX(4px);
        }    
        .nav-pills .nav-link.active {
            background-color: var(--color-primary);
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }
        .nav-link i { font-size: 1.2rem; }

        .card, .card-modern {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            background: white;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-bottom: 1.5rem;
        }
        
        .hover-shadow:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
            border-color: var(--color-primary) !important;
        }
        .transition-all { transition: all 0.3s ease; }

        @media (max-width: 991px) {
            .sidebar-wrapper { transform: translateX(-100%); }
            .sidebar-wrapper.show { transform: translateX(0); box-shadow: 0 0 50px rgba(0,0,0,0.2); }
            .main-content { 
                margin-left: 0; 
                width: 100%; 
                padding: 1.5rem;
            }
        }

        .bg-orange { background-color: #fd7e14 !important; }
        .text-orange { color: #fd7e14 !important; }
        .border-orange { border-color: #fd7e14 !important; }

        .btn-filter {
            border-radius: 50px;
            padding: 8px 24px;
            font-size: 0.9rem;
            font-weight: 600;
            border: 1px solid #e2e8f0;
            background-color: white;
            color: #64748b;
            transition: all 0.3s ease;
        }

        .btn-filter:hover {
            background-color: #f1f5f9;
            transform: translateY(-2px);
        }

        .btn-filter.active {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        .input-modern {
            border-radius: 50px;
            padding-top: 12px;
            padding-bottom: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
            transition: all 0.3s;
        }
        .input-modern:focus {
            box-shadow: 0 4px 15px rgba(13, 110, 253, 0.15);
            border-color: #0d6efd;
        }
        
        .text-alert-danger { color: inherit; }

        /* DARK MODE STYLES */
        body.dark {
            background-color: #0f172a;
            color: #cbd5e1;
        }
        body.dark .sidebar-wrapper {
            background: #1e293b;
            border-right: 1px solid #334155;
        }
        body.dark .card, 
        body.dark .card-modern,
        body.dark .bg-white {
            background-color: #1e293b !important; 
            border-color: #334155 !important;
            color: #f1f5f9;
            box-shadow: none;
        }

        body.dark h1, body.dark h2, body.dark h3, body.dark h4, body.dark h5, body.dark h6,
        body.dark .text-dark, 
        body.dark .fw-bold {
            color: #f8fafc !important;
        }
        
        body.dark .text-muted {
            color: #94a3b8 !important;
        }

        body.dark .form-control, 
        body.dark .form-select {
            background-color: #334155;
            border-color: #475569;
            color: #fff;
        }
        body.dark .form-control:focus {
            background-color: #334155;
            color: #fff;
            border-color: var(--color-primary);
        }

        body.dark .nav-pills .nav-link { color: #94a3b8; }
        body.dark .nav-pills .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #fff;
        }
        body.dark .nav-pills .nav-link.active {
            background-color: var(--color-primary);
            color: #fff;
        }
        
        body.dark .bg-light {
            background-color: #334155 !important;
            color: #fff;
        }

        body.dark .logo-container {
            background-color: #fff !important; 
            border-color: #fff !important;
        }

        body.dark .btn-filter {
            background-color: #1e293b;
            border-color: #334155;
            color: #94a3b8;
        }
        body.dark .btn-filter:hover {
            background-color: #334155;
            color: #fff;
        }
        body.dark .btn-filter.active {
            background-color: #0d6efd;
            color: #fff;
        }

        body.dark .input-modern {
            background-color: #1e293b;
            border-color: #334155;
            color: #fff;
        }

        body.dark .text-orange { color: #ffb74d !important; }
        body.dark .text-primary { color: #64b5f6 !important; }
        body.dark .text-success { color: #81c784 !important; }

        body.dark .badge.bg-opacity-10 {
            background-color: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid;
        }

        body.dark .badge.text-orange { border-color: #ffb74d !important; }
        body.dark .badge.text-primary { border-color: #64b5f6 !important; }
        body.dark .badge.text-success { border-color: #81c784 !important; }

        body.dark .btn-danger, 
        body.dark .btn-success,
        body.dark .btn-primary {
            border: none;
            color: white !important;
        }
        
        body.dark .alert-warning {
            background-color: #fff3cd !important; 
            border-color: #ffecb5 !important;
        }
        body.dark .text-warning {
            color: #ffc107 !important;
        }
        body.dark .text-alert-danger {
            color: #842029 !important;
        }

    </style>
</head>

<body class="<?= ($this->session->userdata('theme') == 'dark') ? 'dark' : '' ?>">
    <div class="d-flex">