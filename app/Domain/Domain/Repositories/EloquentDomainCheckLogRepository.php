<?php

namespace App\Domain\Domain\Repositories;

use App\Domain\Domain\Models\DomainCheckLog;

class EloquentDomainCheckLogRepository implements DomainCheckLogRepositoryInterface
{
    public function create(array $data): DomainCheckLog
    {
        return DomainCheckLog::query()->create($data);
    }
}
