@extends('layouts.app')

@section('content')
    <h1>Edit domain</h1>

    @include('domains.partials.form', [
        'action' => route('domains.update', $domain),
        'method' => 'PUT',
        'domain' => $domain,
    ])
@endsection
