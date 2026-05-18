@extends('layouts.app')

@section('content')
    <h1>Logs: {{ $domain->name }}</h1>

    <a href="{{ route('domains.index') }}">Back</a>

    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>Result</th>
            <th>Status code</th>
            <th>Response time</th>
            <th>Error</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{ $log->created_at }}</td>
                <td>{{ $log->success ? 'Success' : 'Failed' }}</td>
                <td>{{ $log->status_code ?? '-' }}</td>
                <td>{{ $log->response_time_ms ?? '-' }} ms</td>
                <td>{{ $log->error_message ?? '-' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $logs->links() }}
@endsection
