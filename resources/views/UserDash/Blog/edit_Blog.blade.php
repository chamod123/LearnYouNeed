@extends('UserDash.layout.app')

@section('contentBody')
    {{--<div class="d-sm-flex align-items-center justify-content-between mb-4">--}}
    {{--<h1 class="h3 mb-0 text-gray-800">Write New Blog</h1>--}}
    {{--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
    {{--class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
    {{--</div>--}}

    <div class="row box-header">
        <h1 class="h3 mb-2 text-gray-800 col-md-10">Edit Your Blog</h1>
        <h1 class="h3 mb-2 text-gray-800 col-md-2"><a class="btn btn-primary" href="/View_Blogs/{{ Auth::user()->id }}">Your
                Blog</a></h1>
    </div>

    <form method="POST" enctype="multipart/form-data" id="FormId" action="/Edit_Blog">

        <input hidden class="col-md-7 form-control" id="title" name="blog_id" value="{{$blog->id}}">
    @csrf
    <!-- Content Row -->
        <div class="row box-header">
            <div class="row col-md-12">
                <div class="col-md-1"></div>
                <label class="col-md-2">Blog Title</label>
                <input class="col-md-7 form-control" id="title" name="title" value="{{$blog->title}}">

            </div>
        </div>

        <div class="row box-header">
            <div class="row col-md-12">
                <div class="col-md-1"></div>
                <label class="col-md-2">Slug</label>
                <input class="col-md-7 form-control" id="slug" name="slug"  value="{{$blog->slug}}">
            </div>
        </div>

        <div class="row box-header">
            <div class="row col-md-12">
                <div class="col-md-1"></div>
                <label class="col-md-2">Category</label>

                <select name="category_id" class="col-md-7 form-control select2 chosen">
                    <option value="">Select a Category</option>
                    @if(isset($categories))
                        @foreach($categories as $category)

                            @if($category->id == $blog->category_id)
                                <option name="category_id"
                                        value="{{$category->id}}"
                                        selected>
                                    {{$category->cat_name}}</option>
                                @else
                                <option name="category_id"
                                        value="{{$category->id}}"
                                        >
                                    {{$category->cat_name}}</option>
                                @endif



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

        <textarea name="blog_body" id="blog_body" rows="10" cols="80">{!! base64_decode($blog->blog_body) !!}</textarea>

        <div class="row box-header">
            <div class="row col-md-12">
                <div class="col-md-1"></div>
                <button type="submit" class="btn btn-success">Edit</button>
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