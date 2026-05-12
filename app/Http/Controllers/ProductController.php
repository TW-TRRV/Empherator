<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Datos de prueba (Luego esto vendrá de la base de datos)
    private $products = [
        [
            'id' => 1,
            'name' => 'NEXUS X-900 GPU',
            'category' => 'COMPONENTS',
            'price' => 1299,
            'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=X-900+GPU',
            'description' => 'High-performance GPU for gaming and computing.'
        ],
        [
            'id' => 2,
            'name' => 'CYPHER CORE TKL',
            'category' => 'PERIPHERALS',
            'price' => 189,
            'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=CORE+TKL',
            'description' => 'Tenkeyless mechanical keyboard with RGB lighting.'
        ],
        [
            'id' => 3,
            'name' => 'VELOCITY G-1',
            'category' => 'PERIPHERALS',
            'price' => 125,
            'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=VELOCITY+G-1',
            'description' => 'Wireless gaming mouse with precision sensor.'
        ],
        [
            'id' => 4,
            'name' => 'ZENITH 16-CORE CPU',
            'category' => 'COMPONENTS',
            'price' => 549,
            'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=ZENITH+CPU',
            'description' => 'Powerful 16-core processor for multitasking.'
        ],
        [
            'id' => 5,
            'name' => 'SONIC VOID PRO',
            'category' => 'PERIPHERALS',
            'price' => 299,
            'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=SONIC+VOID',
            'description' => 'Noise-cancelling gaming headset.'
        ],
        [
            'id' => 6,
            'name' => 'WARP 2TB NVME',
            'category' => 'COMPONENTS',
            'price' => 210,
            'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=WARP+NVME',
            'description' => 'Fast 2TB NVMe SSD for storage.'
        ],
        [
            'id' => 7,
            'name' => 'K-900 SPECTRAL',
            'category' => 'Keyboards',
            'price' => 249,
            'image' => 'https://placehold.co/600x400/000000/FFF?text=K-900',
            'description' => 'Engineered for the absolute edge. Zero-latency mechanical switches encased in an aircraft-grade aluminum chassis.'
        ],
        [
            'id' => 8,
            'name' => 'M-PRIME MOUSE',
            'category' => 'Mice',
            'price' => 159,
            'image' => 'https://placehold.co/600x400/000000/FFF?text=M-PRIME',
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