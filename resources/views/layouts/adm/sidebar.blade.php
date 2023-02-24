
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-lime elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link bg-gray-dark text-center">
                {{-- <img src="{{ \Setting::getSetting()->logo == null ? Storage::url('public/images/setting/logo_default.png') : Storage::disk('local')->url('public/images/setting/'.\Setting::getSetting()->logo) }}" alt="{{ config('app.name', 'Laravel') }}" class="brand-image elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-bold text-uppercase">{{ \Setting::getSetting()->title_web }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images/avatar/default.png').Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{ Auth::user()->fullname }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child nav-compact nav-flat nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>{{ __('Dashboard') }}</p>
                            </a>
                        </li>
                        @if (auth()->user()->hasRole('admin'))
                        <li class="nav-item {{ Request::is('admin/categories*') || Request::is('admin/products*')  ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('admin/home*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>{{ __('Menu Item') }} <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ __('Menu Kategori') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ __('Menu Produk') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is('admin/transactions*') || Request::is('admin/order_products*') || Request::is('admin/status*') || Request::is('admin/riwayat*')  ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('admin/home*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>{{ __('Menu Transaksi') }} <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.transactions.index') }}" class="nav-link {{ Request::is('admin/transactions*') || Request::is('admin/order_products*') || Request::is('admin/status*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ __('Semua Transaksi') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.transactions_instant.index') }}" class="nav-link {{ Request::is('admin/transactions_instant*') || Request::is('admin/status*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ __('Transaksi Instant') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.transactions_catering.index') }}" class="nav-link {{ Request::is('admin/transactions_catering*') || Request::is('admin/status*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ __('Transaksi Katering') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.riwayat.index') }}" class="nav-link {{ Request::is('admin/riwayat*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ __('Menu Riwayat') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is('admin/users*') || Request::is('admin/roles*')  ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('admin/home*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>{{ __('Menu User') }} <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ __('Menu User') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->

            <div class="sidebar-custom">
                @if (auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.setting.index') }}" class="btn btn-link"><i class="fas fa-cogs"></i></a>
                @endif
                <a href="{{ route('logout') }}" class="btn btn-danger hide-on-collapse pos-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <!-- /.sidebar-custom -->
        </aside>
