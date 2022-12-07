@extends('./layouts/main')

@section('container')
    
    <div class="main-login">
        <div class="left-login">
            <h1>Soccy</h1>
            <p><h4>Para cada nova amizade,<br>
                    uma nova aventura!<br>
                </h4>
            </p>
        </div>


        <div class="right-login">
            <div class="container-login">
                <header>Cadastro</header>

                <div class="progress-barra">
        
                    <div class="step">
                        <p>Nome</p>
                        <div class="bullet">
                        <span>1</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>

                    <div class="step">
                        <p>Perfil</p>
                        <div class="bullet">
                        <span>2</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>

                    <div class="step">
                        <p>Senha</p>
                        <div class="bullet">
                        <span>3</span>
                    </div>
                    <i class="check fa-solid fa-check"></i>
                    </div>
                </div>

                <!-- Validation Errors -->
            <x-validation-errors class="mb-4" :errors="$errors" />

            <div class="form-outer">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="page slide-page">
                        <div class="title">Informações básicas:</div>
                
                        <!-- Name -->
                        <div class="field">
                                <input type="text" class="form_input" name="name" id="name" placeholder=" " value="{{ old('name') }}" required autofocus>
                                <label for="name" class="form_label">Nome</label>
                        </div>

                        <!-- Email -->
                        <div class="field">
                                <input type="email" class="form_input" name="email" id="email" placeholder=" " value="{{ old('email') }}" required autofocus>
                                <label for="email" class="form_label">Email</label>
                        </div>

                        <!-- Username -->
                        <div class="field">
                                <input type="text" class="form_input" name="username" id="username" placeholder=" " value="{{ old('username') }}" required autofocus>
                                <label for="username" class="form_label">Usuário</label>
                        </div>

                        <!-- Btn Next and Previous -->
                        <div class="field">
                            <button type="button" class="firstNext next">Próximo</button>
                        </div>

                        <div class="field-link mt-2">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/login">
                            Já tem uma conta? Entrar
                            </a>
                        </div>
                        
                    </div>

                    <div class="page">
                        <!-- Pronoun -->
                        <div class="field">
                                <input type="text" class="form_input" name="pronoun" id="pronoun" placeholder=" " value="{{ old('pronoun') }}" required autofocus>
                                <label for="pronoun" class="form_label">Pronome</label>
                        </div>

                        <!-- Description -->
                        <div class="field">
                                <input type="text" class="form_input" name="bio" id="bio" placeholder=" " value="{{ old('bio') }}" required autofocus>
                                <label for="bio" class="form_label">Bio</label>
                        </div>

                        <!-- Birthday -->
                        <div class="field">
                                <input type="date" class="form_input" name="date" id="date" placeholder=" " value="{{ old('date') }}" required autofocus>
                                <label for="date" class="form_label">Usuário</label>
                        </div>

                        <div class="field btns">
                            <button type="button" class="prev-1 prev">Anterior</button>
                            <button type="button" class="next-1 next">Próximo</button>
                        </div>

                        <div class="field-link mt-2">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/login">
                            Já tem uma conta? Entrar
                            </a>
                        </div>
                    </div>

                    <div class="page">

                        <!-- Password -->
                        <div class="field">
                                <input type="password" class="form_input" name="password" id="password" placeholder=" " required autocomplete="new-password">
                                <label for="password"  class="form_label">Senha</label>
                                <div id="icon" onclick="showHide()"></div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="field">
                                <input type="password" class="form_input" name="password_confirmation" id="password_confirmation" placeholder=" " required />
                                <label for="password_confirmation"  class="form_label">Confirmar senha</label>
                        </div>

                        <div class="field btns">
                            <button type="button" class="prev-2 prev">Anterior</button>
                            <button class="submit" type="submit">Criar</button>
                        </div>

                        <div class="field-link mt-2">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/login">
                            Já tem uma conta? Entrar
                            </a>
                        </div>
                    </div>

                    
                </form>
            </div>
            </div>

            
            

        </div>

    </div>

<script>
    // ======== MOSTRAR E ESCONDER SENHA ========
    const password = document.getElementById('password');
    const cpassword = document.getElementById('cpassword');
    const icon = document.getElementById('icon');

    function showHide(){
        if(password.type === 'password'){
            password.setAttribute('type','text');
            icon.classList.add('hide')
        }
        else{
            password.setAttribute('type', 'password');
            icon.classList.remove('hide')
        }
    }

    const slidePage = document.querySelector(".slide-page");
    const nextBtnFirst = document.querySelector(".firstNext");
    const prevBtnSec = document.querySelector(".prev-1");
    const nextBtnSec = document.querySelector(".next-1");
    const prevBtnThird = document.querySelector(".prev-2");
    const nextBtnThird = document.querySelector(".next-2");
    const prevBtnFourth = document.querySelector(".prev-3");
    const submitBtn = document.querySelector(".submit");
    const progressText = [...document.querySelectorAll(".step p")];
    const progressCheck = [...document.querySelectorAll(".step .check")];
    const bullet = [...document.querySelectorAll(".step .bullet")];
    let max = 3;
    let current = 1;

    //Botão Próximo
    nextBtnFirst.addEventListener("click", function(){
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
    });
    nextBtnSec.addEventListener("click", function(){
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
    });


   

    //Barra de Progresso
    prevBtnSec.addEventListener("click", function(){
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
    });
    prevBtnThird.addEventListener("click", function(){
    slidePage.style.marginLeft = "-25%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
    });
    prevBtnFourth.addEventListener("click", function(){
    slidePage.style.marginLeft = "-50%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
    });

</script>

@endsection