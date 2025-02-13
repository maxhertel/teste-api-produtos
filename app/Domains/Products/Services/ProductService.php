<?php

namespace App\Domains\Products\Services;

use App\Http\Resources\ProductCollection;
use App\Models\Product;


class ProductService
{
    /**
     * Retorna um produto pelo ID.
     */
    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }
    /**
     * Retorna todos os produtos.
     */
    public function getAllProducts()
    {
        return new ProductCollection(Product::all());;
    }

    /**
     * Cria um novo produto com base nos dados validados.
     */
    public function createProduct(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'sku' => $data['sku'] ?? null, // SKU é opcional
            'price' => $data['price'],
        ]);
    }

    /**
     * Atualiza um produto existente com base nos dados validados.
     */
    public function updateProduct(Product $product, array $data)
    {
        $product->update([
            'name' => $data['name'] ?? $product->name,
            'sku' => $data['sku'] ?? $product->sku, 
            'price' => $data['price'] ?? $product->price, 
        ]);

        return $product;
    }

    /**
     * Exclui um produto.
     */
    public function deleteProduct(Product $product)
    {
        $product->delete();
    }
}
