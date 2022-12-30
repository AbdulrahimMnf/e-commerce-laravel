@extends('layouts.dashboard')
@section('content')

    <div class="row text-center">
        <div class="col-12">
            <h2 class="alert">Roles</h2>
        </div>
        <div class="col-12">
            <a class="btn btn-outline-success w-100" href="{{route('roles.create')}}">Create</a>
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
                @forelse ($roles as $role)
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>
                            <a href="{{ route('roles.edit',[$role]) }}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('roles.destroy',[$role]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <div class="alert alert-success">No Roles ..</div>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
