@extends('layouts.dashboard')
@section('content')
    <div class="row m-4">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update User </h4>
                    <form class="forms-sample" method="POST" action="{{ route('users.update', [$user]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Isim</label>
                                    <input type="text" name="name" class="form-control" required
                                        placeholder="Abdulrahim" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="email" class="form-control" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="text-muted">(For delete all roles => Null)</label>
                                    <select class="form-control role w-100" name="role" >
                                        @forelse ($roles as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @empty
                                            <option disabled selected value="0">No Roles</option>
                                        @endforelse
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-2 ">Submit</button>
                        <a class="btn btn-light" href="{{ route('users.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <script>
        $(".role").select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "Select a Role",
            allowClear: true
        })
    </script>
@endsection
