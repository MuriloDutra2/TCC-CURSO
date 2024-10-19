<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C-Street</title>
    <!--
    CSS link    
-->

    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/media_query.css">
    <!--
    Link font
-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

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
                        <li><a href="#movies" class="navbar-link">Nossos filmes</a></li>
                        <li><a href="#category" class="navbar-link">Alimentos</a></li>
                        <li><a href="contato.html" class="navbar-link">Contato</a></li>
                    </ul>
                </nav>

                <div class="navbar-actions">

                    <!-- BARRA DE PESQUISA-->
                    <form id="searchForm" class="navbar-form" method="GET">
                        <input type="text" id="searchInput" name="search" placeholder="Eu estou procurando por..." class="navbar-form-search">
                        <button type="submit" class="navbar-form-btn">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>

                        <button type="button" class="navbar-form-close">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </button>
                    </form>

                    <!--botao de pesquisa pra tela menor-->
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

            <!--
    #banner 
    
-->

            <section class="banner">
                <div class="banner-card">
                    <img src="assets/imagem-real/banner3.jfif" class="banner-img" alt="">

                    <div class="card-content">
                        <div class="card-info">
                            <div class="genre">
                                <ion-icon name="film"></ion-icon>
                                <span>Comedia/Familia</span>
                            </div>


                            <div class="year">
                                <icon-icon name="calendar"></icon-icon>
                                <span>2023</span>
                            </div>

                            <div class="duration">
                                <ion-icon name="time"></ion-icon>
                                <span>1h 30m</span>
                            </div>

                            <div class="quality">4K</div>


                        </div>

                        <h2 class="card-title">Os Batata</h2>
                    </div>

                </div>
            </section>




            <!--
    #FILMES SECTION
-->
            <section class="movies">

                <!--
    filter bar    
-->
                <div class="filter-bar">
                    <div class="filter-dropdowns">
                        <select name="genre" id="genre" class="genre">
                            <option value="all genres">Todos os Gêneros</option>
                            <option value="acao">Ação</option>
                            <option value="aventura">Aventura</option>
                            <option value="terror">Terror</option>
                            <option value="suspense">Suspense</option>
                            <option value="comedia">Comédia</option>
                            <option value="drama">Drama</option>
                            <option value="misterio">Mistério</option>
                            <option value="documentario">Documentário</option>
                        </select>

                        <select name="year" id="year" class="year">
                            <option value="all years">Todos os anos</option>
                            <option value="2024">2024</option>
                            <option value="2020-2023">2020-2023</option>
                            <option value="2010-2019">2010-2019</option>
                            <option value="2000-2009">2000-2009</option>
                        </select>
                    </div>

                    <div class="filter-radios">
                        <input type="radio" name="grade" id="featured" value="principal">
                        <label for="featured">Principais</label>

                        <input type="radio" name="grade" id="popular" value="popular">
                        <label for="popular">Popular</label>

                        <input type="radio" name="grade" id="newest" value="novo">
                        <label for="newest">Novos</label>
                    </div>

                </div>




                <!--
