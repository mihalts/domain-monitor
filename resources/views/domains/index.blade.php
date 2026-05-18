@extends('layouts.app')

@section('content')
    <h1>Domains</h1>

    <a class="button" href="{{ route('domains.create') }}">Add domain</a>

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>URL</th>
            <th>Method</th>
            <th>Timeout</th>
            <th>Interval</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($domains as $domain)
            <tr>
                <td>{{ $domain->name }}</td>
                <td>{{ $domain->url }}</td>
                <td>{{ $domain->method }}</td>
                <td>{{ $domain->timeout }} sec</td>
                <td>{{ $domain->check_interval }} min</td>
                <td>{{ $domain->is_active ? 'Yes' : 'No' }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('domains.edit', $domain) }}">Edit</a>
                        <a href="{{ route('domains.logs', $domain) }}">Logs</a>
                        <form method="POST" action="{{ route('domains.destroy', $domain) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $domains->links() }}
@endsection
