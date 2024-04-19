@extends('layouts.app')
@section('content')
    <!--listings></listings-->
    <h1 class="fw-normal m-4">Real Estate Listings</h1>
    @foreach($listings as $listing)
        <div class="card m-4" style="width: 36rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $listing->address_city }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">${{ number_format($listing->price) }}</h6>
                <p class="card-text">{{ $listing->square_footage }} sqft home with {{ $listing->bedrooms }} bedrooms, {{ $listing->bathrooms }} bathrooms</p>
                <a href="{{ $listing->street_view_url }}" class="card-link">{{ $listing->street_view_url }}</a>
            </div>
        </div>

    @endforeach
@endsection
