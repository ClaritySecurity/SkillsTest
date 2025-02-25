@extends('layouts.app')
@section('content')
    <h1 class="fw-normal">Welcome!</h1>

    <h4>Before importing properties, add the API Key to Services/RealityInUsAPI.php</h4>

    <a class="btn btn-success" href="{{ url('import-listings') }}">Import Properties</a>

@endsection
