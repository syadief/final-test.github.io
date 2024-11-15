<x-guest-layout>
    <div class="login-container">
        <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
            <h1 class="logo-text">Welcome to Cool</h1>
            <p class="subtitle">You can simply use your cool to sign in</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-group">
                <input type="tel" name="phone" id="phone" :value="old('phone')" required autofocus autocomplete="tel" placeholder="Nomor HP">
                <x-input-error :messages="$errors->get('phone')" class="error-message" />
            </div>

            <!-- Password -->
            <div class="input-group password-group">
                <input type="password" name="password" id="password" required autocomplete="current-password" placeholder="Password">
                <span class="password-toggle" onclick="togglePassword()">
                    <i id="password-icon" class="far fa-eye"></i>
                </span>
                <x-input-error :messages="$errors->get('password')" class="error-message" />
            </div>

            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="login-button">
                {{ __('Masuk') }}
            </button>
        </form>
    </div>
</x-guest-layout>