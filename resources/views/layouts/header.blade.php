<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">Puspasari </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('/home') }}">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('/artikel') }}">Artikel Terbaru</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('/DaftarPosyandu') }}">Daftar Posyandu</a>
              </li>
          </ul>
      </div>
  </div>
</nav>