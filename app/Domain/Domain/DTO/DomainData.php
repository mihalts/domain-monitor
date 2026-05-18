<?php

namespace App\Domain\Domain\DTO;

readonly class DomainData
{
    public function __construct(
        public int $userId,
        public string $name,
        public string $url,
        public int $checkInterval,
        public int $timeout,
        public string $method,
        public bool $isActive = true,
    ) {
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'name' => $this->name,
            'url' => $this->url,
            'check_interval' => $this->checkInterval,
            'timeout' => $this->timeout,
            'method' => $this->method,
            'is_active' => $this->isActive,
        ];
    }
}
