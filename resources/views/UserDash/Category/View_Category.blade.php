@extends('UserDash.layout.app')

@section('contentBody')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row box-header">
            <h1 class="h3 mb-2 text-gray-800 col-md-10">Category</h1>
            <h1 class="h3 mb-2 text-gray-800 col-md-2"><a class="btn btn-primary" href="/New_Category">Add New
                    Category</a></h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Category</th>
                            <th>Description</th>
                            <th></th>
                            <th hidden></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($category_data as $category)
                            <?php
                            $enCategory_id = \Illuminate\Support\Facades\Crypt::encrypt($category->id);
                            ?>
                            <tr>
                                <td>{{$category->cat_name}}</td>
                                <td>{{$category->cat_description}}</td>
                                <td>
                                    {{--<a><i class="fas fa-eye btn btn-success btn-circle btn-sm"></i></a>&nbsp--}}
                                    <a href="/Edit_Category/{{$enCategory_id}}"><i
                                                class="fas fa-edit btn btn-warning btn-circle btn-sm"></i></a>&nbsp
                                    <a><i class="far fa-trash-alt btn btn-danger btn-circle btn-sm"></i></a></td>
                                <td hidden>{{$category->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->




@endsection

