@extends('layouts.backendapp')
@section('title', 'Product Edit | ')

@section('content')

    <section>
        <div class="container">
            <div class='row'>
                <div class="col-md-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Product Edit <a href="{{ route('backend.product.index') }}" class="btn btn-primary btn-sm">All Product</a></h2>
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
                            <form action="{{ route('backend.product.update', $product->id ) }}" method="POST" enctype="multipart/form-data"
                                class="form-horizontal form-label-left">
                                @csrf
                                @method("PUT")

                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Product image</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <img width="200" src="{{ asset('storage/products/' . $product->photo) }}" alt="{{ $product->title }}">
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Product Name</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="Product Name"
                                            name="name">
                                        <p>name is required and unique</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Product Description<span
                                            class="required"></span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea class="form-control" rows="3" placeholder="Short Description" name="short_description">{{ $product->short_description }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12  form-group">
                                    <label for="description">Description: </label>
                                    <textarea class="form-control summernote" name="description" id="description" rows="3"
                                        placeholder="Description">{{ $product->description }}</textarea>
                                </div>

                                <div class="col-md-12  form-group">
                                    <label>Additional Information: </label>
                                    <textarea class="form-control summernote" name="additional_info" rows="4"
                                        placeholder="Additional Information">{{ $product->additional_info }}</textarea>
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Product Price: </label>
                                    <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $product->price }}">
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Product Sale Price: </label>
                                    <input type="text" class="form-control" name="sale_price" placeholder="Sale Price" value="{{ $product->sale_price }}">
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Quantity: </label>
                                    <input type="text" class="form-control" name="quantity" placeholder="Quantity" value="{{ $product->quantity }}">
                                </div>

                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-success">Updated</button>
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
                <img src="..." class="rounded mr-2" alt="...">
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
@endsection

@section('backend_js')
<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js">
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
    });
</script>
@endsection
