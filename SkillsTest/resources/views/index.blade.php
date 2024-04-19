@extends('layouts.app')
@section('content')
    <h1 class="fw-normal">All Properties</h1>

    <a class="button" href="{{ url('import-listings') }}">Import Properties</a>
    <p>Here are all the properties we have listed:</p>
    <table>
        <thead>
            <tr>
                <th>Price</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Street View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propertyListings as $property)
                <tr>
                    <td>${{ number_format($property->price) }}</td>
                    <td>{{ $property->address_city }}</td>
                    <td>{{ $property->address_state }}</td>
                    <td>{{ $property->address_zip }}</td>
                    <td>{{ $property->bedrooms }}</td>
                    <td>{{ $property->bathrooms }}</td>
                    <td><a href="{{ $property->street_view_url }}" target="_blank">{{ $property->street_view_url }}</a></td>
                </tr>
            @endforeach
    </table>
@endsection
