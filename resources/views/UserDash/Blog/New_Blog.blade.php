@extends('UserDash.layout.app')

@section('contentBody')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Write New Blog</h1>
        {{--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
        {{--class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
    </div>

    <!-- Content Row -->
    <div class="row box-header">
        <div class="row col-md-12">
            <div class="col-md-1"></div>
            <label class="col-md-2">Blog Title</label>
            <input class="col-md-7 form-control">
        </div>
    </div>

    <div class="row box-header">
        <div class="row col-md-12">
            <div class="col-md-1"></div>
            <label class="col-md-2">Slug</label>
            <input class="col-md-7 form-control">
        </div>
    </div>

    <div class="row box-header">
        <div class="row col-md-12">
            <div class="col-md-1"></div>
            <label class="col-md-2">Category</label>
            <select class="col-md-7 form-control">
                <option>cat 1</option>
                <option>cat 2</option>
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

    <textarea name="editor1" id="editor1" rows="10" cols="80">
               ...
            </textarea>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
    </script>




@endsection