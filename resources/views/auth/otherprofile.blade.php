@extends('./layouts/navbar')

@section('navbar')
<body class="home">

    <nav class="nav bg-white border-b border-gray-100">
        <div class="container">
            <h4>Soccy</h4>

            <form class="search-bar d-flex" role="search" action="/home" method="GET"> 
                <i class="uil uil-search"></i>
                <input type="search" id="search" name="search-post" placeholder="Pesquisar tópico">
                <button type="submit" class="search-btn">Pesquisar</button>
            </form>

            <div class="dropdown">
                    <img class="profile-photo dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    src="/img/{{Auth()->user()->avatar}}"
                    >

                    <ul class="dropdown-menu">
                        @auth
                        <h3>{{ Auth::user()->name }}<br>
                        <span>{{ Auth::user()->username }}</span></h3>
                        @endauth

                        <li><a class="dropdown-item" href="/home">
                            <i class="uil uil-home"></i>
                            <p>Início</p></a>
                        </li>
                        <li><a class="dropdown-item" href="/profile">
                            <i class="uil uil-user"></i>
                            <p>Perfil</p></a>
                        </li>
                        <li><a class="dropdown-item" href="/edit-profile">
                            <i class="uil uil-setting"></i>
                            <p>Configurações</p> </a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a href="route('logout')" 
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            <i class="uil uil-signout"></i><p>Sair</p>
                            </a>
                        </li>  
                        </form>
                    </ul>
            </div>
        </div>
        
    </nav>

    <!---------------------- MAIN ---------------------->
    <main class="main-home">
        <div class="container">
            <!-- ========== LEFT ========== -->
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <img src="/img/{{Auth()->user()->avatar}}">
                    </div>
                    <div class="handle">
                        <h6>{{Auth()->user()->name}}</h6>
                        <p class="text-muted">{{Auth()->user()->username}}</p>
                    </div>
                </a>

                <!--------------- SIDEBAR --------------->
                <div class="sidebar">
                    <a class="menu-item" href="/home">
                        <span><i class="uil uil-home"></i></span> <h3>Início</h3>
                    </a>
                    <a class="menu-item" href="/humor">
                        <span><i class="uil uil-grin-tongue-wink-alt"></i></span> <h3>Humor</h3>
                    </a>
                    <a class="menu-item" href="/agenda">
                        <span><i class="uil uil-calendar-alt"></i></span> <h3>Agenda</h3>
                    </a>
                    <a class="menu-item" href="/lista">
                        <span><i class="uil uil-clipboard-notes"></i></span> <h3>Listas</h3>
                    </a>
                    <a class="menu-item active" href="/profile">
                        <span><i class="uil uil-user"></i></span> <h3>Perfil</h3>
                    </a>
                    <a class="menu-item" href="/edit-profile">
                        <span><i class="uil uil-setting"></i></span> <h3>Configurações</h3>
                    </a>
                </div>
                <!---------- END OF SIDEBAR ---------->
                    <button type="button" class="botao" data-bs-toggle="modal" data-bs-target="#postModal">
                        Criar post
                    </button> 
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Criar Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
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
                    </div>
                </div>
            </div>
                
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            
    <!-- ========= HUMOR ============ -->

        <div class="modal fade" id="modalHumor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Como você está se sentindo hoje?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                    <div class="container px-sm-0 my-sm-0">
                        @if (isset ($humor))
                        <form id="contactForm" action="/humor/{{$humor->id}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @else
                            <form action="/humor" method="POST">
                            @endif
                            @csrf
                        
                            <div class="form-floating mb-3">
                                <input class="form-control" name="humor" id="nomeDoTopico" type="text" placeholder="Hoje estou..." data-sb-validations="required" />
                                <label for="nomeDoTopico">Hoje estou me sentindo...</label>
                                <div class="invalid-feedback" data-sb-feedback="nomeDoTopico:required">Humor é obrigatório.</div>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary" id="submitButton" type="submit"><P>Postar</P></button>
                            </div>
                            
                        </form>
                    </div>
                    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

            <!-- ========== MIDDLE ========== -->
            <div class="middle">

                <div class="perfil">
                    <div class="row justify-content-start">
                        <div class="col-4 profile-photo">
                            <img src="/img/{{$profile->avatar}}">
                        </div>
                        <div class="col-4">
                            <h4 id="nome_usuario">{{$profile->name}}</h4>
                            <div class="mb-3">
                                <h5>{{$profile->username}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="count row justify-content-center">
                            <div class="count col-3">
                                <h6>{{count($profile->post)}} Post</h6>
                            </div>
                            <div class="count col-3">
                                <h6>{{ count($profile->followers) }} Seguidores</h6>
                            </div>
                            <div class="count col-3 mb-3">
                                <h6>{{ count($profile->following)}} Seguindo</h6>
                            </div>
                    </div>

                    <div class="row justify-content-center">
                            <div class="col-9">
                                <h6>Pronome {{$profile->pronoun}}</h6>
                            </div>
                            <div class="col-9">
                                <h6>Bio {{$profile->bio}}</h6>
                            </div>
                            <div class="col-9">
                                <h6>Aniversário {{$profile->date}}</h6>
                            </div>
                    </div>
                </div>

                <div class="perfil">
                    <div class="row row-cols-1 row-cols-md-3 g-4 gb-9">
                    @if($post->isEmpty())
                    <div class="col">
                            <div class="mb-3">
                                <h5>Publique seus momentos aqui</h5>
                            </div>
                    </div> 
                    @else
                    @foreach($post as $post)
                        <div class="col">
                            <div class=" h-100 photo-gallery">
                            <a href="/profile/feed/{{$post->id}}">
                            <img src="/images/{{$post->image}}" class="gallery-item card-img-top">
                            </a>
                            </div>
                        </div>
                    @endforeach
                    @endif
                    </div>
                </div>
            </div>

            <div class="right">
                <!-- ====== SUGESTÕES DE AMIZADE ====== -->
                <div class="friend-requests">
                            <h4>Segue</h4>

                    <!-- ====== SOLICITAÇÃO 1 ====== -->
                    @if ($friends->isEmpty())
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <td colspan="3" class="text-center">Este usuário ainda não segue ninguém. </td>
                        </th> 
                        @else
                        @foreach($friends as $friends)
                        <div class="request">
                            <div class="info">
                            <div class="profile-photo">
                                <img src="/img/{{ $friends->avatar }}" alt="">
                            </div>
                            <div>
                                @auth
                                    <h5>{{$friends->name}}</h5>
                                    <p class="text-muted">{{$friends->username}}</p>
                                    </div>
                                </div>
                            @endauth

                            <div class="action-btn">
                                <a href="/profile/{{$friends->id}}" class="view-btn">Ver perfil</a> 
                            </div>

                        </div>
                        @endforeach
                    @endif

                </div>
            </div> <!-- FIM DA DIREITA-->
        </div>
    </main>

    <script>

        

    //SIDEBAR
    const menuItems = document.querySelectorAll('.menu-item');

    const changeActiveItem = () => {
        menuItems.forEach(item => {
            item.classList.remove('active')
    })
    }

        menuItems.forEach(item => {
            item.addEventListener('click', () => {
            changeActiveItem();
            item.classList.add('active');
        })
    })

    //MODAL POSTAGENS
    const wrapper = document.querySelector(".wrapper");
    const fileName = document.querySelector(".file-name");
    const cancelBtn = document.querySelector("#cancel-btn");
    const defaultBtn = document.querySelector("#default-btn");
    const customBtn = document.querySelector("#custom-btn");
    const img =  document.querySelector("img");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

    function defaultBtnActive(){
        defaultBtn.click();
    }

    // Faz aparecer a imagem que vai ser postada

    defaultBtn.addEventListener("change", function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(){
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("active");
            }
            //remover foto
            cancelBtn.addEventListener("click", function(){
                img.src = "";
                wrapper.classList.remove("active");
            });

            reader.readAsDataURL(file);
        }

    // Faz aparecer o nome do arquivo da imagem

        if(this.value){
            let valueStore = this.value.match(regExp);
            fileName.textContent = valueStore;
        }
    });

    </script>


</body>

    <!-- Scripts -->
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

        //laravel que recebe o elemento html (Modal)
        const commentModal = document.getElementById('commentModal');

        
    </script>
@endsection


