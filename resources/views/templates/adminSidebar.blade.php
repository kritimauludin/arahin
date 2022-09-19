<!-- Sidebar -->
<ul class="navbar-nav bg-black sidebar sidebar-dark accordion sidebar-toggled toggled" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/user">
        <img src="{{asset('storage')}}/img/web-arahin/page/logo-RW-P.png" width="50px" alt="">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('user*') ? ' active ' : ' '}}">
        <a class="nav-link" href="/user">
            <i class="fas fa-fw fa-home"></i>
            <span>My Home</span></a>
    </li>

    @can('founder')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? ' active ' : ' '}}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endcan

    @can('public_relation')
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Public Relation
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Request::is('relation*') ? ' active ' : ' '}}">
            <a class="nav-link" href="/relation/usersuggestions">
                <i class="fas fa-fw fa-hands-helping"></i>
                <span>Saran Pengguna</span></a>
        </li>
    @endcan
    @can('founder')
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Founder
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('founder/user*') ? ' active ' : ' '}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWriter" aria-expanded="true" aria-controls="collapseWriter">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pengguna</span>
        </a>
        <div id="collapseWriter" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Akun Terdaftar :</h6>
                <a class="collapse-item" href="/founder/user/alluser">Lihat Semua User</a>
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Penulis :</h6>
                <a class="collapse-item" href="/founder/user/allauthor">Lihat Semua Penulis</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Roles Collapse Menu -->
    <li class="nav-item {{ Request::is('roles*') ? ' active ' : ' '}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles" aria-expanded="true" aria-controls="collapseWriter">
            <i class="fas fa-fw fa-user-shield"></i>
            <span>Data Role</span>
        </a>
        <div id="collapseRoles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Menu :</h6>
                <a class="collapse-item" href="/roles">Lihat</a>
                <a class="collapse-item" href="/roles/create">Tambah</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::is('founder/post*') ? ' active ' : ' '}}">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseContent" aria-expanded="true" aria-controls="collapseContent">
            <i class="fas fa-fw fa-book"></i>
            <span>Konten</span>
        </a>
        <div id="collapseContent" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Menu:</h6>
                <a class="collapse-item" href="/founder/post/all">All Post</a>
                <a class="collapse-item" href="/founder/post/book/all">All Books</a>
                <a class="collapse-item" href="/founder/post/allcategory">All Category</a>
            </div>
        </div>
    </li>
    @endcan


    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Penulis
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('mypost/posts*') ? ' active ' : ' '}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Postingan Saya</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Menu :</h6>
                <a class="collapse-item" href="/mypost/posts">Lihat</a>
                <a class="collapse-item" href="/mypost/posts/create">Posting</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{Request::is('mybook/books*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBooks" aria-expanded="true" aria-controls="collapseBooks">
            <i class="fas fa-fw fa-book"></i>
            <span>Buku & Komik</span>
        </a>
        <div id="collapseBooks" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Menu:</h6>
                <a class="collapse-item" href="/mybook/books">Lihat</a>
                <a class="collapse-item" href="/mybook/books/create">Buat Judul Baru</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Pengajuan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('mycategory/categories*') ? ' active ' : ' '}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseAds">
            <i class="fas fa-fw fas fa-money-bill-wave-alt"></i>
            <span>Kategori</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Menu :</h6>
                <a class="collapse-item" href="/mycategory/categories">Lihat</a>
                <a class="collapse-item" href="/mycategory/categories/create">Ajukan</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @can('designer')
    <!-- Heading -->
    <div class="sidebar-heading">
        Iklan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('ads*') ? ' active ' : ' '}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAds" aria-expanded="true" aria-controls="collapseAds">
            <i class="fas fa-fw fas fa-money-bill-wave-alt"></i>
            <span>Periklanan</span>
        </a>
        <div id="collapseAds" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Menu :</h6>
                <a class="collapse-item" href="/ads">Lihat</a>
                <a class="collapse-item" href="/ads/create">Pasang Iklan</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @endcan
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->