<link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/images') }}">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <div class="main-login">
            <div class="left-login">
                <h1>Soccy</h1>
                <p><h4>Não é sobre números,<br> 
                    é sobre conexão!</h4>
                </p>
            </div>

            <div class="right-login">
                <div class="container-login">
                    <header>Login</header>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-4" :errors="$errors" />

                    <div class="form-outer">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="page">
                                <!-- Email -->
                                <div class="field">
                                    <input type="text" class="form_input" name="email" value="{{ old('email') }}" placeholder=" " required="required" autofocus>
                                    <label class="form_label">E-mail</label>
                                </div>
                    
                                <!-- Password -->
                                <div class="field">
                                    <input type="password" class="form_input" name="password" id="password" placeholder=" " required autocomplete="new-password">
                                    <label for="password"  class="form_label">Senha</label>
                                    <div id="icon" onclick="showHide()"></div>
                                </div>
                    
                                <!-- Remember Me -->
                                <div class="field-link">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Lembre-se de mim') }}</span>
                                    </label>
                                </div>
                    
                                <!-- Forgotten your password -->
                                <div class="field-link mt-2">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu sua senha?') }}
                                        </a>
                                    @endif
                                </div>
                    
                                    <div class="field btns">
                                        <button class="submit" type="submit">Entrar</button>
                                    </div>
                                    
                                    <div class="field-link mt-2">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/register">
                                        Não tem uma conta? Crie agora
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
        </script>

