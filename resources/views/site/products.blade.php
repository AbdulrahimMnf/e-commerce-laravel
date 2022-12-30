@extends('layouts.dashboard')

@section('content')
    <div class="row">

        @forelse ($products as $product)
            <div class="col-md-3 col-sm-12">
                <div class="card shadow">
                    <img src="{{ asset($product->image) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{!! $product->topic !!}</p>
                        <p><strong>Qty: </strong>{{ $product->qty }} </p>
                        @auth
                            <p>
                                <strong>Price: </strong>
                                <span class="badge bg-success">{{ $product->price }}$</span>
                            </p>
                            <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-primary w-100">Add To Cart</a>
                        @else
                            <div class="alert alert-danger">Login to see more info</div>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info"> We Dont Have Products Yet..</div>
        @endforelse

    </div>
@endsection
