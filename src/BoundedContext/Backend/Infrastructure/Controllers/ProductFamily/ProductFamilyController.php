<?php

namespace Src\BoundedContext\Backend\Infrastructure\Controllers\ProductFamily;

use App\Http\Controllers\Controller;
use Src\BoundedContext\Backend\Infrastructure\Resources\ProductFamilyResource;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\ProductFamily;
use Src\BoundedContext\Shared\Infrastructure\Requests\ProductFamilyRequest;

class ProductFamilyController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', ProductFamily::class);

        return productFamilyResource::collection(ProductFamily::all());
    }

    public function store(ProductFamilyRequest $request)
    {
        $this->authorize('create', ProductFamily::class);

        return new productFamilyResource(ProductFamily::create($request->validated()));
    }

    public function show(ProductFamily $product_family)
    {
        $this->authorize('view', $product_family);

        return new productFamilyResource($product_family);
    }

    public function update(ProductFamilyRequest $request, ProductFamily $product_family)
    {
        $this->authorize('update', $product_family);

        $product_family->update($request->validated());

        return new productFamilyResource($product_family);
    }

    public function destroy(ProductFamily $product_family)
    {
        $this->authorize('delete', $product_family);

        $product_family->delete();

        return response()->json();
    }
}
