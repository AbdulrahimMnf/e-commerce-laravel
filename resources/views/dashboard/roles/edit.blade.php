@extends('layouts.dashboard')
@section('content')

    <div class="row m-4">

        <div class="col-12 grid-margin ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit role </h4>
                    <form class="forms-sample" method="POST" action="{{ route('roles.update',[$role->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="m-1">Role Name</label>
                                    <input type="text" name="name" class="form-control" required value="{{$role->name}}">
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary m-2">Submit</button>
                        <a class="btn btn-light" href="{{route('roles.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
