<?php

namespace App\Console\Commands;

use App\Domain\Domain\Repositories\DomainRepositoryInterface;
use App\Domain\Domain\Services\DomainCheckerService;
use Illuminate\Console\Command;

class CheckDomainsCommand extends Command
{
    protected $signature = 'domains:check';

    protected $description = 'Check availability of active domains';

    public function handle(
        DomainRepositoryInterface $domainRepository,
        DomainCheckerService $checkerService,
    ): int {
        $domains = $domainRepository->activeDomainsForCheck();

        foreach ($domains as $domain) {
            $checkerService->check($domain);
        }

        $this->info('Domains checked successfully.');

        return self::SUCCESS;
    }
}
