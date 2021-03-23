<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link" href="/administrator">
        <img src="{{asset('images/termosin.png')}}" alt="KPUM Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">Termosin</span><span class="brand-text font-weight-light">Store</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">{{Auth::user()->level == 0 ? 'Administrator' : 'Super Administrator'}}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('administrator') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('item') }}" class="nav-link {{ Request::is('administrator/item*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Item</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaction') }}"
                        class="nav-link {{ Request::is('administrator/transaction*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('administrator') }}"
                        class="nav-link {{ Request::is('administrator/admin*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-lock"></i>
                        <p>Administrator</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>