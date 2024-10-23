<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Time dos Sonhos</title>
    <!--
    CSS link    
-->

    <link rel="stylesheet" href="assets/css/filme.css">
    <link rel="stylesheet" href="assets/css/media_query.css">
    <!--
    Link font
-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

</head>

<body>



    <!--
    main container    
-->

    <div class="container">
        <!--
    HEADER SECTION
    -->

        <HEader>
            <div class="navbar">
                <!-- meny button small screen -->
                <button class="navbar-menu-btn">
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="three"></span>
                </button>

                <a href="index.php" class="navbar-brand">
                    <img src="assets/imagem-real/TCC2.png" class="logo-img" alt="">
                </a>

                <!-- navbar navigation -->
                <nav class="">
                    <ul class="navbar-nav">
                        <li><a href="index.php#movies" class="navbar-link">Nossos filmes</a></li>
                        <li><a href="index.php#category" class="navbar-link">Alimentos</a></li>
                        <li><a href="contato.php" class="navbar-link">Contato</a></li>
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
                    session_start();
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

        <script>
            // JavaScript para abrir e fechar o dropdown ao clicar
            const userToggle = document.getElementById('userDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');

            userToggle.addEventListener('click', function(e) {
                e.preventDefault();
                dropdownMenu.classList.toggle('show');
            });

            // Fecha o dropdown se o usuário clicar fora dele
            window.addEventListener('click', function(e) {
                if (!userToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        </script>



        <!--
#MAIN SECTION    
-->

        <main>

            <header>
                <!-- Conteúdo do header aqui -->
            </header>

            <main>
                <div class="movie-details">
                    <!-- Imagem do Filme -->
                    <div class="movie-image">
                        <img src="assets/image_movie/filme5.jpg" alt="Punhos de aço">
                    </div>

                    <!-- Informações do Filme -->
                    <div class="movie-info">
                        <h2>O Time Dos Sonhos</h2>

                        <!-- Sinopse -->
                        <p class="sinopse">
                            "Eu não sei se eu consigo entrar nesse time dos sonhos..." diz Jorge Justo, um garoto timido
                            e muito desastrado que sonha em entrar no time de vôlei da sua escola.
                            até que de repente o lider do time de vôlei chama ele pra entrar no time. veja as
                            atrapalhadas e evoluções do gigante desastrado.

                        </p>

                        <!-- Duração -->
                        <p class="duration">
                            <strong>Duração:</strong> 115 minutos
                        </p>

                        <!-- Data de Lançamento -->
                        <p class="release-date">
                            <strong>Lançamento:</strong> 03 de Novembro de 2024
                        </p>

                        <!-- Gênero -->
                        <p class="genre">
                            <strong>Gênero:</strong> Aventura e Comédia
                        </p>

                        <p class="rating">
                            <Strong>Nota:</Strong> 8
                        </p>

                        <!-- Botão de Compra de Ingresso -->
                        <?php if (isset($_SESSION['usuario'])): ?>
    <a href="ingresso_filme/ingresso_time.html" class="buy-ticket">Comprar Ingresso</a>
<?php else: ?>
    <a href="#" class="buy-ticket" onclick="alert('Por favor, faça login para comprar ingressos.');">Comprar Ingresso</a>
<?php endif; ?>
                    </div>
                </div>

                <!--Elenco Filme-->

                <div class="movie-cast">
                    <h3>Elenco</h3>
                    <div class="cast-container">
                        <div class="cast-item">
                            <img src="assets/atores/jorge.jfif">
                            <p class="actor-name">Pedro Henrique</p>
                        </div>
                        <!-- Ator 2-->
                        <div class="cast-item">
                            <img src="assets/atores/danilo.jfif" alt="Ator 1">
                            <p class="actor-name">Danilo Ruan</p>
                        </div>
                        <!-- Ator 3 -->
                        <div class="cast-item">
                            <img src="assets/atores/ricardo.jfif" alt="Ator 2">
                            <p class="actor-name">Ricardo Jorge</p>
                        </div>
                        <!-- Ator 4 -->
                        <div class="cast-item">
                            <img src="assets/atores/lili.jfif">
                            <p class="actor-name">Lívia Ester</p>
                        </div>
                    </div>
                </div>

            </main>

            <footer>
                <!-- Conteúdo do footer aqui -->
            </footer>

        </main>


        <!--
    SECTION FOOTER
-->

        <footer>
            <div class="footer-content">

              <div class="footer-band">
                    <img src="assets/imagem-real/TCC2.png" alt="" class="footer-logo">
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
                            <a href="sobrenos.php"> Planos</a>
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
                    <p>&copy; copyright 2024 C-Street</p>
                </div>

                <div class="wrapper">

                    <a href="assets/imagem-real/termosdeuso.pdf">Termos de uso</a>
                </div>

            </div>
        </footer>




    </div>




    <!--
    custom js link
-->



    <!--
    -ionicon link
-->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>

<script src="assets/js/main.js"></script>

<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o comportamento padrão do formulário

        // Obtém o valor pesquisado
        const query = document.getElementById('searchInput').value.trim();

        // Redireciona para a página principal com a pesquisa na URL
        if (query) {
            window.location.href = `index.php?search=${encodeURIComponent(query)}`;
        }
    });
</script>

</html>