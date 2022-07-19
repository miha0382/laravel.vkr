@section('header')
@auth('web')
<div class="nav-scroller bg-body shadow-sm">
  <nav class="navbar nav-underline" aria-label="Secondary navigation">
    <div class="container">
        <a class=""  href="{{ route('home') }}"><img src="{{ asset('images/main-icon.png') }}"  width="60" height="60"></a>       
        <a class="nav-link" id="customersLink" href="{{ route('customers') }}">Клиенты</a>
        <a class="nav-link" id="servicesLink" href="{{ route('services') }}">Услуги</a>
        <a class="nav-link" id="optionsLink" href="{{ route('options') }}">Настройки лояльности</a>
        <a class="nav-link" id="calculatorLink" href="{{ route('calculator') }}">Рассчитать стоимость</a>
        <a class="nav-link" id="transactionsLink" href="{{ route('transactions') }}">История транзакций</a>

        @if(Route::current()->getName() == 'customers')
        <script>
          let link = document.getElementById('customersLink');
          link.style.fontSize = '20px';
        </script>
        @endif
        @if(Route::current()->getName() == 'services')
        <script>
          let link = document.getElementById('servicesLink');
          link.style.fontSize = '20px';
        </script>
        @endif
        @if(Route::current()->getName() == 'options')
        <script>
          let link = document.getElementById('optionsLink');
          link.style.fontSize = '20px';
        </script>
        @endif
        @if(Route::current()->getName() == 'calculator')
        <script>
          let link = document.getElementById('calculatorLink');
          link.style.fontSize = '20px';
        </script>
        @endif
        @if(Route::current()->getName() == 'transactions')
        <script>
          let link = document.getElementById('transactionsLink');
          link.style.fontSize = '20px';
        </script>
        @endif

        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">{{ __('Профиль') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Выход</a>
                
            </div>
        </div>
    </div>
  </nav>
</div>
@endauth