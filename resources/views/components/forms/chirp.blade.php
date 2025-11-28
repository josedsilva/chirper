<!-- Chirp Form -->
<div class="card bg-base-100 shadow mt-8">
    <div class="card-body">
        <form method="POST" action="/chirps">
            @csrf
            <div class="form-control w-full">
                <textarea
                    name="chirp"
                    placeholder="What's on your mind?"
                    class="textarea textarea-bordered w-full resize-none @error('chirp') textarea-error @enderror"
                    rows="4"
                >{{ old('chirp') }}</textarea>
                
                @error('chirp')
                    <div class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="mt-4 flex items-center justify-end">
                <button type="submit" class="btn btn-primary btn-sm">
                    Chirp
                </button>
            </div>
        </form>
    </div>
</div>
