<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://kevinposada.es" class="simple-text logo-normal">
      {{ __('WFS || CPanel') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      @can('users.index')
        <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#usersDrop" aria-expanded="true">
            <i><img style="width:25px" src="{{ asset('img/laravel.svg') }}"></i>
            <p>{{ __('Control Usuarios') }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse show" id="usersDrop">
            <ul class="nav">
              @can('users.index')
                <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('users.index') }}">
                    <span class="sidebar-mini"> U </span>
                    <span class="sidebar-normal">{{ __('Users') }} </span>
                  </a>
                </li>
              @endcan
              @can('users.create')
                <li class="nav-item{{ $activePage == 'usersCreate' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('users.create') }}">
                    <span class="sidebar-mini"> U </span>
                    <span class="sidebar-normal">{{ __('Crear Ususario') }} </span>
                  </a>
                </li>
              @endcan
            </ul>
          </div>
        </li>
      @endcan
      
      <li class="nav-item{{ $activePage == 'products' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('products.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Products List') }}</p>
        </a>
      </li>


      {{-- Profile --}}
      <li class="nav-item {{ ($activePage == 'profile') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#profileDrop" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('img/laravel.svg') }}"></i>
          <p>{{ __('Perfil de usuario') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="profileDrop">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'billing' ? ' active' : '' }}">
              <a class="nav-link" href="#">
                {{-- <a class="nav-link" href="{{ route('billing.index') }}"> --}}
                <span class="sidebar-mini"> F </span>
                <span class="sidebar-normal">{{ __('Facturación') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>





    </ul>
  </div>
</div>
