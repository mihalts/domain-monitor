<?php

namespace App\Domain\Domain\Repositories;

use App\Domain\Domain\Models\Domain;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface DomainRepositoryInterface
{
    public function paginateForUser(int $userId): LengthAwarePaginator;

    public function findForUser(int $id, int $userId): ?Domain;

    public function create(array $data): Domain;

    public function update(Domain $domain, array $data): Domain;

    public function delete(Domain $domain): void;

    public function activeDomainsForCheck(): Collection;
}
