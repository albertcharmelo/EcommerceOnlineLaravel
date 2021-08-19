<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mt-3">
            <a href="index.html"><img src="{{ asset('assets/img/devian rd.png') }}" alt="Logo DeviaRD" width="70"
                    height="70" srcset=""></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm mt-3">
            <a href="index.html"><img src="{{ asset('assets/img/devian-iso.png') }}" alt="Logo DeviaRD" width="50"
                    height="50" srcset=""></a>
        </div>
        <ul class="sidebar-menu mt-4">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/panel/dashboard/tienda') }}">Tienda</a></li>
                    <li><a class="nav-link" href="{{ url('/panel/dashboard/blog') }}">Blog</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Administración</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/panel/administracion/create/usuario') }}">Crear
                            usuario publicador</a></li>
                    <li><a class="nav-link" href="{{ url('') }}">Tipo de Documentos</a>
                    </li>

                </ul>
            </li>
            <li class="menu-header">Tienda</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-mobile-alt"></i>
                    <span>Almacén</span></a>
                <ul class="dropdown-menu">
                    {{-- <li><a class="nav-link" href="layout-default.html">Inventario</a></li> --}}
                    <li><a class="nav-link" href="{{ url('/panel/articulos/create/articulos') }}">Productos</a></li>
                    <li><a class="nav-link" href="{{ url('/panel/articulos/create/categoria') }}">Categorías</a></li>
                    <li><a class="nav-link" href="{{ url('') }}">Unidades de Medida</a></li>
                    {{-- <li><a class="nav-link" href="layout-top-navigation.html">Crear Etiquetas</a></li> --}}

                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/panel/blog/create/post') }}">Crear
                            Noticias</a></li>
                    <li><a class="nav-link" href="{{ url('/panel/blog/create/categoria') }}">Crear
                            Categoria</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Compras</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/panel/compras/index') }}">Ingresos</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/panel/proveedores/index') }}">Proveedores</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Inventario</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/panel/inventario/index') }}">Generar Inventario</a></li>
                </ul>

                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/panel/inventario/index') }}">Inventario Valorizado</a></li>
                </ul>
          

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Ir a la Tienda
            </a>
        </div>
        </li>
        </ul>
    </aside>
</div>
