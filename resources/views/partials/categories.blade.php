@php
    $cats = [
        ['name' => 'MOUSE', 'img' => 'https://placehold.co/600x800?text=Mouse'],
        ['name' => 'KEYBOARDS', 'img' => 'https://placehold.co/600x800?text=Keyboard'],
        ['name' => 'AUDIO', 'img' => 'https://placehold.co/600x800?text=Audio'],
        ['name' => 'COMPONENTS', 'img' => 'https://placehold.co/600x800?text=Parts'],
    ];
@endphp

<section class="py-20 px-8 md:px-20 bg-obscure-darker">
    <div class="flex justify-between items-end mb-10 border-b border-obscure-lightest pb-4">
        <h2 class="text-3xl font-bold border-b-4 border-emph pb-2 -mb-[20px]">CATEGORIES</h2>
        {{-- Asegúrate que el link a "VIEW ALL" use el nombre de tu ruta del catálogo --}}
        <a href="{{ route('catalogo') }}" class="text-xs font-bold tracking-widest hover:text-emph transition-all text-clarity-light">VIEW ALL &rarr;</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach($cats as $cat)
        <a href="{{ route('catalogo') }}?category={{ strtolower($cat['name']) }}" 
           class="group relative aspect-[4/5] bg-obscure overflow-hidden border border-obscure-lightest flex items-end p-6">
            
            <img src="{{ $cat['img'] }}" 
                 class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:opacity-100 group-hover:scale-110 transition-all duration-700">
            
            {{-- Overlay para que el texto siempre se lea bien --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
            
            <h3 class="relative z-10 text-xl font-bold uppercase tracking-widest text-white group-hover:text-emph transition-colors">
                {{ $cat['name'] }}
            </h3>
        </a>
        @endforeach
    </div>
</section>