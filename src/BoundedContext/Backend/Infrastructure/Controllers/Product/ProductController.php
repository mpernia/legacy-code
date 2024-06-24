<?php

namespace Src\BoundedContext\Backend\Infrastructure\Controllers\Product;

use App\Http\Controllers\Controller;
use Src\BoundedContext\Backend\Infrastructure\Resources\ProductResource;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Product;
use Src\BoundedContext\Shared\Infrastructure\Requests\productRequest;

class ProductController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Product::class);

        return productResource::collection(Product::all());
    }

    public function store(productRequest $request)
    {
        $this->authorize('create', Product::class);

        return new productResource(Product::create($request->validated()));
    }

    public function show(Product $product)
    {
        $this->authorize('view', $product);

        return new productResource($product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $product->update($request->validated());

        return new productResource($product);
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $product->delete();

        return response()->json();
    }
}
