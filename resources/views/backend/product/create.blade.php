@extends('layouts.backendapp')
@section('title', 'Add Product |')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Product <a href="{{ route('backend.product.index') }}" class="btn btn-primary btn-sm">All Products</a></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form class="form-label-left input_mask" action='{{ route('backend.product.store') }}'
                                method='POST' enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6  form-group">
                                    <label for="name">Product Name: </label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" value="{{ old('name') }}">
                                    @error('name')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Photo</label>
                                    <input type="file" class="form-control" name='photo'>
                                    @error('photo')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Product Price: </label>
                                    <input type="text" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
                                    @error('price')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Product Sale Price: </label>
                                    <input type="text" class="form-control" name="sale_price" placeholder="Sale Price" value="{{ old('sale_price') }}">
                                    @error('sale_price')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Quantity: </label>
                                    <input type="text" class="form-control" name="quantity" placeholder="Quantity" value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Cetagory: </label>
                                    <select class="select-multiple form-control" name="categories[]" multiple="multiple">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                      </select>
                                      @error('categories')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Size: </label>
                                    <select class="select-multiple form-control" name="sizes[]" multiple="multiple">
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                      </select>
                                      @error('sizes')
                                      <p class='text-danger'>{{ $message }}</p>
                                  @enderror
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Color: </label>
                                    <select class="select-multiple form-control" name="colors[]" multiple="multiple">
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                      </select>
                                    @error('colors')
                                      <p class='text-danger'>{{ $message }}</p>
                                  @enderror
                                </div>

                                <div class="col-md-12  form-group">
                                    <label>Short Description: </label>
                                    <textarea class="form-control" name="short_description" rows="4">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12  form-group">
                                    <label for="description">Description: </label>
                                    <textarea class="form-control summernote" name="description" id="description" rows="3"
                                        placeholder="Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12  form-group">
                                    <label>Additional Information: </label>
                                    <textarea class="form-control summernote" name="additional_info" rows="4"
                                        placeholder="Additional Information">{{ old('additional_info') }}</textarea>
                                    @error('additional_info')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12  form-group mb-4">
                                    <label>Gallery image: </label>
                                    <input type="file" class='form-control' name='gallery_photo[]' multiple>
                                    @error('gallery_photo')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (session('success'))
        <div class="toast" style="position: absolute; top: 0; right: 0;" data-delay="10000">
            <div class="toast-header">
                <strong class="mr-auto">{{ config('app.name') }}</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    @endif
@endsection

@section('backend_css')
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection

@section('backend_js')
<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js">
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js">
</script>
<script>
    $(document).ready(function() {

        $('.toast').toast('show');

        $('.summernote').summernote({
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
        });

        $('.select-multiple').select2();
    });
</script>
@endsection


