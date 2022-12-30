@extends('layouts.dashboard')
@section('content')



    <div class="card rounded w-100 m-4 shadow">
        <div class="card-body">
            <h4 class="card-title">Users Table</h4>
            <div class="row  ">
                <div class="col-md-2 mt-2">
                    <a class="card-description btn btn-success text-white w-100 " href="{{ route('users.create') }}">
                        Create User </a>
                </div>

                <div class="col-md-4">
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" placeholder="Search (isim)">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mt-2 ">
                        <div class="dropdown show w-100">
                            <a class="btn btn-dark dropdown-toggle w-100 text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Role ...
                            </a>

                            <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
                                @forelse ($roles as $item)
                                <a class="dropdown-item" href="#">{{ $item->name }}</a>
                                @empty
                                <a class="dropdown-item text-muted">No Rols ... </a>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                @if (strpos(url()->current(), 'search') != false)
                <div class="col-md-2 mt-2">
                    <a class="card-description btn btn-warning text-white w-100 " href="{{ route('users.index') }}">clear filter</a>
                </div>
                @endif


            </div>
        </div>
        <table class="table table-hover table-responsive ">
            <thead class="thead-dark">
                <tr>
                    <th>Controllers</th>
                    <th>Isim</th>
                    <th>Yetkleri</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('users.show', [$user]) }}" class="btn text-info">show</a><br>
                        <a href="{{ route('users.edit', [$user]) }}" class="btn text-warning">Edit</a><br>
                        <form action="{{route('users.destroy',[$user])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn text-danger">Delete</button>
                        </form>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @forelse ($user->getRoleNames() as $role)
                        <span>{{ $role }}</span>
                        @empty
                        <p class="alert alert-info">dont have any role</p>
                        @endforelse
                    </td>
                    <td>{{ $user->email }}</td>
                </tr>
                @empty
                <p class="alert alert-info m-4">No users found</p>
                @endforelse

            </tbody>
        </table>
        <div class="d-felx justify-content-center">
            {{ $users->links() }}
        </div>
    </div>



@endsection