movies grid
-->

                <div id="movies" class="movies-grid">

                    <!--FILME 1-->

                    <div class="movie-card">

                        <div class="card-head">

                            <a href="filho_do_homem.php">
                                <img src="assets/image_movie/filme1.jpg" alt="O filho do Homem" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark" id="document.">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>7.5</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                        </div>

                        <div class="card-body">
                            <h3 class="card-title">
                                O Filho Do Homem
                            </h3>

                            <div class="card-info">
                                <span class="genre">Aventura/Drama</span>
                                <span class="year">2024</span>
                            </div>
                        </div>

                        </a>
                    </div>


                    <!--FILME 2-->
                    <div class="movie-card">

                        <div class="card-head">

                            <a href="maldicao_do_parque.html">
                                <img src="assets/image_movie/filme2.jpg" alt="filme2" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>9.5</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                        </div>

                        <div class="card-body">
                            <h3 class="card-title">
                                A Maldição Do Parque
                            </h3>

                            <div class="card-info">
                                <span class="genre">Suspense</span>
                                <span class="year">2022</span>
                            </div>
                        </div>

                        </a>
                    </div>

                    <!--FILME 3-->
                    <div class="movie-card">

                        <div class="card-head">
                            <a href="noite_eterna_azul.html">
                                <img src="assets/image_movie/filme3.jpg" alt="filme3" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>9.5</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                        </div>

                        <div class="card-body">
                            <h3 class="card-title">
                                Noite Eterna Azul
                            </h3>

                            <div class="card-info">
                                <span class="genre">Terror/Suspense</span>
                                <span class="year">2021</span>
                            </div>
                        </div>

                        </a>
                    </div>

                    <!--FILME 4-->
                    <div class="movie-card">

                        <div class="card-head">
                            <a href="mr_romero.html">
                                <img src="assets/image_movie/filme4.jpg" alt="" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>10</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                        </div>

                        <div class="card-body">
                            <h3 class="card-title">
                                Mr. Romero
                            </h3>

                            <div class="card-info">
                                <span class="genre">Comédia/Aventura </span>
                                <span class="year">2000</span>
                            </div>
                        </div>

                        </a>
                    </div>

                    <!--FILME 5-->
                    <div class="movie-card">
                        <a href="time_dos_sonhos.html">

                            <div class="card-head">
                                <img src="assets/image_movie/filme5.jpg" alt="" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>8</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                            </div>

                            <div class="card-body">

                                <h3 class="card-title">
                                    O Time Dos Sonhos
                                </h3>

                                <div class="card-info">
                                    <span class="genre">Aventura/Comédia</span>
                                    <span class="year">2015</span>
                                </div>
                            </div>
                        </a>

                    </div>
                    <!--FILME 6-->
                    <div class="movie-card">
                        <a href="olhos_felinos.html">

                            <div class="card-head">
                                <img src="assets/image_movie/filme6.jpg" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>10</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <h3 class="card-title">
                                    Olhos Felinos
                                </h3>

                                <div class="card-info">
                                    <span class="genre">Terror/Suspensa</span>
                                    <span class="year">2024</span>
                                </div>
                            </div>

                        </a>
                    </div>

                    <!--FILME 7-->
                    <div class="movie-card">

                        <div class="card-head">
                            <a href="tempo_de_morte.html">
                                <img src="assets/image_movie/filme7.jpg" alt="" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>8.6</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                        </div>

                        <div class="card-body">
                            <h3 class="card-title">
                                Tempos de Morte
                            </h3>

                            <div class="card-info">
                                <span class="genre">Suspense/Crime</span>
                                <span class="year">2017</span>
                            </div>
                        </div>

                        </a>
                    </div>

                    <!--FILME 8-->
                    <div class="movie-card">
                        <a href="mdp.html">

                            <div class="card-head">
                                <img src="assets/image_movie/filme8.jpg" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>8.5</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <h3 class="card-title">
                                    M.D.P (Meninos de Preto)
                                </h3>

                                <div class="card-info">
                                    <span class="genre">Comédia/Misterio</span>
                                    <span class="year">2007</span>
                                </div>
                            </div>

                        </a>
                    </div>

                    <!--FILME 9-->
                    <div class="movie-card">
                        <a href="desconhecido.php">

                            <div class="card-head">
                                <img src="assets/image_movie/filme9.jpg" alt="" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>7</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <h3 class="card-title">
                                    O Desconhecido
                                </h3>

                                <div class="card-info">
                                    <span class="genre">Documentário</span>
                                    <span class="year">2018</span>
                                </div>
                            </div>

                        </a>
                    </div>


                    <!--FILME 10-->
                    <div class="movie-card">
                        <a href="punhos_de_aco.html">
                            <div class="card-head">
                                <img src="assets/image_movie/filme10.jpg" alt="" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>9.5</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <h3 class="card-title">
                                    Punhos de Aço
                                </h3>

                                <div class="card-info">
                                    <span class="genre">Ação/Drama</span>
                                    <span class="year">2010</span>
                                </div>
                            </div>
                        </a>

                    </div>


                    <!--FILME 11-->
                    <div class="movie-card">

                        <a href="atirando_alto.php">

                            <div class="card-head">
                                <img src="assets/image_movie/filme11.jpg" alt="" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>8</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <h3 class="card-title">
                                    Atirando Alto
                                </h3>

                                <div class="card-info">
                                    <span class="genre">Drama/Comédia</span>
                                    <span class="year">2024</span>
                                </div>
                            </div>

                        </a>
                    </div>


                    <!--FILME 12-->
                    <div class="movie-card">
                        <a href="olhinhos_de_ceu.html">

                            <div class="card-head">
                                <img src="assets/image_movie/filme12.jpg" alt="" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>9</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <h3 class="card-title">
                                    Olhinhos de Céu
                                </h3>

                                <div class="card-info">
                                    <span class="genre">Comédia/Mistério</span>
                                    <span class="year">2020</span>
                                </div>
                            </div>

                        </a>
                    </div>

                    <!--FILME 13-->
                    <div class="movie-card">
                        <a href="busca_pela_verdade.php">

                            <div class="card-head">
                                <img src="assets/image_movie/filme13.jpg" alt="" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>10</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <h3 class="card-title">
                                    Busca Pela Verdade
                                </h3>

                                <div class="card-info">
                                    <span class="genre">Suspense/Terror</span>
                                    <span class="year">2014</span>
                                </div>
                            </div>

                        </a>
                    </div>

                    <!--FILME 14-->
                    <div class="movie-card">
                        <a href="historia_de_mung.php">

                            <div class="card-head">
                                <img src="assets/image_movie/filme15.jpg" alt="" class="card-img">

                                <div class="card-overlay">

                                    <div class="bookmark">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>


                                    <div class="rating">
                                        <ion-icon name="star-outline"></ion-icon>
                                        <span>10</span>
                                    </div>

                                    <div class="play">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <h3 class="card-title">
                                    A Historia De Mung
                                </h3>

                                <div class="card-info">
                                    <span class="genre">Ação/Aventura</span>
                                    <span class="year">2006</span>
                                </div>
                            </div>

                        </a>
                    </div>



                </div>

                <!--Mais filmes button-->

                <button class="load-more">MAIS FILMES</button>



            </section>


            <!--    CATEGORY SECTION
