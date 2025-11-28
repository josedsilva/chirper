
<x-layout>
    <x-slot:title>
      Edit Chirp
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Edit Chirp</h1>
        
        <x-forms.chirp method="put" :chirp="$chirp" />
        
    </div>
</x-layout>
