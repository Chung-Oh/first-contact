@extends('layouts.layout')

@section('content')
    <h3>Editar cliente</h3>
    @include('form._form_errors')
    {{ Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PUT']) }}
    <!-- {{ Form::open(['route' => ['clients.update', $client->id], 'method' => 'PUT']) }} -->
    <!-- <form method="post" action="{{route('clients.update', ['client' => $client->id])}}">
    {{ method_field('PUT') }} -->
        @include('admin.clients._form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    {{ Form::close() }}
    <!-- </form> -->
@endsection