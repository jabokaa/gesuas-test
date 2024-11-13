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
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/citizen">Nis</a>
                </li>
            </ul>
        </div>

        </div>
    </nav>
    <?php echo $content; ?>
</body>

<footer class="bg-dark text-white text-center py-4 fixed-bottom">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <p class="mb-2">Conecte-se comigo:</p>
            <a href="https://wa.me/5521969268032?text=Ola,%20somos%20da%20Gesuas.%20" class="text-white me-3 mb-2" target="_blank">
                <i class="bi bi-whatsapp"></i> WhatsApp
            </a>
            <a href="mailto:joao.beleno@gmail.com" class="text-white me-3 mb-2">
                <i class="bi bi-envelope-fill"></i> E-mail
            </a>
            <a href="https://www.instagram.com/jabokaa/" class="text-white me-3 mb-2" target="_blank">
                <i class="bi bi-instagram"></i> Instagram
            </a>
            <a href="https://www.linkedin.com/in/joao-oliveira-9b30601bb/" class="text-white me-3 mb-2" target="_blank">
                <i class="bi bi-linkedin"></i> LinkedIn
            </a>
            <a href="https://github.com/jabokaa" class="text-white mb-2" target="_blank">
                <i class="bi bi-github"></i> GitHub
            </a>
        </div>

        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <p class="mb-0">&copy; 2024 João Beleno - Todos os direitos reservados.</p>
                <p class="mb-0">Criado em: <strong>Novembro de 2024</strong></p>
            </div>
        </div>
    </div>
</footer>

<!-- Adicione o link do CSS do Bootstrap Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">


</html>
