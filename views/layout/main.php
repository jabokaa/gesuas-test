<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gesuas Test - João Beleño</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <!-- Bootstrap JS (inclui Popper.js necessário para componentes como Tooltips e Popovers) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    
    <style>
        .container {
            max-width: 100%;
        }
        .banner--home {
            background-image: url("https://www.gesuas.com.br/wp-content/themes/gesuas/img/capa-com-selo.jpg");
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <!-- Logo ou nome do site -->
            <a class="navbar-brand" href="#">
                <img src="https://www.gesuas.com.br/wp-content/themes/gesuas/img/logo-gesuas.png" alt="Logo GESUAS" height="40">
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./citizen">Nis</a>
                </li>
            </ul>
        </div>

        </div>
    </nav>
    <?php echo $content; ?>
</body>
</html>
