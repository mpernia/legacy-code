<?php

namespace Src\BoundedContext\Shared\Infrastructure\Events;

use Illuminate\Foundation\Events\Dispatchable;

class DispatchEtlForTenantFailureEvent
{
    use Dispatchable;

    public function __construct()
    {
    }
}
