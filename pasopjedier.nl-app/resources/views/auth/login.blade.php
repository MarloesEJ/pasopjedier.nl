<div class="login-wrapper">
    <div class="login-image-side">
        <img src="/images/login-side-image.jpg" alt="Honden en katten">
    </div>

    <div class="login-form-side">
        <div class="form-inner">
            <h1 class="form-title">Login</h1>
            
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <div class="input-field">
                    <input type="email" name="email" placeholder="gebruikersnaam" required autofocus>
                </div>

                <div class="input-field">
                    <input type="password" name="password" placeholder="wachtwoord" required>
                    <div class="forgot-link">
                        <a href="{{ route('password.request') }}">wachtwoord vergeten?</a>
                    </div>
                </div>

                <button type="submit" class="btn-submit-pink">Login</button>
            </form>

            <div class="register-cta">
                <a href="{{ route('register') }}" class="btn-register-outline">Nieuw? maak account aan</a>
            </div>
        </div>
    </div>
</div>