<?php

namespace App\Domain\Domain\Repositories;

use App\Domain\Domain\Models\DomainCheckLog;

interface DomainCheckLogRepositoryInterface
{
    public function create(array $data): DomainCheckLog;
}
