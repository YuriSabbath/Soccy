@extends('./layouts/landing-page')

@section('landing-page')

<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-md navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top"><img src="assets/Soccy2 512x.png" id="logosoccy"></a>
                <h5 id="soccyescrita">Soccy</h5>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">Sobre</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Funcionalidades</a></li>
                    </ul>
                </div>
            </div>
        </nav>  


        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center" id="">
                    <div class="col-lg-8">
                        <h1 class="text-white font-weight-bold">Soccy é a rede social feita para você!</h1>
                        <hr class="divider" />
                        <p class="text-white-75 mb-5">Qual a rede social em que você organiza sua vida, faz amizades e compartilha seus hobbies? A resposta é óbvia, SOCCY!!</p>
                        <a class="btn botao-branco btn-xl" href="/register">Cadastrar-se</a>
                        <a class="btn btn-warning btn-xl text-light" href="/login">Entrar</a>
                    </div>

                    <div class="col-lg-4 d-flex justify-content-center">
                        <img src="assets/smartphone.png" id="imgcelular" alt="">
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section1" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-black mt-0">Nós temos o que você procura!</h2>
                        <hr class="divider" />
                        <p class="text-light mb-4" style="font-size: larger;"> O Soccy foi criado pensando em juntar as suas necessidades em um lugar só. Aqui você encontra de tudo, desde organizar seus filmes em listas até agendar compromissos em sua agenda</p>
                        <a class="btn botao-roxo btn-xl text-light" href="#services">Comece já!</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team-->
        <section class="page-section3" id="team">
            <div class="container">
                <h2 class="text-center mt-0">Nossa equipe de desenvolvedores!</h2>
                <hr class="divider" />
                <div class="row">
                    <div class="col-lg-3">
                        <div class="team-member" >
                            <img class="mx-auto rounded-circle" src="assets/dev - saraiva.jpg" alt="..." />
                            <h4>Vinícius Saraiva</h4>
                            <p class="text-white">Desenvolvedor Back-End</p>
                            <a class="btn btn-dark btn-social mx-3" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="uil uil-instagram" style="color: #7958E9;"></i><a>
                            <a class="btn btn-dark btn-social mx-3" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="uil uil-facebook-f" style="color: #7958E9;"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/dev - lucas.jpg" alt="..." />
                            <h4>Lucas Lima</h4>
                            <p class="text-white">Desenvolvedor Back-End</p>
                            <a class="btn btn-dark btn-social mx-3" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="uil uil-instagram" style="color: #7958E9;"></i><a>
                                <a class="btn btn-dark btn-social mx-3" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="uil uil-facebook-f" style="color: #7958E9;"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/dev - julia.jpg" alt="..." />
                            <h4>Júlia Evelyn</h4>
                            <p class="text-white">Desenvolvedora Front-End</p>
                            <a class="btn btn-dark btn-social mx-3" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="uil uil-instagram" style="color: #7958E9;"></i><a>
                            <a class="btn btn-dark btn-social mx-3" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="uil uil-facebook-f" style="color: #7958E9;"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/dev - yuri.jpg" alt="..." />
                            <h4>Yuri Gonçalves</h4>
                            <p class="text-white">Desenvolvedor Front-End</p>
                            <a class="btn btn-dark btn-social mx-3" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="uil uil-instagram" style="color: #7958E9;"></i><a>
                            <a class="btn btn-dark btn-social mx-3" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="uil uil-facebook-f" style="color: #7958E9;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services-->
        <section class="page-section2" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0 text-white">A sua disposição</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-calendar-check fs-1 icones"></i></div>
                            <h3 class="h4 mb-2">Agenda</h3>
                            <p class="text-light mb-0">Planeje seus dias com mais facilidade e transparência através de nossa agenda.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-book fs-1 icones"></i></div>
                            <h3 class="h4 mb-2">Listas</h3>
                            <p class="text-light mb-0">Organize em listas seus hobbies!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-share fs-1 icones"></i></div>
                            <h3 class="h4 mb-2">Publicações</h3>
                            <p class="text-light mb-0">Compartilhe com seus amigos o que você está fazendo!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart fs-1 icones"></i></div>
                            <h3 class="h4 mb-2">Amizades</h3>
                            <p class="text-light mb-0">Faça novas amizades através de seus hobbies!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-black">Copyright &copy; 2022 - Soccy Enterprise</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>

@endsection