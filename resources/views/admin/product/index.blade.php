@extends('layouts.adminbase')

@section('title', 'Product List')

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <a href="{{route('admin.product.create')}}" class="btn btn-default btn-success btn-lg">Add Product</a>

                        <!--   Product List -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Products
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">Id</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Images</th>
                                            <th>Image Gallery</th>
                                            <th>Status</th>
                                            <th style="width: 40px"></th>
                                            <th style="width: 40px"></th>
                                            <th style="width: 40px"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $rs)
                                            <tr class="success">
                                                <td>{{$rs->id}}</td>
                                                <td>{{ \App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs->category, $rs->category->title) }}</td>
                                                <td>{{$rs->title}}</td>
                                                <td>{{$rs->price}}</td>
                                                <td>{{$rs->quantity}}</td>
                                                <td>
                                                    @if ($rs->image)
                                                        <img src="{{Storage::url($rs->image)}}" style="height: 60px">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.image.index', ['pid'=>$rs->id])}}"
                                                        onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100 height=700')">
                                                        <img src="{{asset('assets')}}/admin/img/gallery.png" style="width: 50px">
                                                    </a>
                                                </td>
                                                <td>{{$rs->status}}</td>
                                                <td><a href="{{route('admin.product.edit', ['id'=>$rs->id])}}" class="btn btn-sm btn-primary">Edit</a></td>
                                                <td><a href="{{route('admin.product.destroy', ['id'=>$rs->id])}}" onclick="return confirm('Deleting!! Are you sure?')" class="btn btn-sm btn-danger">Delete</a></td>
                                                <td><a href="{{route('admin.product.show', ['id'=>$rs->id])}}" class="btn btn-sm btn-info">Show</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End  Product List -->
                    </div>
                </div>
            </div>



            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        This is a free responsive admin under cc3.0 license, so you can use it for personal and commercial use.
                        <br />
                        Enjoy this admin and for more please keep looking <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

@endsection
