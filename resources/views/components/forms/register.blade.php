
@props([])

<form method="POST" action="{{ route('user_register_action') }}">
    @csrf

    {{-- Name --}}
    <label class="floating-label mb-6">
        <input type="text"
               name="name"
               placeholder="John Doe"
               value="{{ old('name') }}"
               class="input input-bordered @error('name') input-error @enderror"
               required>
        <span>Name</span>
    </label>
    @error('name')
        <div class="label -mt-4 mb-2">
            <span class="label-text-alt text-error">{{ $message }}</span>
        </div>
    @enderror

    {{-- Email --}}
    <label class="floating-label mb-6">
        <input type="email"
               name="email"
               placeholder="e.g. mail@example.com"
               value="{{ old('email') }}"
               class="input input-bordered @error('email') input-error @enderror"
               required>
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

    {{-- Password Confirmation --}}
    <label class="floating-label mb-6">
        <input type="password"
               name="password_confirmation"
               placeholder="••••••••"
               class="input input-bordered"
               required>
        <span>Confirm Password</span>
    </label>

    <div class="form-control mt-8">
        <button type="submit" class="btn btn-primary btn-sm w-full">
            Register
        </button>
    </div>
</form>
