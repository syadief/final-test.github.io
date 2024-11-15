<x-guest-layout>
    <div class="register-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" required autofocus autocomplete="name">
            </div>

            <!-- Username -->
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required autofocus autocomplete="username">
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required autocomplete="username">
            </div>

            <!-- Phone Number -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input id="phone" type="text" name="phone" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-footer">
                <a href="{{ route('login') }}">Already registered?</a>
                <button type="submit" class="register-button">Register</button>
            </div>
        </form>
    </div>
</x-guest-layout>
