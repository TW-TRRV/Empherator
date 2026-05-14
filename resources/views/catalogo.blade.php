@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-obscure-darker font-sans text-clarity-lighter flex flex-col">
    @include('partials.navbar')

    <main class="flex-1 w-full px-4 md:px-6 py-12 container mx-auto">
        
        <section class="mb-12 px-2">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 tracking-tight uppercase">
                CATALOGO
            </h1>
            <p class="text-clarity-light text-sm md:text-base max-w-2xl">
                Descubre nuestra selección de productos de alta calidad para tu setup de gaming.
            </p>
        </section>

        {{-- Filtros y Buscador --}}
        <section class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6 px-2 p-4">
            <div class="flex flex-wrap gap-2">
                <button class="px-8 py-2 bg-white text-black text-xs font-bold tracking-widest uppercase">All</button>
                <button class="px-8 py-2 border border-obscure-lightest text-white text-xs font-bold tracking-widest hover:border-emph transition-colors uppercase">Keyboards</button>
                <button class="px-8 py-2 border border-obscure-lightest text-white text-xs font-bold tracking-widest hover:border-emph transition-colors uppercase">Mice</button>
                <button class="px-8 py-2 border border-obscure-lightest text-white text-xs font-bold tracking-widest hover:border-emph transition-colors uppercase">Gpus</button>
            </div>

            <div class="w-full md:w-auto">
                <input 
                    type="text" 
                    placeholder="SEARCH CATALOG"
                    class="w-full md:w-64 bg-transparent border border-obscure-lightest text-white text-xs font-bold tracking-widest uppercase px-4 h-10 placeholder:text-clarity focus:outline-none focus:border-emph transition-colors"
                />
            </div>
        </section>

        {{-- Grid de Productos --}}
        <section class="grid grid-cols-1 md:grid-cols-3 gap-4 px-2"> 
            @foreach($products as $product)
            <div class="bg-obscure-lightest flex flex-col border border-obscure-lightest hover:border-emph transition-all duration-300 group">
                
                {{-- Enlace en la imagen --}}
                <a href="{{ route('products.show', $product['id']) }}" class="aspect-video w-full bg-black flex items-center justify-center p-12 overflow-hidden cursor-pointer">
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" alt="{{ $product['name'] }}"
                         alt="{{ $product['name'] }}" 
                         class="object-contain max-h-full drop-shadow-[0_20px_50px_rgba(37,99,235,0.3)] group-hover:scale-110 transition-transform duration-700" />
                </a>

                <div class="p-4 bg-obscure-light flex-1">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <p class="text-emph text-[10px] font-black tracking-[0.3em] mb-2 uppercase">
                                {{ $product['category'] }}
                            </p>
                            <h3 class="text-2xl md:text-3xl font-bold text-white uppercase tracking-tighter">
                                {{ $product['name'] }}
                            </h3>
                        </div>
                        <span class="text-3xl font-black text-white">
                            {{-- Limpiamos el precio por si viene como string con $ --}}
                            ${{ is_numeric($product['price']) ? number_format($product['price'], 0) : $product['price'] }}
                        </span>
                    </div>

                    <div class="flex gap-2">
                        {{-- BOTÓN DINÁMICO: Ahora redirige al detalle --}}
                        <a href="{{ route('products.show', $product['id']) }}" 
                           class="flex-1 bg-emph hover:bg-emph-dark text-white text-xs font-black tracking-[0.2em] h-14 transition-all uppercase flex items-center justify-center">
                            COMPRA AHORA
                        </a>
                        
                        <button class="w-14 h-14 border border-obscure-lightest flex items-center justify-center text-white hover:border-emph transition-colors group/fav">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover/fav:fill-emph">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
    </main>
    @include('partials.footer')
</div>

@endsection