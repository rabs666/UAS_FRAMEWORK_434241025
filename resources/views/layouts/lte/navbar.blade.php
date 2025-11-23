<nav class="app-header navbar navbar-expand bg-body">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
          <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button">
          <i class="bi bi-person-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a href="#" class="dropdown-item">
            <i class="bi bi-person me-2"></i> {{ session('user_name', 'User') }}
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="bi bi-shield-check me-2"></i> {{ session('user_role_name', 'User') }}
          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="dropdown-item text-danger"
               onclick="event.preventDefault(); this.closest('form').submit();">
              <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
