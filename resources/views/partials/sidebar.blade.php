<div class="position-sticky pt-3 px-3 h-100 sidebar-inner">
    <!-- User Profile Section -->
    <div class="text-center mb-3">
        <div class="d-flex justify-content-center mb-2">
            <div class="rounded-circle bg-white d-flex align-items-center justify-content-center"
                style="width: 48px; height: 48px; background: linear-gradient(135deg, #3b82f6, #ec4899);">
                <span class="fw-bold text-primary"
                    style="font-size: 18px;">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</span>
            </div>
        </div>
        <h5 class="text-white fw-bold mb-1" style="font-size:16px">{{ Auth::user()->name ?? 'Admin' }}</h5>
        <p class="text-white-50 small mb-0" style="font-size:12px">{{ Auth::user()->email ?? 'admin@ppdb.com' }}</p>
    </div>

    <!-- Navigation -->
    <ul class="nav flex-column">
        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="fas fa-home me-3"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('recipients.*') ? 'active' : '' }}"
                href="{{ route('recipients.index') }}">
                <i class="fas fa-users me-3"></i> Data Penerima
            </a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('registration') ? 'active' : '' }}"
                href="{{ route('registration') }}">
                <i class="fas fa-user-plus me-3"></i> Registrasi
            </a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('recipients.scan') ? 'active' : '' }}"
                href="{{ route('recipients.scan') }}">
                <i class="fas fa-hand-holding-heart me-3"></i> Penyaluran
            </a>
        </li>
    </ul>

    <!-- School Branding -->
    <div class="mt-auto pt-3">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <div class="me-2">
                <img src="{{ asset('image/logo.png') }}" alt="logo"
                    style="width:40px;height:40px;border-radius:8px;object-fit:cover;margin:0 auto;display:block;"
                    onerror="this.onerror=null;this.src='{{ asset('image/foto.png') }}';">
            </div>
            <div class="text-white text-start">
                <div class="fw-bold small">SESAMA</div>
                <div class="text-white-50" style="font-size: 12px;">bazma x pertamina</div>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="text-center">
            <a class="btn btn-light text-primary fw-bold rounded-pill w-100" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                style="font-size: 14px;">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
