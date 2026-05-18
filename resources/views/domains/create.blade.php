@extends('layouts.app')

@section('content')
    <h1>Add domain</h1>

    @include('domains.partials.form', [
        'action' => route('domains.store'),
        'method' => 'POST',
        'domain' => null,
    ])
@endsection
