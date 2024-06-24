<?php

namespace Src\BoundedContext\Shared\Infrastructure\Exceptions;

class CanNotDispatchEtlForTenantException extends InvalidResponseException
{
    public function __construct()
    {
        parent::__construct(
            jsonEncode([
                'error'   => ' Failure dispatched Etl',
                'message' => 'Can not dispatch Etl for the Tenant.'
            ])
        );
    }
}
