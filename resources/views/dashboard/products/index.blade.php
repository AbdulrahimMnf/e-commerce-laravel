@extends('layouts.dashboard')

@section('content')
    <div class=" alert h1">Products</div>
    <hr>
    <p>
        <a href="{{ route('products.create') }}" class="btn btn-outline-success">Create New Product</a>
    </p>

    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Controllers</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td class="text-info">
                        <img src="{{ asset($product->image) }}" class="rounded border  shadow  mb-5 bg-white rounded" alt="image"
                            width="75" height="75">
                    </td>
                    <td>
                        {{ $product->title }}
                    </td>
                    <td>
                        <a href="{{ route('products.edit', [$product]) }}" class="btn text-warning">Edit</a><br>
                        <form action="{{route('products.destroy',[$product])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn text-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-info">No Products</div>
            @endforelse
        </tbody>
    </table>
@endsection
