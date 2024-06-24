<?php

namespace Src\BoundedContext\Backend\Infrastructure\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BoundedContext\Backend\Application\Actions\Product\ProductByProductFamilyFinder;
use Src\BoundedContext\Backend\Application\Actions\User\UserEmailSender;
use Src\BoundedContext\Backend\Application\DataTransferObjects\UserListEmailDto;
use Src\BoundedContext\Backend\Infrastructure\Resources\ProductResource;
use Src\BoundedContext\Backend\Infrastructure\Resources\UserListResource;
use Src\BoundedContext\Shared\Infrastructure\Requests\GetProductByProductFamilyRequest;
use Src\BoundedContext\Shared\Infrastructure\Requests\UserListRequest;
use Symfony\Component\HttpFoundation\Response;

class UserEmailSenderController extends Controller
{
    public function __invoke(
        UserEmailSender $emailSender,
        UserListRequest $request
    ): JsonResponse
    {
        $userList = new UserListEmailDto(
            userIds: $request->get('user_ids'),
            message: $request->get('message'),
            asyncMode: $request->get('async_mode')
        );
        return response()->json(
            data: new UserListResource($emailSender->__invoke($userList)),
            status: Response::HTTP_OK
        );
    }
}
