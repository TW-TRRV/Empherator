{{-- resources/views/partials/navbar.blade.php --}}

<div>
    {{-- Spotlight Search Overlay --}}
    <div
        id="search-overlay"
        class="fixed inset-0 bg-obscure-darker/90 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-700"
        onclick="closeSearch()"
    >
        <div class="relative w-full max-w-3xl" onclick="event.stopPropagation()">
            <button
                onclick="closeSearch()"
                class="absolute -top-12 right-0 text-clarity-light hover:text-clarity-lighter text-3xl cursor-pointer transition-colors"
            >
                &times;
            </button>

            <div class="flex items-center bg-obscure border-b border-emph pb-2 p-3">
                <svg class="w-7 h-7 text-clarity-light mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>

                <input
                    id="search-input"
                    type="text"
                    placeholder="Search catalog..."
                    class="w-full bg-transparent border-none outline-none text-2xl text-clarity-lighter placeholder:text-clarity"
                />
            </div>
        </div>
    </div>

    {{-- Navbar --}}
    <nav class="fixed z-50 top-0 bg-obscure-darker border-b border-obscure-lightest h-20 w-full px-4 md:px-8 lg:px-20">
        <div class="flex w-full h-full items-center justify-between md:justify-start relative">

            {{-- Logo + Burger Desktop --}}
            <div class="flex text-2xl items-center md:flex-1">
                <button
                    class="hidden md:block text-emph text-3xl cursor-pointer"
                    onclick="toggleWideMenu()"
                >
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <a href="{{ url('/') }}"
                   class="text-clarity-lighter md:ml-3 font-black text-2xl">
                    EMPHERATOR
                </a>
            </div>

            {{-- Desktop Links --}}
            <div class="hidden md:flex flex-1 justify-center items-center">
                <a href="{{ url('/') }}"
                   class="mx-7 text-sm font-bold text-clarity-light hover:text-emph-light hover:underline transition-all duration-300">
                    HOME
                </a>

                <a href="{{ url('/catalogo') }}"
                   class="mx-7 text-sm font-bold text-clarity-light hover:text-emph-light hover:underline transition-all duration-300">
                    HARDWARE
                </a>

                <a href="{{ url('/login') }}"
                   class="mx-7 text-sm font-bold text-clarity-light hover:text-emph-light hover:underline transition-all duration-300">
                    LOGIN
                </a>
            </div>

            {{-- Icons --}}
            <div class="flex items-center text-3xl text-clarity-light gap-4 md:flex-1 md:justify-end">

                {{-- Search --}}
                <button
                    class="hover:text-emph-light transition-all duration-300 cursor-pointer"
                    onclick="openSearch()"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                {{-- Cart --}}
                <a href="{{ url('/cart') }}"
                   class="hover:text-emph-light transition-all duration-300 cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </a>

                {{-- Mobile Burger --}}
                <button
                    class="md:hidden text-emph text-3xl cursor-pointer"
                    onclick="toggleMobileMenu()"
                >
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- Desktop Wide Menu --}}
    <div
        id="wide-menu"
        class="fixed z-40 top-20 left-0 w-full bg-obscure-lighter border-b border-obscure-lightest transition-all duration-300 -translate-y-full opacity-0 pointer-events-none"
    >
        <div class="max-w-7xl mx-auto px-20 py-8 text-clarity-lighter">

            <div class="flex justify-between items-center mb-6 border-b border-obscure-light pb-4">
                <h2 class="text-xl font-bold text-clarity-light">
                    Explore Catalog
                </h2>

                <button
                    onclick="toggleWideMenu()"
                    class="text-2xl text-clarity-light hover:text-clarity-lighter"
                >
                    &times;
                </button>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">

                <div>
                    <h3 class="text-sm font-bold text-clarity-light mb-4">
                        Categories
                    </h3>

                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-emph-light transition-colors">Procesadores</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">Tarjetas Gráficas</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">Placas Base</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">Memoria</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-bold text-clarity-light mb-4">
                        Brands
                    </h3>

                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-emph-light transition-colors">Intel</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">AMD</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">NVIDIA</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">ASUS</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-bold text-clarity-light mb-4">
                        Rango de precio
                    </h3>

                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-emph-light transition-colors">Menos de $100</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">$100 - $300</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">$300 - $600</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">Más de $600</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-bold text-clarity-light mb-4">
                        Valoración
                    </h3>

                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-emph-light transition-colors">4 Estrellas a más</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">3 Estrellas a más</a></li>
                        <li><a href="#" class="hover:text-emph-light transition-colors">2 Estrellas a más</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div
        id="mobile-menu"
        class="md:hidden fixed z-40 top-20 left-0 w-full bg-obscure-lighter border-b border-obscure-lightest transition-all duration-300 -translate-y-full opacity-0 pointer-events-none"
    >
        <div class="p-6">

            <div class="flex items-center bg-obscure border border-obscure-lightest p-3">
                <svg class="w-6 h-6 text-clarity-light mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>

                <input
                    type="text"
                    placeholder="Search..."
                    class="w-full bg-transparent border-none outline-none text-lg text-clarity-lighter placeholder:text-clarity"
                />
            </div>

            <div class="mt-6 flex flex-col space-y-4 items-center">
                <a href="{{ url('/') }}"
                   class="text-sm font-bold text-clarity-light hover:text-emph-light transition-all duration-300">
                    HOME
                </a>

                <a href="{{ url('/catalogo') }}"
                   class="text-sm font-bold text-clarity-light hover:text-emph-light transition-all duration-300">
                    HARDWARE
                </a>

                <a href="{{ url('/login') }}"
                   class="text-sm font-bold text-clarity-light hover:text-emph-light transition-all duration-300">
                    LOGIN
                </a>
            </div>
        </div>
    </div>

    <div class="w-full h-20"></div>
</div>