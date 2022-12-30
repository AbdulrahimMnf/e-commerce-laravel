@extends('layouts.dashboard')
@section('content')
    <div class="row text-center">
        <div class="col-12">
            <h2 class="alert">categories</h2>
        </div>
        <div class="col-12">
            <a class="btn btn-outline-success w-100" href="{{route('categories.create')}}">Create</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th colspan="2">Controller</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{ route('categories.edit',[$category]) }}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy',[$category]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <div class="alert alert-success">No categories ..</div>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
