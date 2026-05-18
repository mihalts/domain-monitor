<?php

namespace App\Domain\Domain\DTO;

readonly class DomainCheckResultData
{
    public function __construct(
        public int $domainId,
        public bool $success,
        public ?int $statusCode,
        public ?int $responseTimeMs,
        public ?string $errorMessage,
    ) {
    }

    public function toArray(): array
    {
        return [
            'domain_id' => $this->domainId,
            'success' => $this->success,
            'status_code' => $this->statusCode,
            'response_time_ms' => $this->responseTimeMs,
            'error_message' => $this->errorMessage,
        ];
    }
}
