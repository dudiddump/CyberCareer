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
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #334155;
            overflow-x: hidden;
        }

        #wrapper {
            display: flex;
            width: 100%;
            overflow: hidden;
        }

        #sidebar-wrapper {
        width: var(--sidebar-width);
        height: 100vh; 
        position: fixed;
        top: 0;
        left: 0;
        background: #ffffff;
        border-right: 1px solid #e2e8f0;
        z-index: 1040;
        transition: all 0.3s ease-in-out;
        overflow-y: auto;
    }

        #page-content-wrapper {
            flex: 1;
            min-width: 0;
            background-color: #f1f5f9;
            transition: all 0.25s ease-out;
        }

        #sidebar-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1030;
            backdrop-filter: blur(2px);
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                left: 0;    
            }
            #page-content-wrapper {
                margin-left: var(--sidebar-width);
                width: calc(100% - var(--sidebar-width)); 
            }
            #sidebar-overlay { display: none !important; }
        }

        @media (max-width: 767.98px) {
            #sidebar-wrapper {
                left: -280px;
            }
            
            #page-content-wrapper {
                margin-left: 0; 
                width: 100%;
            }

            body.sb-sidenav-toggled #sidebar-wrapper {
                left: 0;
            }
            
            body.sb-sidenav-toggled #sidebar-overlay {
                display: block;
            }
        }

        .nav-pills .nav-link { color: #64748b; font-weight: 500; padding: 12px 20px; border-radius: 10px; margin-bottom: 5px; transition: all 0.2s; }
        .nav-pills .nav-link:hover { background-color: #f8fafc; color: var(--color-primary); transform: translateX(4px); }
        .nav-pills .nav-link.active { background-color: var(--color-primary); color: white; box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3); }
        
        .card-modern { border: 1px solid #e2e8f0; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }

        body.dark { background-color: #0f172a; color: #cbd5e1; }
        body.dark #sidebar-wrapper { background: #1e293b; border-color: #334155; }
        body.dark #page-content-wrapper { background-color: #0f172a; }
        body.dark .bg-light, body.dark .card-modern { background-color: #334155 !important; border-color: #475569 !important; color: white; }
        body.dark .nav-pills .nav-link { color: #94a3b8; }
        body.dark .nav-pills .nav-link:hover { background-color: rgba(255,255,255,0.05); color: #fff; }
        body.dark .nav-pills .nav-link.active { background-color: var(--color-primary); color: #fff; }
        body.dark .text-dark { color: #f1f5f9 !important; }
        body.dark .text-muted { color: #94a3b8 !important; }
        
        body.dark .table { color: #e2e8f0; border-color: #334155; }
        body.dark .table thead th { background-color: #1e293b; color: #fff; border-bottom: 1px solid #334155; }
        body.dark .table tbody td { border-bottom: 1px solid #334155; background-color: #1e293b; }
        body.dark .table-hover tbody tr:hover td { background-color: #334155; }
    </style>
</head>

<body class="<?= ($this->session->userdata('theme') == 'dark') ? 'dark' : '' ?>">
    
    <div id="wrapper">