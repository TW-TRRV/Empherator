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
            'description' => 'Tenkeyless mechanical keyboard with RGB lighting.'
        ],
        [
            'id' => 3,
            'name' => 'Tarjeta de video Radeon RX 9060 XT',
            'category' => 'COMPONENTES',
            'price' => 2049.90,
            'image' => 'imagenes/productos/componentes/Tarjeta de video Radeon RX 9060 XT.jpeg',
            'description' => 'Wireless gaming mouse with precision sensor.'
        ],
        [
            'id' => 4,
            'name' => 'ZENITH 16-CORE CPU',
            'category' => 'COMPONENTES',
            'price' => 549,
            'image' => 'imagenes/productos/componentes/zenith-16-core.png',
            'description' => 'Powerful 16-core processor for multitasking.'
        ],
        [
            'id' => 5,
            'name' => 'SONIC VOID PRO',
            'category' => 'COMPONENTES',
            'price' => 299,
            'image' => 'imagenes/productos/componentes/sonic-void-pro.png',
            'description' => 'Noise-cancelling gaming headset.'
        ],
        [
            'id' => 6,
            'name' => 'WARP 2TB NVME',
            'category' => 'COMPONENTES',
            'price' => 210,
            'image' => 'imagenes/productos/componentes/warp-2tb-nvme.png',
            'description' => 'Fast 2TB NVMe SSD for storage.'
        ],
        [
            'id' => 7,
            'name' => 'K-900 SPECTRAL',
            'category' => 'COMPONENTES',
            'price' => 249,
            'image' => 'imagenes/productos/componentes/k-900-spectral.png',
            'description' => 'Engineered for the absolute edge. Zero-latency mechanical switches encased in an aircraft-grade aluminum chassis.'
        ],
        [
            'id' => 8,
            'name' => 'M-PRIME MOUSE',
            'category' => 'AUDIO',
            'price' => 159,
            'image' => 'imagenes/productos/audio/m-prime-mouse.png',
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