CATEGORIA SECTION
-->

            <section class="category" id="category">
                <h2 class="section-heading">Alimentos</h2>

                <section class="ad-section">
                    <div class="ad-container">
                        <img src="assets/propaganda/4.png" alt="Propaganda 1">
                        <img src="assets/propaganda/5.png" alt="Propaganda 2">
                        <img src="assets/propaganda/6.png" alt="Propaganda 3">
                    </div>
                </section>

            </section>

            <!--
    #SECTION  YOUTUBE
-->

            <section class="live" id="live">
                <h2 class="section-heading">Nosso mais novo filme</h2>
                <div class="video-container">
                    <video controls>
                        <source src="assets/imagem-real/trailer.mp4">
                        Seu navegador não suporta o elemento de vídeo.
                    </video>
                </div>
            </section>





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

                        <a href=""> <ion-icon name="logo-twitter"></ion-icon> </a>
                        <a href=""> <ion-icon name="logo-instagram"></ion-icon> </a>
                        <a href=""> <ion-icon name="logo-tiktok"></ion-icon> </a>
                        <a href=""> <ion-icon name="logo-youtube"></ion-icon></a>

                    </div>
                </div>


                <div class="footer-links">
                    <ul>
                        <h4 class="link-heading">
                            C-street
                        </h4>

                        <li class="link-item">
                            <a href="sobrenos.html">Sobre-nós</a>
                        </li>
                        <li class="link-item">
                            <a href="sobrenos.html"> Nossa missão</a>
                        </li>
                        <li class="link-item">
                            <a href="sobrenos.html"> Planos</a>
                        </li>
                        <li class="link-item">
                            <a href="contato.html"> Contato</a>
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
                            <a href="maldicao_do_parque.html"> Maldição do Parque </a>
                        </li>
                        <li class="link-item">
                            <a href="noite_eterna_azul.html"> Noite Eterna Azul </a>
                        </li>
                        <li class="link-item">
                            <a href="mr_romero.html"> Mr.Romero </a>
                        </li>
                    </ul>

                    <ul>

                        <li class="link-item">
                            <a href="time_dos_sonhos.html"> O Time dos Sonhos </a>
                        </li>

                        <li class="link-item">
                            <a href="olhos_felinos.html"> Olhos Felinos </a>
                        </li>

                        <li class="link-item">
                            <a href="tempo_de_morte.html"> Tempo de Morte</a>
                        </li>

                        <li class="link-item">
                            <a href="mdp.html"> M.D.P. </a>
                        </li>
                    </ul>

                    <ul>



                        <li class="link-item">
                            <a href="desconhecido.php"> O Desconhecido </a>
                        </li>
                        <li class="link-item">
                            <a href="punhos_de_aco.html"> Punhos de Aço </a>
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
                    <a href="#">Política de Privacidade</a>
                    <a href="#">Termos de uso</a>
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

<script>
    // Função para obter os parâmetros da URL
    function getQueryParameter(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    // Pega o termo de pesquisa da URL
    const searchQuery = getQueryParameter('search');

    if (searchQuery) {
        // Se houver um termo de pesquisa, faz a requisição AJAX para buscar os filmes
        fetch(`resultado.php?search=${encodeURIComponent(searchQuery)}`)
            .then(response => response.json())
            .then(data => {
                displaySearchResults(data); // Chama a função que renderiza os resultados
            })
            .catch(error => console.error('Erro ao buscar os filmes:', error));
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const params = new URLSearchParams(window.location.search);
        const searchQuery = params.get('search');

        if (searchQuery) {
            // Chama a API para buscar filmes com base na pesquisa
            fetch(`resultado.php?search=${encodeURIComponent(searchQuery)}`)
                .then(response => response.json())
                .then(data => {
                    displaySearchResults(data);
                })
                .catch(error => {
                    console.error('Erro ao buscar filmes:', error);
                });
        }
    });
</script>



<script src="assets/js/main.js"></script>

<script src="assets/js/buscar_filmes.js"></script>




</html>