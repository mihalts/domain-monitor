<?php

namespace App\Http\Controllers;

use App\Domain\Domain\Services\DomainService;
use App\Http\Requests\StoreDomainRequest;
use App\Http\Requests\UpdateDomainRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DomainController extends Controller
{
    public function __construct(
        private readonly DomainService $domainService,
    ) {
    }

    public function index(): View
    {
        $domains = $this->domainService->listForUser(auth()->id());

        return view('domains.index', compact('domains'));
    }

    public function create(): View
    {
        return view('domains.create');
    }

    public function store(StoreDomainRequest $request): RedirectResponse
    {
        $this->domainService->create($request->toDto());

        return redirect()->route('domains.index')->with('success', 'Domain created successfully.');
    }

    public function edit(int $domain): View
    {
        $domain = $this->domainService->getForUser($domain, auth()->id());

        return view('domains.edit', compact('domain'));
    }

    public function update(UpdateDomainRequest $request, int $domain): RedirectResponse
    {
        $this->domainService->update($domain, auth()->id(), $request->toDto());

        return redirect()->route('domains.index')->with('success', 'Domain updated successfully.');
    }

    public function destroy(int $domain): RedirectResponse
    {
        $this->domainService->delete($domain, auth()->id());

        return redirect()->route('domains.index')->with('success', 'Domain deleted successfully.');
    }

    public function logs(int $domain): View
    {
        $domain = $this->domainService->getForUser($domain, auth()->id());
        $logs = $domain->logs()->latest()->paginate(30);

        return view('domains.logs', compact('domain', 'logs'));
    }
}
