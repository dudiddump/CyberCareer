<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'CyberCareer' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: "Poppins", sans-serif; }

        /* LIGHT MODE (default) */
        body.light-mode {
            background-color: #F5F7FA;
            color: #2F2F2F;
        }
        .sidebar.light-mode {
            background: #FFFFFF;
        }

        /* DARK MODE (navy gelap) */
        body.dark-mode {
            background-color: #0A1A33;  /* navy gelap */
            color: #E8E8E8;
        }
        .sidebar.dark-mode {
            background: #12284A;
        }

        .theme-toggle {
            position: fixed;
            top: 15px;
            right: 15px;
            z-index: 999;
        }
    </style>
</head>

<body class="light-mode">

<button class="btn btn-warning theme-toggle" id="toggleTheme">
    🌙
</button>

<div class="d-flex">
