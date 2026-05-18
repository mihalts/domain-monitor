<form method="POST" action="{{ $action }}">
    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif

    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $domain?->name) }}" required>

    <label>URL</label>
    <input type="url" name="url" value="{{ old('url', $domain?->url) }}" required>

    <label>Check interval, minutes</label>
    <input type="number" name="check_interval" value="{{ old('check_interval', $domain?->check_interval ?? 5) }}" min="1" max="1440" required>

    <label>Timeout, seconds</label>
    <input type="number" name="timeout" value="{{ old('timeout', $domain?->timeout ?? 10) }}" min="1" max="60" required>

    <label>Method</label>
    <select name="method" required>
        @foreach(['GET', 'HEAD'] as $methodOption)
            <option value="{{ $methodOption }}" @selected(old('method', $domain?->method ?? 'GET') === $methodOption)>
                {{ $methodOption }}
            </option>
        @endforeach
    </select>

    <label>
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $domain?->is_active ?? true))>
        Active
    </label>

    <button type="submit">Save</button>
</form>
