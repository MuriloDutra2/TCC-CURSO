<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C-Street - Planos</title>

    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/media_query.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" sizes="32x32" href="assets/imagem-real/logo-favicon.png" type="image/x-icon">

    <style>
        main {
  margin: 40px auto; /* Ajuste a margem conforme a necessidade */
  padding: 20px;
  background-color: var(--cinza); /* Cor de fundo similar ao 'Sobre Nós' */
  border-radius: 10px;
  max-width: 80%;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

    </style>
</head>

<body>
    <div class="container">

    <HEader>
            <div class="navbar">
                <!-- meny button small screen -->
                <button class="navbar-menu-btn">
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="three"></span>
                </button>

                <a href="index.php" class="navbar-brand">
                    <img src="assets/imagem-real/logo-favicon.png" class="logo-img" alt="">
                </a>

                <div class="toggle-container">
                    <ion-icon name="sunny-outline" class="icon sun-icon"></ion-icon>
                    <input type="checkbox" id="theme-toggle" class="toggle-input" onclick="toggleTheme()">
                    <label for="theme-toggle" class="toggle-label"></label>
                    <ion-icon name="moon-outline" class="icon moon-icon"></ion-icon>
                </div>



                <script>
                    // Função para alternar o tema
                    function toggleTheme() {
                        const currentTheme = document.documentElement.getAttribute('data-theme');
                        const newTheme = currentTheme === 'light' ? 'dark' : 'light';

                        document.documentElement.setAttribute('data-theme', newTheme);
                        localStorage.setItem('theme', newTheme);
                    }

                    // Carrega o tema do localStorage ao carregar a página
                    window.addEventListener('DOMContentLoaded', () => {
                        const savedTheme = localStorage.getItem('theme') || 'dark';
                        document.documentElement.setAttribute('data-theme', savedTheme);

                        // Atualiza o estado do checkbox com base no tema salvo
                        const themeToggle = document.getElementById('theme-toggle');
                        themeToggle.checked = savedTheme === 'light';
                    });
                </script>

                <!-- navbar navigation -->
                <nav class="">
                    <ul class="navbar-nav">
                        <li><a href="index.php#movies" class="navbar-link">Nossos filmes</a></li>
                        <li><a href="index.php#category" class="navbar-link">Alimentos</a></li>
                        <li><a href="contato.html" class="navbar-link">Contato</a></li>
                    </ul>
                </nav>

                <div class="navbar-actions">
                    <!-- BARRA DE PESQUISA -->
                    <form id="searchForm" class="navbar-form" method="GET">
                        <input type="text" id="searchInput" name="search" placeholder="Eu estou procurando por..." class="navbar-form-search">
                        <button type="submit" class="navbar-form-btn">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>

                        <button type="button" class="navbar-form-close">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </button>
                    </form>

                    <!-- Botão de pesquisa para tela menor -->
                    <button class="navbar-search-btn">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>

                    <?php

                    if (isset($_SESSION['usuario'])) {
                        // Se o usuário estiver logado, exibir o nome e o ícone de perfil com a caixa de logout
                        echo '
                <div class="nav-item user-dropdown">
                    <a href="#" class="user-toggle" id="userDropdown"><ion-icon name="person-outline"></ion-icon> ' . $_SESSION['usuario'] . '</a>
                    <div class="dropdown-box" id="dropdownMenu">
                        <a href="logout.php"><ion-icon name="exit-outline"></ion-icon> Sair</a>
                    </div>
                </div>';
                    } else {
                        // Se o usuário não estiver logado, exibir o botão de login com o ícone de login
                        echo '
                <li class="nav-item">
                    <a href="login.php"><ion-icon name="enter-outline"></ion-icon> Entrar</a>
                </li>';
                    }
                    ?>
                </div>
            </div>
        </HEader>

        <main>
        <section class="future-plans">
    <h2>Planos para o futuro:</h2>
    <p>
        No futuro, a nossa empresa de cinema de rua será um espaço acessível e acolhedor para a comunidade, com uma programação diversificada e sustentável. Organizaremos sessões em diferentes pontos da cidade, valorizando a cultura local e promovendo parcerias com pequenos negócios, como cafés e restaurantes próximos. Vamos priorizar o uso de equipamentos energeticamente eficientes e criar eventos regulares que se tornem uma tradição para as famílias e os amigos. Ao longo do ano, teremos eventos especiais temáticos e exibições que trazem valor cultural e lazer para todos.
    </p>
</section>

        </main>
        <footer>
            <div class="footer-content">

                <div class="footer-band">
                    <img src="assets/imagem-real/logo-favicon.png" alt="" class="footer-logo">
                    <p class="slogan">Filmes e Cinema, C-street o cinema do seu jeito</p>

                    <div class="social-link">

                        <a href="https://x.com/CineS89864?t=SbVD0FmupffLmxZsqTFF3A&s=09"> <ion-icon name="logo-twitter"></ion-icon> </a>
                        <a href="https://www.instagram.com/cines_treet?igsh=MzNnNjB2aDZ2bDRo"> <ion-icon name="logo-instagram"></ion-icon> </a>
                        <a href="https://www.tiktok.com/@cine.street0?_t=8qmY370IA6Q&_r=1"> <ion-icon name="logo-tiktok"></ion-icon> </a>
                        <a href="https://www.youtube.com/@C-Street-u5b/featured"> <ion-icon name="logo-youtube"></ion-icon></a>

                    </div>
                </div>


                <div class="footer-links">
                    <ul>
                        <h4 class="link-heading">
                            C-street
                        </h4>

                        <li class="link-item">
                            <a href="sobrenos.php">Sobre-nós</a>
                        </li>
                        <li class="link-item">
                            <a href="sobrenos.php"> Nossa missão</a>
                        </li>
                        <li class="link-item">
                            <a href="planos.php"> Planos</a>
                        </li>
                        <li class="link-item">
                            <a href="contato.php"> Contato</a>
                        </li>
                    </ul>

                    <ul>

                        <h4 class="link-heading">
                            Filmes
                        </h4>

                        <li class="link-item">
                            <a href="filho_do_homem.php"> O Filho Do Homem </a>
                        </li>
                        <li class="link-item">
                            <a href="maldicao_do_parque.php"> Maldição do Parque </a>
                        </li>
                        <li class="link-item">
                            <a href="noite_eterna_azul.php"> Noite Eterna Azul </a>
                        </li>
                        <li class="link-item">
                            <a href="mr_romero.php"> Mr.Romero </a>
                        </li>
                    </ul>

                    <ul>

                        <li class="link-item">
                            <a href="time_dos_sonhos.php"> O Time dos Sonhos </a>
                        </li>

                        <li class="link-item">
                            <a href="olhos_felinos.php"> Olhos Felinos </a>
                        </li>

                        <li class="link-item">
                            <a href="tempo_de_morte.php"> Tempo de Morte</a>
                        </li>

                        <li class="link-item">
                            <a href="mdp.php"> M.D.P. </a>
                        </li>
                    </ul>

                    <ul>



                        <li class="link-item">
                            <a href="desconhecido.php"> O Desconhecido </a>
                        </li>
                        <li class="link-item">
                            <a href="punhos_de_aco.php"> Punhos de Aço </a>
                        </li>
                        <li class="link-item">
                            <a href="atirando_alto.php"> Atirando Alto</a>
                        </li>

                        <li class="link-item">
                            <a href="historia_de_mung.php"> Historia de Mung </a>
                        </li>

                    </ul>

                </div>

            </div>



            <div class="footer-copyright">

                <div class="copyright">
                    <p>&copy; Copyright 2024 C-Street</p>
                </div>

                <div class="wrapper">

                    <a href="assets/imagem-real/termosdeuso.pdf">Termos de uso</a>
                </div>

            </div>
        </footer>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
