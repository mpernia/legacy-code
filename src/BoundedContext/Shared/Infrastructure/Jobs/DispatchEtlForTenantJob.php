<?php

namespace Src\BoundedContext\Shared\Infrastructure\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\MaxAttemptsExceededException;
use Illuminate\Queue\SerializesModels;
use Src\BoundedContext\Backend\Application\Actions\EntityEtl\EtlProcessor;
use Src\BoundedContext\Shared\Infrastructure\Events\DispatchEtlForTenantFailureEvent;
use Src\BoundedContext\Shared\Infrastructure\Exceptions\CanNotDispatchEtlForTenantException;

class DispatchEtlForTenantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private string $date)
    {
    }

    public function handle(EtlProcessor $etlProcessor): void
    {
        try {
            $etlProcessor->__invoke($this->date);
        } catch (Exception $exception) {
            $this->failed($exception);
        }
    }

    public function failed(Exception $exception): void
    {
        if (
            $exception instanceof MaxAttemptsExceededException ||
            $exception instanceof CanNotDispatchEtlForTenantException
        ) {
            event(new DispatchEtlForTenantFailureEvent());
        }
    }
}
