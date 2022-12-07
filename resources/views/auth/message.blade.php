<link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/images') }}">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<!-- Link cdn do font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script src="https://kit.fontawesome.com/7504d1f47e.js" crossorigin="anonymous"></script>

<body class="message">
    


    <nav class="nav bg-white border-b border-gray-100">
        <div class="container">
            <h4>Soccy</h4>

            <form class="search-bar d-flex" role="search">
                <i class="uil uil-search"></i>
                <input type="search" placeholder="Pesquisar" aria-label="Search">
            </form>

            <div class="btn-group">
                <div class="icones">
                    <i class="icon uil uil-bell" id="cart-btn"></i>
                    <i class="icon uil uil-envelope" id="login-btn"></i>   
                </div>
            </div>


            <div class="dropdown">
                    <img class="profile-photo dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    src="/images/emilly_perfil.jpg"
                    >

                    <ul class="dropdown-menu">
                        @auth
                        <h3>{{ Auth::user()->name }}<br>
                        <span>{{ Auth::user()->username }}</span></h3>
                        @endauth

                        <li><a class="dropdown-item" href="#">
                            <i class="uil uil-home"></i>
                            <p>Início</p></a>
                        </li>
                        <li><a class="dropdown-item" href="/notification">
                        <i class="icon uil uil-bell"></i>
                            <p>Notificação</p></a>
                        </li>
                        <li><a class="dropdown-item" href="/list">
                        <i class="icon uil uil-envelope"></i>
                            <p>Chat</p></a>
                        </li>
                        <li><a class="dropdown-item" href="#">
                            <i class="uil uil-user"></i>
                            <p>Meu perfil</p></a>
                        </li>
                        <li><a class="dropdown-item" href="#">
                            <i class="uil uil-palette"></i>
                            <p>Tema</p></a>
                        </li>
                        <li><a class="dropdown-item" href="/editprofile">
                            <i class="uil uil-setting"></i>
                            <p>Configurações</p> </a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                        <li><a :href="route('logout')" 
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            <i class="uil uil-signout"></i><p>Sair</p>
                            </a>
                        </li>
                    </ul>
            </div>
    
            <div class="shopping-cart">
                <div class="wrapper">
                <section class="users">

                    <header>
                        <div class="notification-header">
                            <h4>Notificações</h4>
                        </div>
                    </header>

                    <div class="users-list">
                        <a href="#">
                            <div class="content">
                                <img src="/images/emilly_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>comentou na sua postagem</p>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="content">
                                <img src="/images/gaspari_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>curtiu sua postagem</p>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="content">
                                <img src="/images/yuri_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>está seguindo você</p>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="content">
                                <img src="/images/gaspari_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>está seguindo você</p>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="content">
                                <img src="/images/yuri_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>respondeu seu comentário</p>
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="content">
                                <img src="/images/emilly_perfil.jpg" alt="">
                                <div class="details">
                                    <span>@lukinhas</span>
                                    <p>fez um comentário na sua postagem</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </section>
                </div>
            </div>
        
            <div class="login-form">
                <div class="box">

                </div>
            </div>
        </div>
        
    </nav>

    <main class="main-home">
        <div class="container">
            <!-- ========== LEFT ========== -->
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <img src="/img/{{Auth()->user()->image}}">
                    </div>
                    <div class="handle">
                        <h6>{{Auth()->user()->name}}</h6>
                        <p class="text-muted">{{Auth()->user()->username}}</p>
                    </div>
                </a>

                <!--------------- SIDEBAR --------------->
                <div class="sidebar">
                    <a class="menu-item active" href="/home">
                        <span><i class="uil uil-home"></i></span> <h3>Início</h3>
                    </a>
                    <a class="menu-item" data-toggle="modal" data-target="#modalHumor">
                        <span><i class="uil uil-grin-tongue-wink-alt"></i></span> <h3>Humor</h3>
                    </a>
                    <a class="menu-item" href="/agenda">
                        <span><i class="uil uil-calendar-alt"></i></span> <h3>Agenda</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-diary"></i></span> <h3>Diário</h3>
                    </a>
                    <a class="menu-item" href="/lista">
                        <span><i class="uil uil-clipboard-notes"></i></span> <h3>Listas</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-books"></i></span> <h3>Bookmarks</h3>
                    </a>
                </div>
                <!---------- END OF SIDEBAR ---------->
                    <button type="button" class="botao" data-bs-toggle="modal" data-bs-target="#postModal">
                        Criar post
                    </button> 
            </div>

            <!-- Modal Post-->
            <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                                <div class="container px-sm-0 my-sm-0">
                                        <form id="contactForm" action="/post" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="topico" id="nomeDoTopico" type="text" placeholder="Nome do Tópico" data-sb-validations="required"/>
                                            <label for="nomeDoTopico">Nome do Tópico</label>
                                            <div class="invalid-feedback" data-sb-feedback="nomeDoTopico:required">Nome do Tópico é obrigatório.</div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="legenda" id="descricao" type="text" placeholder="Descrição" style="height: 10rem;" data-sb-validations="required"></textarea>
                                            <label for="descricao">Legenda</label>
                                            <div class="invalid-feedback" data-sb-feedback="descricao:required">Descrição é obrigatória.</div>
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Escolher foto</label>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary" id="submitButton" type="submit">Criar</button>
                                        </div>
                                        
                                    </form>
                                </div>
                                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                            </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>

            <div class="middle">
                <div class="wrapper">
                    <section class="chat-area">

                        <header>
                            <a href="/list" class="back-icon"><i class="fa-solid fa-arrow-left"></i></a>
                            <img src="/images/emilly_perfil.jpg" alt="">
                            <div class="details">
                                <span>Julia Evelyn</span>
                                <p>Online</p>
                            </div>
                        </header>

                        <div class="chat-box">
                            <div class="chat outgoing">
                                <div class="details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>

                            <div class="chat incoming">
                            <img src="/images/emilly_perfil.jpg" alt="">
                                <div class="details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>

                            <div class="chat outgoing">
                                <div class="details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>

                            <div class="chat incoming">
                            <img src="/images/emilly_perfil.jpg" alt="">
                                <div class="details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>

                            <div class="chat incoming">
                            <img src="/images/emilly_perfil.jpg" alt="">
                                <div class="details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>

                            <div class="chat outgoing">
                                <div class="details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>

                            <div class="chat incoming">
                            <img src="/images/emilly_perfil.jpg" alt="">
                                <div class="details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>

                            <div class="chat outgoing">
                                <div class="details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>

                        <form action="#" class="typing-area">
                            <input type="text" placeholder="Digite uma mensagem aqui">
                            <button><i class="uil uil-telegram-alt"></i></button>
                        </form>

                        
                    </section>
                </div>
            </div>

                            <!-- Modal -->

                            <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

            <div class="right">
                <!-- ====== SUGESTÕES DE AMIZADE ====== -->
                <div class="friend-requests">
                            <h4>Sugestões de Amizade</h4>

                            <!-- ====== SOLICITAÇÃO 1 ====== -->
                            <div class="request">
                                <div class="info">
                                    <div class="profile-photo">
                                        <img src="./images/profile-15.jpg" alt="">
                                    </div>
                                <div>
                                    <h5>Nome da Pessoa</h5>
                                    <p class="text-muted">8 amigos em comum</p>
                                    </div>
                                </div>

                                <div class="action-btn">
                                    <button type="submit" class="botao btn-botao">Seguir</button>
                                    <button class="botao">Ver perfil</button>
                                </div>

                            </div>

                            <!-- ====== SOLICITAÇÃO 2 ====== -->
                            <div class="request">
                                <div class="info">
                                    <div class="profile-photo">
                                        <img src="./images/profile-15.jpg" alt="">
                                    </div>
                                <div>
                                    <h5>Nome da Pessoa</h5>
                                    <p class="text-muted">8 amigos em comum</p>
                                    </div>
                                </div>

                                <div class="action-btn">
                                    <button type="submit" class="botao btn-botao">Seguir</button>
                                    <button class="botao">Ver perfil</button>
                                </div>

                            </div>

                            <!-- ====== SOLICITAÇÃO 3 ====== -->
                            <div class="request">
                                <div class="info">
                                    <div class="profile-photo">
                                        <img src="./images/profile-15.jpg" alt="">
                                    </div>
                                <div>
                                    <h5>Nome da Pessoa</h5>
                                    <p class="text-muted">8 amigos em comum</p>
                                    </div>
                                </div>

                                <div class="action-btn">
                                    <button class="botao btn-botao">Seguir</button>
                                    <button class="botao">Ver perfil</button>
                                </div>

                            </div>

                            <!-- ====== SOLICITAÇÃO 4 ====== -->
                            <div class="request">
                                <div class="info">
                                    <div class="profile-photo">
                                        <img src="./images/profile-15.jpg" alt="">
                                    </div>
                                <div>
                                    <h5>Nome da Pessoa</h5>
                                    <p class="text-muted">8 amigos em comum</p>
                                    </div>
                                </div>

                                <div class="action-btn">
                                    <button type="submit" class="botao btn-botao">Seguir</button>
                                    <button class="botao">Ver perfil</button>
                                </div>

                            </div>
                </div>
            </div> <!-- FIM DA DIREITA-->

            
        </div>
    </main>

</body>

    <!-- Scripts -->
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    <script>

        let shoppingCart = document.querySelector('.shopping-cart');

        document.querySelector('#cart-btn').onclick = () =>{
            shoppingCart.classList.toggle('active');
            loginForm.classList.remove('active');
            navbar.classList.remove('active');
        }

        let loginForm = document.querySelector('.login-form');

        document.querySelector('#login-btn').onclick = () =>{
            loginForm.classList.toggle('active');
            shoppingCart.classList.remove('active');
            navbar.classList.remove('active');
        }

        //Mostrar e esconder Barra de Pesquisa
        const searchBar = document.querySelector(".search input"),
        searchBtn = document.querySelector(".search button");

        searchBtn.onclick = ()=>{
        searchBar.classList.toggle("active");
        searchBar.focus();
        searchBtn.classList.toggle("active");
        }
    </script>
