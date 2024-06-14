<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">FARMA Ortiz</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Usuarios (Admin) -->
                @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuarios
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear Usuario</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Productos (Admin) -->
                @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Productos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agregar Producto</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Proveedores (Admin) -->
                @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('admin.proveedores') }}" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Proveedores</p>
                    </a>
                </li>
                @endif

                <!-- Clientes (Admin) -->
                @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('admin.clientes') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                @endif

                <!-- Reportes (Admin) -->
                @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Reportes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.reportes.ventas') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte de Ventas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.reportes.inventario') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte de Inventario</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Configuración (Admin) -->
                @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Configuración
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.configuracion.empresa') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Datos de la Empresa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.configuracion.usuarios') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Inventario (Admin) -->
                @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('admin.inventario') }}" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Inventario</p>
                    </a>
                </li>
                @endif

                <!-- Agregar Producto (Admin) -->
                @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('admin.agregarProducto') }}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Agregar Producto</p>
                    </a>
                </li>
                @endif

                <!-- Ventas (Vendedor) -->
                @if(auth()->user()->isSeller())
                <li class="nav-item">
                    <a href="{{ route('seller.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>Ventas</p>
                    </a>
                </li>
                @endif

                <!-- Crear Venta (Vendedor) -->
                @if(auth()->user()->isSeller())
                <li class="nav-item">
                    <a href="{{ route('seller.ventas.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Crear Venta</p>
                    </a>
                </li>
                @endif

                <!-- Cerrar Sesión -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Cerrar Sesión</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
