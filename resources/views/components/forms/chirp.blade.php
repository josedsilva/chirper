{{-- Chirp create/edit form --}}

@props([
  'method' => 'post',
  'chirp' => null,
])

@php
  $action = ($method !== 'post' && $chirp !== null) ? '/chirps/' . $chirp->id : '/chirps';
@endphp

<div class="card bg-base-100 shadow mt-8">
    <div class="card-body">
        <form method="POST" action="{{ $action }}">
            @csrf
            
            @if ($method === 'put')
              @method('PUT')
            @endif
            
            <div class="form-control w-full">
                <textarea
                    name="chirp"
                    placeholder="What's on your mind?"
                    class="textarea textarea-bordered w-full resize-none @error('chirp') textarea-error @enderror"
                    rows="4"
                >{{ old('chirp', $chirp?->message) }}</textarea>
                
                @error('chirp')
                    <div class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="mt-4 flex items-center justify-end">
                <button type="submit" class="btn btn-primary btn-sm">
                  {{ $chirp ? 'Update Chirp' : 'Chirp' }}
                </button>
                @if ($method !== 'post' && $chirp !== null)
                <a href="/" role="button" class="btn btn-secondary btn-sm ml-2">
                  Cancel
                </a>
                @endif
            </div>
        </form>
    </div>
</div>
