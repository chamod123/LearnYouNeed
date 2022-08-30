@extends('UserDash.layout.app')

@section('contentBody')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row box-header">
            <h1 class="h3 mb-2 text-gray-800 col-md-10">Your Blog Posters</h1>
            <h1 class="h3 mb-2 text-gray-800 col-md-2"><a class="btn btn-primary" href="/New_Blog">Add New Post</a></h1>
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
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Entered Date</th>
                            <th></th>
                            <th hidden></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs_data as $blog_data)
                            <?php
                            $enBlog_id = \Illuminate\Support\Facades\Crypt::encrypt($blog_data->id);
                            ?>
                            <tr>
                                <td>{{$blog_data->title}}</td>
                                <td>{{$blog_data->slug}}</td>
                                <td>{{$blog_data->category->cat_name}}</td>
                                <td>{{$blog_data->created_at}}</td>
                                <td><a href="/View_a_Blog/{{$enBlog_id}}"><i
                                                class="fas fa-eye btn btn-success btn-circle btn-sm"></i></a>&nbsp
                                    <a href="/Edit_Blog/{{$enBlog_id}}"><i
                                                class="fas fa-edit btn btn-warning btn-circle btn-sm"></i></a>&nbsp
                                    {{--<a href="/delete_blog/{{$enBlog_id}}"><i--}}
                                    {{--class="far fa-trash-alt btn btn-danger btn-circle btn-sm"></i></a></td>--}}
                                    @if($blog_data->status == '1')
                                        <a href="/blog/status/{{$enBlog_id}}/0"><i
                                                    class="fas fa-window-close btn btn-danger btn-circle btn-sm"
                                                    style="color: white" title="disable category"></i></a>
                                    @else
                                        <a href="/blog/status/{{$enBlog_id}}/1"><i
                                                    class="far fa-check-square btn btn-success btn-circle btn-sm"
                                                    style="color: white" title="enable category"></i></a>
                                @endif
                                <td hidden>{{$blog_data->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection



@section('content_script')
    <script>
        $(document).ready(function () {

            $('#dataTable').DataTable({
                "bDestroy": true,
                order: [[4, 'desc']],
            });
        });

    </script>

@endsection

