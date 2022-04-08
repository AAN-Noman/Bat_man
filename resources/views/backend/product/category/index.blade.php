@extends('layouts.backendapp')
@section('title', 'Product Category')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Category </h2>
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
                            <form class="form-label-left input_mask" action='{{ route('backend.category.store') }}'
                                method='POST' enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12  form-group">
                                    <label for="name">Category Name: </label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
                                </div>

                                <div class="col-md-12  form-group">
                                    <label for="parent">Parent Category: </label>
                                    <select name="parent" id="parent" class="form-control">
                                        <option disabled selected> Select Parent Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12  form-group">
                                    <label for="description">Category Description: </label>
                                    <textarea class="form-control" name="description" id="description" rows="4"
                                        placeholder="Category Description"></textarea>
                                </div>

                                <div class="col-md-12  form-group">
                                    <label for="image">Category Image: </label>
                                    <input type="file" class="form-control" id="image" name='image'>
                                    <p>Image size: 220x167 px</p>
                                </div>

                                <div class="col-md-12  form-group">
                                    <label for="icon">Category Menu Icon: </label>
                                    <input type="text" class="form-control" name='icon' id='icon' placeholder='Icon'>
                                    <p>Full Icon Class Name</p>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All Category</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $category->id }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <img width="50" src="{{ asset('storage/category/'.$category->image) }}" alt="{{ $category->name }}">
                                            </td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <a href="{{ route("backend.category.show", $category->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <button value="{{ route("backend.category.harddelete", $category->id) }}" id='delete' class="btn btn-danger btn-sm">Hard Delete </button>
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

@section('backend_css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css">
@endsection

@section('backend_js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.min.js">
</script>
    <script>
    $('.toast').toast('show');

    // alart

        let url = $('#delete').val(); //JavaScript

        $('#delete').on('click', function(){ //JQuary
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url; //return
                }
            })
        })
</script>
@endsection


