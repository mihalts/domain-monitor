<?php

namespace App\Domain\Domain\Repositories;

use App\Domain\Domain\Models\Domain;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EloquentDomainRepository implements DomainRepositoryInterface
{
    public function paginateForUser(int $userId): LengthAwarePaginator
    {
        return Domain::query()
            ->where('user_id', $userId)
            ->latest()
            ->paginate(15);
    }

    public function findForUser(int $id, int $userId): ?Domain
    {
        return Domain::query()
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();
    }

    public function create(array $data): Domain
    {
        return Domain::query()->create($data);
    }

    public function update(Domain $domain, array $data): Domain
    {
        $domain->update($data);

        return $domain->refresh();
    }

    public function delete(Domain $domain): void
    {
        $domain->delete();
    }

    public function activeDomainsForCheck(): Collection
    {
        return Domain::query()
            ->where('is_active', true)
            ->get();
    }
}
