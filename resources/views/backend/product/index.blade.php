@extends('layouts.backendapp')
@section('title', 'All Product |')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All Product</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class='colume-title'>Id</th>
                                        <th class='colume-title'>Image</th>
                                        <th class='colume-title'>Title</th>
                                        <th class='colume-title'>Category</th>
                                        <th class='colume-title'>Color</th>
                                        <th class='colume-title'>Size</th>
                                        <th class='colume-title'>Price</th>
                                        <th class='colume-title'>Sale Price</th>
                                        <th class='colume-title'>Quantity</th>
                                        <th class='colume-title'>Status</th>
                                        <th class='colume-title'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>
                                                <img width="100" src="{{ asset('storage/products/' . $product->photo) }}" alt="{{ $product->name }}">
                                            </td>
                                            <td>{{ $product->title }}</td>
                                            <td>
                                                @foreach( $product->categories as $category )
                                                    <span class="badge badge-primary">{{ $category->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach( $product->colors as $color )
                                                    <span class="badge badge-primary">{{ $color->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach( $product->sizes as $size )
                                                    <span class="badge badge-primary">{{ $size->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->sale_price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->status }}</td>
                                            <td class="last">
                                                <a href="{{ route('backend.product.edit', $product->id) }}"
                                                    class="btn btn-primary btn-sm">View/Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

@section('backend_js')
    <script>
        $('.toast').toast('show');
    </script>
@endsection


