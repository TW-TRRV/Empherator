<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function viewCatalogo()
    {
        // 1. Definimos la lista de productos (luego la traeremos de la DB)
        $products = [
            ['id' => 1, 'category' => 'COMPONENTS', 'brand' => 'EMPHERATOR', 'name' => 'NEXUS X-900 GPU', 'price' => '1299.00', 'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=X-900+GPU'],
            ['id' => 2, 'category' => 'PERIPHERALS', 'brand' => 'EMPHERATOR', 'name' => 'CYPHER CORE TKL', 'price' => '189.00', 'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=CORE+TKL'],
            ['id' => 3, 'category' => 'PERIPHERALS', 'brand' => 'EMPHERATOR', 'name' => 'VELOCITY G-1', 'price' => '125.00', 'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=VELOCITY+G-1'],
            ['id' => 4, 'category' => 'COMPONENTS', 'brand' => 'EMPHERATOR', 'name' => 'ZENITH 16-CORE CPU', 'price' => '549.00', 'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=ZENITH+CPU'],
            ['id' => 5, 'category' => 'PERIPHERALS', 'brand' => 'EMPHERATOR', 'name' => 'SONIC VOID PRO', 'price' => '299.00', 'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=SONIC+VOID'],
            ['id' => 6, 'category' => 'COMPONENTS', 'brand' => 'EMPHERATOR', 'name' => 'WARP 2TB NVME', 'price' => '210.00', 'image' => 'https://placehold.co/600x400/0a0a0a/FFF?text=WARP+NVME'],
        ];

        // 2. Pasamos la variable $products a la vista
        return view('catalogo', compact('products'));
    }
}