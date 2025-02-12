<?php

namespace App\Http\Controllers;

use App\Domains\Products\Requests\ProductRequest;
use App\Domains\Products\Services\ProductService;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Exibe a lista de produtos.
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('products.index', compact('products'));
    }

    /**
     * Exibe o formulário de criação de produto.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Armazena um novo produto.
     */
    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();
        $this->productService->createProduct($validatedData);

        return redirect()->route('products.index')
                         ->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um produto.
     */
    public function show($id)
    {
        $product = $this->productService->getProductById($id);
        return view('products.show', compact('product'));
    }

    /**
     * Exibe o formulário de edição de produto.
     */
    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Atualiza um produto existente.
     */
    public function update(ProductRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->productService->updateProduct($this->productService->getProductById($id), $validatedData);

        return redirect()->route('products.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove um produto.
     */
    public function destroy($id)
    {
        $this->productService->deleteProduct($this->productService->getProductById($id));

        return redirect()->route('products.index')
                         ->with('success', 'Produto removido com sucesso!');
    }
}