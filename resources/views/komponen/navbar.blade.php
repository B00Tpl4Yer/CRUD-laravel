<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>{{ $title }}</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="icon" href="img" type="image/x-icon" />
  <link rel="stylesheet" href="fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="bootstrap/css/bootstraplibrary.min.css" />
  <link rel="stylesheet" href="css/home.css" />
</head>

<body>
  <div class="wrapper">
    <div class="main-header">
      <div class="logo-header bg-warning">
        <a class="logo">
          <h1 alt="navbar brand" class="navbar-brand mt-3 " >Admin</h1>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
          data-target="#collapseExample" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="fas fa-bars"></i>
          </span>
        </button>
        <button class="topbar-toggler more">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="fas fa-bars"></i>
					</button>
				</div>
      </div>
      <nav class="navbar navbar-header navbar-expand-lg bg-warning">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ms-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle daftar-toggle" id="notifDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">	
                <button type="button" class="btn"  data-bs-toggle="modal" data-bs-target="#jam">
                  <i class="fa fa-clock"></i>
                </button>
								<span class="badge badge-danger badge-xs daftar-count"></span>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle daftar-toggle" id="notifDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">	
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fa fa-power-off"></i>
                </button>
								<span class="badge badge-danger badge-xs daftar-count"></span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">tombol keluar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>apakah anda ingin keluar ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tidak</button>
        <button type="button" class="btn btn-danger"><a href="/login">ya</a></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal jam -->
<div class="modal fade" id="jam" tabindex="-1" aria-labelledby="jamLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Jam Live</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="jam_analog">
          <div class="xxx">
            <div class="jarum jarum_detik"></div>
            <div class="jarum jarum_menit"></div>
            <div class="jarum jarum_jam"></div>
            <div class="lingkaran_tengah"></div>
            <div class="angka angka_1">1</div>
            <div class="angka angka_2">2</div>
            <div class="angka angka_3">3</div>
            <div class="angka angka_4">4</div>
            <div class="angka angka_5">5</div>
            <div class="angka angka_6">6</div>
            <div class="angka angka_7">7</div>
            <div class="angka angka_8">8</div>
            <div class="angka angka_9">9</div>
            <div class="angka angka_10">10</div>
            <div class="angka angka_11">11</div>
            <div class="angka angka_12">12</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <div class="sidebar sidebar-style-2">
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <div class="user">
            <div class="info">
              <a class="p">
                  <span class="user-level">
                    <div class="avatar">
                      <img src="img/download.jpeg" class="avatar-img rounded-circle" />
                    </div>
                  </span>
                  <p class="mt-2">nama:{{ Auth::user()->name }}</p>
                  <p class="mt--3">email:{{ Auth::user()->email }}</p>
              </a>
              
            </div>
          </div>
          <ul class="nav nav-warning">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="/">
                    <i class="fas fa-home"></i>
                    <p>Beranda</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('data') ? 'active' : '' }}">
                <a href="/data">
                    <i class="fas fa-folder"></i>
                    <p>data CRUD</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="fas fa-toggle-on" id="toggle-icon"  class="toggle-btn" onclick="toggleMode()"></i>
                <p>tampilan dark</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>


        @yield('main')
    
   

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery-3.6.0.min.js"></script>
    <script src="bootstrap/js/jquery-ui.min.js"></script>
    <script src="bootstrap/js/jquery.scrollbar.min.js"></script>
    <script src="bootstrap/js/atlantis.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>
