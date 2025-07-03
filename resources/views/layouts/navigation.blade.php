<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">
            <img src="{{ Auth::user()->profile_photo_url ?? asset('images/satria.jpg') }}" 
                class="img-circle elevation-2" 
                alt="User Image" 
                style="width: 35px; height: 35px; object-fit: cover;">
        </div>
        <div class="info ml-2">
            <a href="{{ route('admin.profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            
            <li class="nav-item">
                <a href="{{ route('admin.anggotas.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                        {{ __('Anggota') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-newspaper nav-icon"></i>
                    <p>
                        Berita
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Berita</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.aspirasis.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        {{ __('Aspirasi') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.spk.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-pen"></i>
                    <p>
                        {{ __('SPK Aspirasi VIKOR') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.galeris.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-image"></i>
                    <p>
                        {{ __('Galeri') }}
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->