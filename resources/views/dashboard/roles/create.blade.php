@extends('layouts.dashboard')
@section('content')

    <div class="row m-4">

        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New roles </h4>
                    <form class="forms-sample" method="POST" action="{{ route('roles.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <input type="text" name="name" class="form-control" required placeholder="Admin">
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-light" href="{{route('roles.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
