
<ul class="sidebar-nav" id="sidebar-nav">


    {{-- <li class="nav-item">
      <a class="nav-link " href="index.html">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li> --}}

    <h2>Menú</h2>

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Administración Control</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('categorias.index') }}">
                    <i class="bi bi-circle"></i><span>Categorias</span>
                </a>
            </li>
        </ul>

        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('subcategorias.index') }}">
                    <i class="bi bi-circle"></i><span>Subcategorias</span>
                </a>
            </li>
        </ul>

        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('items.index') }}">
                    <i class="bi bi-circle"></i><span>Items</span>
                </a>
            </li>
        </ul>

        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('giros.index') }}">
                    <i class="bi bi-circle"></i><span>Giros de Negocio</span>
                </a>
            </li>
        </ul>

    </li>

    <li class="nav-item_l">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Extracción Minera</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <li>
                <a href="{{ route('pems.index') }}">
                    <i class="bi bi-circle"></i><span>Ubicaciones</span>
                </a>
            </li>

            <li>
                <a href="{{ route('ingresos.index') }}">
                    <i class="bi bi-circle"></i><span>Ingresos</span>
                </a>
            </li>

            <li>
                <a href="{{ route('graficos.index') }}">
                    <i class="bi bi-circle"></i><span>Graficos</span>
                </a>
            </li>


        </ul>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Planta de Proceso Materia Prima</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('graficos.index') }}">
                    <i class="bi bi-circle"></i><span>Graficos</span>
                </a>
            </li>

            <li>
                <a href="{{ route('primas.index') }}">
                    <i class="bi bi-circle"></i><span>Ubicaciones</span>
                </a>
            </li>

            <li>
                <a href="{{ route('primas_ingresos.index') }}">
                    <i class="bi bi-circle"></i><span>Ingresos</span>
                </a>
            </li>
        </ul>
    </li>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              {{  Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
</ul>



</ul>
