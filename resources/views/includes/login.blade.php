<div class="row my-5">
    <div class="col md-4"></div>
        <div class="col md-4">
            <div class="card p-5">
                <main class="form-signin text-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <img class="mb-4" src="{{ asset('images/main-icon.png') }}" alt="" width="100" height="100">
                    <h1 class="h3 mb-3 fw-normal">Войдите в систему</h1>

                    <div class="form-floating my-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email адрес</label>
                    </div>
                   
                    <div class="form-floating my-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Пароль</label>
                    </div>

                    <div class="checkbox my-3">
                    <label>
                        <input type="checkbox" value="remember-me" name="rememberToken"> Запомнить меня
                    </label>
                    </div>
                    
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
                </form>
                </main>
                @include('includes.messages')
            </div>
        </div>
    <div class="col md-4"></div>
</div>