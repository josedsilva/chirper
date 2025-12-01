
@props([])

<form method="POST" action="{{ route('user_login_action') }}">
    @csrf

    {{-- Email --}}
    <label class="floating-label mb-6">
        <input type="email"
               name="email"
               placeholder="mail@example.com"
               value="{{ old('email') }}"
               class="input input-bordered @error('email') input-error @enderror"
               required
               autofocus>
        <span>Email</span>
    </label>
    @error('email')
        <div class="label -mt-4 mb-2">
            <span class="label-text-alt text-error">{{ $message }}</span>
        </div>
    @enderror

    {{-- Password --}}
    <label class="floating-label mb-6">
        <input type="password"
               name="password"
               placeholder="••••••••"
               class="input input-bordered @error('password') input-error @enderror"
               required>
        <span>Password</span>
    </label>
    @error('password')
        <div class="label -mt-4 mb-2">
            <span class="label-text-alt text-error">{{ $message }}</span>
        </div>
    @enderror

    {{-- Remember Me --}}
    <div class="form-control mt-4">
        <label class="label cursor-pointer justify-start">
            <input type="checkbox"
                   name="remember"
                   class="checkbox">
            <span class="label-text ml-2">Remember me</span>
        </label>
    </div>

    <div class="form-control mt-8">
        <button type="submit" class="btn btn-primary btn-sm w-full">
            Sign In
        </button>
    </div>
</form>
