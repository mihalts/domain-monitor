<?php

namespace App\Domain\Domain\Services;

use App\Domain\Domain\DTO\DomainCheckResultData;
use App\Domain\Domain\Models\Domain;
use App\Domain\Domain\Repositories\DomainCheckLogRepositoryInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Throwable;

readonly class DomainCheckerService
{
    public function __construct(
        private DomainCheckLogRepositoryInterface $logRepository,
    ) {
    }

    public function check(Domain $domain): void
    {
        $startedAt = microtime(true);

        try {
            $response = Http::timeout($domain->timeout)
                ->send($domain->method, $domain->url);

            $responseTime = (int) ((microtime(true) - $startedAt) * 1000);

            $result = new DomainCheckResultData(
                domainId: $domain->id,
                success: $response->successful(),
                statusCode: $response->status(),
                responseTimeMs: $responseTime,
                errorMessage: null,
            );
        } catch (ConnectionException|Throwable $exception) {
            $responseTime = (int) ((microtime(true) - $startedAt) * 1000);

            $result = new DomainCheckResultData(
                domainId: $domain->id,
                success: false,
                statusCode: null,
                responseTimeMs: $responseTime,
                errorMessage: $exception->getMessage(),
            );
        }

        $this->logRepository->create($result->toArray());
    }
}
