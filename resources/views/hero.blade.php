<section class="relative h-[600px] w-full flex items-center overflow-hidden border-b border-obscure-lightest">
    <div class="absolute inset-0 -z-10 bg-cover bg-center" 
         style="background-image: linear-gradient(to right, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.6) 100%), url('{{ asset('assets/home-hero.png') }}')">
    </div>

    <div class="px-8 md:px-20">
        <p class="text-emph text-sm font-bold mb-4 tracking-widest">Nuestro nuevos Ingresos</p>
        <h1 class="text-white text-6xl md:text-8xl font-black mb-6 tracking-tighter">Razer Huntsman V3 Tenkeyless 8khz</h1>
        <p class="text-clarity-light max-w-lg mb-10 text-lg">Dedicado para jugadores profesionales</p>
        <div class="flex gap-4">
            <a href="{{ route('catalogo') }}" class="px-10 py-4 bg-emph hover:bg-emph-light text-white font-bold transition-all transform hover:scale-105">DESCUBRE</a>
            <a href="/systems" class="px-10 py-4 border border-clarity-light text-clarity-light hover:text-white font-bold transition-all">LO MAS VENDIDO</a>
        </div>
    </div>
</section>