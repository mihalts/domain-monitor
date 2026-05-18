<?php

namespace App\Domain\Domain\Services;

use App\Domain\Domain\DTO\DomainData;
use App\Domain\Domain\Models\Domain;
use App\Domain\Domain\Repositories\DomainRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

readonly class DomainService
{
    public function __construct(
        private DomainRepositoryInterface $domainRepository,
    ) {
    }

    public function listForUser(int $userId): LengthAwarePaginator
    {
        return $this->domainRepository->paginateForUser($userId);
    }

    public function create(DomainData $data): Domain
    {
        return $this->domainRepository->create($data->toArray());
    }

    public function update(int $id, int $userId, DomainData $data): Domain
    {
        $domain = $this->getForUser($id, $userId);

        return $this->domainRepository->update($domain, $data->toArray());
    }

    public function delete(int $id, int $userId): void
    {
        $domain = $this->getForUser($id, $userId);

        $this->domainRepository->delete($domain);
    }

    public function getForUser(int $id, int $userId): Domain
    {
        $domain = $this->domainRepository->findForUser($id, $userId);

        if (!$domain) {
            throw new NotFoundHttpException('Domain not found');
        }

        return $domain;
    }
}
