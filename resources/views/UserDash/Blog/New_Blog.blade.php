@extends('UserDash.layout.app')

@section('contentBody')
    {{--<div class="d-sm-flex align-items-center justify-content-between mb-4">--}}
    {{--<h1 class="h3 mb-0 text-gray-800">Write New Blog</h1>--}}
    {{--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
    {{--class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
    {{--</div>--}}

    <div class="row box-header">
        <h1 class="h3 mb-2 text-gray-800 col-md-10">Write New Blog</h1>
        <h1 class="h3 mb-2 text-gray-800 col-md-2"><a class="btn btn-primary" href="/View_Blogs/{{ Auth::user()->id }}">Your
                Blog</a></h1>
    </div>

    <form method="POST" enctype="multipart/form-data" id="FormId" action="">
    @csrf
    <!-- Content Row -->
        <div class="row box-header">
            <div class="row col-md-12">
                <div class="col-md-1"></div>
                <label class="col-md-2">Blog Title</label>
                <input class="col-md-7 form-control" id="title" name="title" required>
            </div>
        </div>

        <div class="row box-header">
            <div class="row col-md-12">
                <div class="col-md-1"></div>
                <label class="col-md-2">Slug</label>
                <input class="col-md-7 form-control" id="slug" name="slug" required>
            </div>
        </div>

        <div class="row box-header">
            <div class="row col-md-12">
                <div class="col-md-1"></div>
                <label class="col-md-2">Main Category</label>

                <select name="main_category_id" class="col-md-7 form-control select2 chosen" required>
                    <option value="" >Select a Main Category</option>
                    @if(isset($main_categories))
                        @foreach($main_categories as $main_category)

                            <option name="main_category_id"
                                    value="{{$main_category->id}}">
                                {{$main_category->main_cat_name}}</option>

                        @endforeach
                    @elseif(isset($message))
                        <p>{{$message}}</p>
                    @endif
                </select>
            </div>
        </div>

        <div class="row box-header">
            <div class="row col-md-12">
                <div class="col-md-1"></div>
                <label class="col-md-2">Category</label>

                <select name="category_id" class="col-md-7 form-control select2 chosen" required>
                    <option value="">Select a Category</option>
                    @if(isset($categories))
                        @foreach($categories as $category)

                            <option name="category_id"
                                    value="{{$category->id}}">
                                {{$category->cat_name}}</option>

                        @endforeach
                    @elseif(isset($message))
                        <p>{{$message}}</p>
                    @endif
                </select>
            </div>
        </div>

        <div class="row box-header">
            <div class="row col-md-12">
                <div class="col-md-1"></div>
                <label class="col-md-2">Body</label>
                {{--<input class="col-md-7 form-control">--}}
            </div>
        </div>

        <textarea name="blog_body" id="blog_body" rows="10" cols="80"></textarea>

        <div class="row box-header">
            <div class="row col-md-12">
                <div class="col-md-1"></div>
                <button type="submit" class="btn btn-success">Save</button>
                {{--<input class="col-md-7 form-control">--}}
            </div>
        </div>
    </form>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('blog_body');
    </script>




@endsection