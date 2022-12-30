@extends('layouts.dashboard')
@section('content')


    <div class="card shadow m-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Create New Product</p>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="title"><strong>Title</strong></label><input required
                                class="form-control" type="text" name="title"></div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="price"><strong>price</strong></label>
                            <input required class="form-control" type="number" name="price" min="0">
                        </div>
                    </div>

                </div>

                <div class="form-row m-1">
                    <div class="col">
                        <div class="form-group">
                            <label for="price">
                                <strong>Qty</strong>
                            </label>
                            <input required class="form-control" type="number" name="qty" min="1">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="image">
                            <strong>Image</strong>
                        </label>
                        <input required class="form-control" type="file" name="image"
                            accept="image/png, image/gif, image/jpeg">
                    </div>
                </div>

                <div class="form-group">
                    <label><strong>Categories</strong></label><br>
                    <select class="form-control w-100" name="category_id">
                        @forelse ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>

                        @empty
                            <option disabled selected value="0">No Categories</option>
                        @endforelse
                    </select>
                </div>


                <div class="form-row m-1">
                    <div class="col">
                        <div class="form-group">
                            <label for="topic" class="m-1">
                                <strong>Topic</strong>
                                <br>
                            </label>
                            <textarea class="form-control" rows="4" name="topic" style="height: 209px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group m-2">
                    <button class="btn btn-success btn-sm" type="submit">Create</button>|<a
                        href="{{ route('products.index') }}" class="p-1">Back to list</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
@endsection
