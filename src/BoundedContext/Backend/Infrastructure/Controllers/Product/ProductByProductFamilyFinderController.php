<?php

namespace Src\BoundedContext\Backend\Infrastructure\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BoundedContext\Backend\Application\Actions\Product\ProductByProductFamilyFinder;
use Src\BoundedContext\Backend\Infrastructure\Resources\ProductResource;
use Src\BoundedContext\Shared\Infrastructure\Requests\GetProductByProductFamilyRequest;
use Symfony\Component\HttpFoundation\Response;

class ProductByProductFamilyFinderController extends Controller
{
    public function __invoke(
        ProductByProductFamilyFinder $finder,
        GetProductByProductFamilyRequest $request
    ): JsonResponse
    {
        $products = $finder->__invoke(
            $request->get('product_family_id')
        );
        return response()->json(
            data: ProductResource::collection($products),
            status: Response::HTTP_OK
        );
    }
}
