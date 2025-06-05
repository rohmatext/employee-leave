<x-guest-layout title="Login">
    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="remember">
            <label class="form-check-label" for="remember">
                Ingat saya
            </label>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>
    </form>
</x-guest-layout>
