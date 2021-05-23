@extends('UserDash.layout.app')

@section('contentBody')
    {{--<div class="d-sm-flex align-items-center justify-content-between mb-4">--}}
        {{--<h1 class="h3 mb-0 text-gray-800">View Blog</h1>--}}
        {{--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
        {{--class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
    {{--</div>--}}



    <div class="row box-header">
        <div class="row col-md-12">
            {{--<div class="col-md-1"></div>--}}
            <h1 class="col-md-10" style="color: #1d4865"><b> &nbsp {{$blog->title}}</b></h1>
        </div>
    </div>

    <div class="row box-header">
        <div class="row col-md-12">
            {{--<div class="col-md-1"></div>--}}
            <h5 class="col-md-10" style="color: #7b1c24"> &nbsp ( <b>{{$blog->slug}}</b> )</h5>
        </div>
    </div>

    <div style="border: black;border: solid;border-width: 0.1px;padding: 20px;border-radius: 15px">
    <br>
    <br>
    <br>

    {!! base64_decode($blog->blog_body) !!}
    </div>


    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('blog_body');
    </script>




@endsection