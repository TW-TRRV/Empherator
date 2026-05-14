<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Datos de prueba (Luego esto vendrá de la base de datos)
    private $products = [
        [
            'id' => 1,
            'name' => 'Procesador AMD Ryzen 7 7800x3D',
            'category' => 'COMPONENTES',
            'price' => 1999.90,
            'image' => 'imagenes/productos/componentes/Procesador AMD Ryzen 7 7800x3D.jpeg',
            'description' => 'Procesador AMD Ryzen 7 7800X3D (4.2GHz - 5.0GHz, 96MB V-Cache, AM5, 8 Núcleos'
        ],
        [
            'id' => 2,
            'name' => 'Tarjeta de video GeForce RTX 5060 Ti',
            'category' => 'COMPONENTES',
            'price' => 1749.90,
            'image' => 'imagenes/productos/componentes/Tarjeta de video GeForce RTX 5060 Ti.jpeg',
            'description' => 'Tarjeta de video NVIDIA GeForce RTX 5060 Ti con 8GB de memoria GDDR6, ideal para gaming en 1080p y 1440p con trazado de rayos.'
        ],
        [
            'id' => 3,
            'name' => 'Tarjeta de video Radeon RX 9060 XT',
            'category' => 'COMPONENTES',
            'price' => 2049.90,
            'image' => 'imagenes/productos/componentes/Tarjeta de video Radeon RX 9060 XT.jpeg',
            'description' => 'Graficos AMD Radeon RX 9060 XT con 8GB de memoria GDDR6, ideal para gaming en 1080p y 1440p.'
        ],
        [
            'id' => 4,
            'name' => 'Disco SSD 1 TB Predator GM6 PCle Gen4',
            'category' => 'COMPONENTES',
            'price' => 549.90,
            'image' => 'imagenes/productos/componentes/Disco SSD 1 TB Predator GM6 PCle Gen4.jpg',
            'description' => 'El SSD Predator GM6 1TB es una unidad NVMe PCIe Gen4 x4 M.2 2280 de alto rendimiento diseñada para gaming, edición de video y PS5'
        ],
        [
            'id' => 5,
            'name' => 'Redragon Ucal Pro K673 Teclado Inalábrico Switch Rojo',
            'category' => 'TECLADOS',
            'price' => 329.90,
            'image' => 'imagenes/productos/teclados/Redragon Ucal Pro K673 Teclado Inalábrico Switch Rojo.jpeg',
            'description' => 'Teclado mecánico inalábrico con interruptores Rojo, ideal para gaming.'
        ],
        [
            'id' => 6,
            'name' => 'AUDIFONO LOGITECH GPRO X 2  INALAMBRICO  7.1  BLANCO',
            'category' => 'AUDIO',
            'price' => 840.42,
            'image' => 'imagenes/productos/audio/d.jpeg',
            'description' => 'Audífono Logitech G Pro X 2 inalámbrico con sonido envolvente 7.1, diseñado para gamers profesionales que buscan calidad de audio y comodidad.'
        ],
        [
            'id' => 7,
            'name' => 'Wireless 2.4G Peso 70g USB‑C',
            'category' => 'MOUSE',
            'price' => 249.90,
            'image' => 'imagenes/productos/mouse/Wireless 2.4G Peso 70g USB‑C.jpeg',
            'description' => 'Engineered for the absolute edge. Zero-latency mechanical switches encased in an aircraft-grade aluminum chassis.'
        ],
        [
            'id' => 8,
            'name' => 'FPS Lite Batería 60h Sensor 16K',
            'category' => 'MOUSE',
            'price' => 159,
            'image' => 'imagenes/productos/mouse/FPS Lite Batería 60h Sensor 16K.jpeg',
            'description' => '26,000 DPI Sensor | 54g Total Weight. The new standard for competitive precision.'
        ],
    ];

    // Muestra el catálogo completo
    public function index()
    {
        return view('catalogo', ['products' => $this->products]);
    }

    // Muestra el detalle de UN producto
   public function show($id)
{
    $product = collect($this->products)->firstWhere('id', $id);

    if (!$product) {
        abort(404);
    }

    // Convertimos a objeto para que el Blade use $product->name
    return view('products.show', ['product' => (object)$product]);
}
}