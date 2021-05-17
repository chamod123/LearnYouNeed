@extends('UserDash.layout.app')

@section('contentBody')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Your Blog Posters</h1>

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
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Entered Date</th>
                            <th></th>
                            <th hidden></th>
                        </tr>
                        </thead>
                        {{--<tfoot>--}}
                        {{--<tr>--}}
                        {{--<th>Name</th>--}}
                        {{--<th>Position</th>--}}
                        {{--<th>Office</th>--}}
                        {{--<th>Age</th>--}}
                        {{--</tr>--}}
                        {{--</tfoot>--}}
                        <tbody>
                        @foreach($blogs_data as $blog_data)
                            <tr>
                                <td>{{$blog_data->title}}</td>
                                <td>{{$blog_data->slug}}</td>
                                <td>{{$blog_data->category_id}}</td>
                                <td>{{$blog_data->created_at}}</td>
                                <td><a href="/View_a_Blog/{{$blog_data->id}}"><i
                                                class="fas fa-eye btn btn-success btn-circle btn-sm"></i></a>&nbsp
                                    <a><i class="fas fa-edit btn btn-warning btn-circle btn-sm"></i></a>&nbsp
                                    <a><i class="far fa-trash-alt btn btn-danger btn-circle btn-sm"></i></a></td>
                                <td hidden>{{$blog_data->created_at}}</td>
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

