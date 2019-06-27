
<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="{{ route('admin,dashboard')}}" class="simple-text logo-normal">
        Mamma's Kitchen
        </a>
      </div>
      <div class="sidebar-wrapper">
<ul class="nav">
         
          <li class=" nav-item {{ Request::is('admin/dashboard','admin') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin,dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
        
          <li class=" nav-item {{ Request::is('admin/reservation') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reservation.index') }}">
              <i class="material-icons">chrome_reader_mode</i>
              <p>Reservas</p>
            </a>
          </li>

          <li class=" nav-item {{ Request::is('admin/prato') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('prato.index') }}">
              <i class="material-icons">chrome_reader_mode</i>
              <p>Pratos</p>
            </a>
          </li>
          <li class=" nav-item {{ Request::is('admin/bebida') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('bebida.index') }}">
              <i class="material-icons">chrome_reader_mode</i>
              <p>Bebidas</p>
            </a>
          </li>
          <li class=" nav-item {{ Request::is('admin/mesa') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('mesa.index') }}">
              <i class="material-icons">chrome_reader_mode</i>
              <p>Mesas</p>
            </a>
          </li>
          <li class=" nav-item {{ Request::is('admin/cliente') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('cliente.index') }}">
              <i class="material-icons">people</i>
              <p>Clientes</p>
            </a>
          </li>
          <li class=" nav-item {{ Request::is('admin/pedido','admin/pedido/create') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pedido.index') }}">
              <i class="material-icons">chrome_reader_mode</i>
              <p>Pedidos</p>
            </a>
          </li>
          <li class=" nav-item {{ Request::is('admin/slider','admin/slider/create') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('slider.index') }}">
              <i class="material-icons">slideshow</i>
              <p>Sliders</p>
            </a>
          </li>
          <li class=" nav-item {{ Request::is('admin/contacto') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('contacto.index') }}">
              <i class="material-icons">chat</i>
              <p>Contactos <span class="notifications pull-right">{{ $contactoCount }}</span></p>
            </a>
          </li>

          <!--<li class=" nav-item {{ Request::is('admin/contacto') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('contacto.index') }}">
              <i class="material-icons">chat</i>
              <p class="d-lg-none d-md-block">Contactos </p>
              <span class="notification">{{ $contactoCount }}</span>

             
            </a>
          </li>-->
        
        </ul>
      </div>
    </div>