<?php

namespace App\Http\Requests;

use App\Domain\Domain\DTO\DomainData;
use App\Domain\Domain\Enums\CheckMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDomainRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
            'check_interval' => ['required', 'integer', 'min:1', 'max:1440'],
            'timeout' => ['required', 'integer', 'min:1', 'max:60'],
            'method' => ['required', Rule::enum(CheckMethod::class)],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function toDto(): DomainData
    {
        return new DomainData(
            userId: $this->user()->id,
            name: $this->validated('name'),
            url: $this->validated('url'),
            checkInterval: (int) $this->validated('check_interval'),
            timeout: (int) $this->validated('timeout'),
            method: $this->validated('method'),
            isActive: $this->boolean('is_active', true),
        );
    }
}
