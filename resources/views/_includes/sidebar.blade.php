<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('home') }}">
            <h1 class="h2 mb-0 text-body font-weight-bold">{{ site('name') }}</h1>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ active('/') }}">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li class="{{ active('stuff', 'group') }}">
                    <a href="{{ route('stuff.index') }}">
                        <i class="fas fa-box"></i>Barang
                    </a>
                </li>
                <li class="{{ active('category', 'group') }}">
                    <a href="{{ route('category.index') }}">
                        <i class="fas fa-list-alt"></i>Kategori Barang
                    </a>
                </li>
                <li class="{{ active('supplier', 'group') }}">
                    <a href="{{ route('supplier.index') }}">
                        <i class="fas fa-truck"></i>Supplier
                    </a>
                </li>
                <li class="{{ active('activity/add', 'group') }}">
                    <a href="{{ route('activity.add') }}">
                        <i class="fas fa-plus-square"></i>Barang Masuk
                    </a>
                </li>
                <li class="{{ active('activity/remove', 'group') }}">
                    <a href="{{ route('activity.remove') }}">
                        <i class="fas fa-minus-square"></i>Barang Keluar
                    </a>
                </li>
                <li class="{{ active('loan', 'group') }}">
                    <a href="{{ route('loan.index') }}">
                        <i class="fas fa-calculator"></i>Peminjaman
                    </a>
                </li>
                <li class="{{ active('report', 'group') }}">
                    <a href="{{ route('report.index') }}">
                        <i class="fas fa-file-alt"></i>Laporan
                    </a>
                </li>
                <li class="{{ active('change_password') }}">
                    <a href="{{ route('change.password') }}">
                        <i class="fas fa-key"></i>Ganti Password
                    </a>
                </li>
                @can('isAdmin')
                    <li class="{{ active('setting', 'group') }}">
                        <a href="{{ route('setting.index') }}">
                            <i class="fas fa-cog"></i>Pengaturan
                        </a>
                    </li>
                    <li class="{{ active('user', 'group') }}">
                        <a href="{{ route('user.index') }}">
                            <i class="fas fa-user"></i>Pengguna
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
    </div>
</aside>