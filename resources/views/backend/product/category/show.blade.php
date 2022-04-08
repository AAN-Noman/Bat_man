@extends('layouts.backendapp')
@section('title', 'Product View')

@section('content')
    <section>
        <div class="container">
            <div class='row'>
                <div class="col-md-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Product Category <a href="{{ route('backend.category.index') }}"
                                    class="btn btn-dark btn-sm"> Back </a>
                            </h2>
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
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Product Image:<span
                                        class="required"></span>
                                </label>
                                <div>
                                    <img width="200" src="{{ asset('storage/category/' . $category->image) }}"
                                        alt="{{ $category->name }}">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Product Name:<span
                                        class="required"></span>
                                </label>
                                <div>
                                    <h2><strong>{{ $category->name }}</strong></h2>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Product Description:<span
                                        class="required"></span>
                                </label>
                                <div>
                                    <h2>{{ $category->description }}</h2>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Product Icon:<span
                                        class="required"></span>
                                </label>
                                <div>
                                    <h2>{{ $category->icon }}</h2>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Product Slug:<span
                                        class="required"></span>
                                </label>
                                <div>
                                    <h2>{{ $category->slug }}</h2>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Image size:<span
                                        class="required"></span>
                                </label>
                                <div>
                                    <h2> 220x167 px</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
