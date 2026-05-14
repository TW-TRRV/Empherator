@php
    // Simulamos los productos. Luego las tramemos de la Base de Datos.
    $featuredProducts = [
        ['id' => 1, 'name' => 'Tarjeta de video GeForce RTX 5060 Ti', 'category' => 'COMPONENTES', 'price' => '$1749.90', 'image' => asset("imagenes/productos/componentes/Tarjeta de video GeForce RTX 5060 Ti.jpeg")],
        ['id' => 2, 'name' => 'Tarjeta de video Radeon RX 9060 XT', 'category'=> 'COMPONENTES', 'price' => '$2049.90', 'image' => asset("imagenes/productos/componentes/Tarjeta de video Radeon RX 9060 XT.jpeg")],
        ['id' => 3, 'name' => 'Procesador AMD Ryzen 7 7800x3D', 'category' => 'COMPONENTES', 'price' => '$1999.90', 'image' => asset("imagenes/productos/componentes/Procesador AMD Ryzen 7 7800x3D.jpeg")],
    ];
@endphp

<section class="bg-obscure py-16 px-4 md:px-8 lg:px-20 text-clarity-lighter">
    <div class="max-w-7xl mx-auto flex flex-col items-center">
        
        {{-- Header de la Sección --}}
        <div class="text-center mb-12">
            <p class="text-emph text-xs font-bold tracking-widest uppercase mb-2">
                LOS MAS VENDIDO DE LA SEMANA
            </p>
            <h2 class="text-4xl md:text-5xl font-bold tracking-tight">
                PRODUCTOS DESTACADOS
            </h2>
        </div>

        {{-- Grid de Productos --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 w-full">
            @foreach($featuredProducts as $product)
                <div class="bg-obscure-lightest flex flex-col h-full border border-obscure-lightest hover:border-emph/30 transition-all duration-500 group">
                    
                    {{-- Imagen del Producto --}}
                    {{-- Cambié el link a 'catalogo' para evitar el 404 por ahora --}}
                    <a href="{{ route('catalogo') }}" class="aspect-[4/3] w-full bg-obscure-darker overflow-hidden p-6 flex items-center justify-center">
                        <img 
                            src="{{ $product['image'] }}" 
                            alt="{{ $product['name'] }}" 
                            class="object-cover max-h-full max-w-full drop-shadow-2xl group-hover:scale-110 transition-transform duration-500"
                        >
                    </a>

                    {{-- Detalles del Producto --}}
                    <div class="p-6 md:p-8 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <p class="text-clarity-light text-[10px] font-bold tracking-widest mb-2">
                                    {{ $product['category'] }}
                                </p>
                                <a href="{{ route('catalogo') }}">
                                    <h3 class="text-xl md:text-2xl font-bold leading-tight hover:text-emph transition-colors uppercase">
                                        {{ $product['name'] }}
                                    </h3>
                                </a>
                            </div>
                            <span class="text-2xl font-bold text-emph-lighter">
                                {{ $product['price'] }}
                            </span>
                        </div>

                        {{-- Botón de Acción --}}
                        <div class="mt-auto">
                            <a 
                                href="{{ route('catalogo') }}" 
                                class="w-full bg-emph hover:bg-emph-light text-clarity-lighter text-xs font-bold tracking-widest h-12 flex items-center justify-center transition-colors duration-300"
                            >
                                VER DETALLES
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>