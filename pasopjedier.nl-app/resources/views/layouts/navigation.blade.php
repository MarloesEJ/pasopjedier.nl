<nav class="main-nav">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="/">Passen<span class="highlight">OpJeDier</span></a>
        </div>

        <div class="nav-menu">
            @auth
                <a href="{{ route('requests.index') }}" class="nav-link">Zoek huisdier</a>
                <a href="{{ route('profile.edit') }}" class="nav-link">Mijn Profiel</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-murrey btn-login-header">Log uit</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-murrey btn-login-header">Login</a>
            @endauth
        </div>

        <button id="mobile-menu-toggle" class="mobile-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
</nav>