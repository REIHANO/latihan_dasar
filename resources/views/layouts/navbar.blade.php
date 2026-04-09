{{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">belajar laravel 12</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">tentang kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact">kontak</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/product">produk kami</a>
        </li>
      </ul>
      
<ul class="navbar-nav ms-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="far fa-user"></i> 
           @auth
            <span>{{ Auth::user()->name }}</span>
            @endauth

            @guest
            <a href= "/login">Login</a>
            @endguest
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><span class="dropdown-header">Pengaturan Akun</span></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a href="#" class="dropdown-item" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2 text-danger"></i> Keluar Aplikasi
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </li>
</ul>

    </div>
  </div>
</nav>