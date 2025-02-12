<!-- resources/views/products/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><strong>ID:</strong> {{ $product->id }}</p>
                    <p><strong>Nome:</strong> {{ $product->name }}</p>
                    <p><strong>SKU:</strong> {{ $product->sku }}</p>
                    <p><strong>Preço:</strong> {{ $product->price }}</p>
                    <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>