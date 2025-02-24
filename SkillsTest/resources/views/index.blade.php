@extends('layouts.app')
@section('content')
    <h1 class="fw-normal">Welcome!</h1>

    <h4>Before you can import properties, follow the steps in the requirements document</h4>

    <a class="btn btn-success" href="{{ url('import-listings') }}">Import Properties</a>

@endsection
