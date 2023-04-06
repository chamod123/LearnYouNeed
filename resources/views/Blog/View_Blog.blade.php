@extends('layout.app')

@section('title','- View Blog')

@section('contentBody')


    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    @if(isset($selected_category))
                        <h2>{{$selected_category->cat_name}}</h2>
                    @else
                        <h2>Blog</h2>
                    @endif
                    <ol>
                        <li><a>Home</a></li>
                        <li>Blog</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row col-md-12">
                    <div class="col-md-9">
                        <div style="border: black;border: solid;border-width: 0.1px;padding: 20px;border-radius: 15px">
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


                            <br>

                            {!! base64_decode($blog->blog_body) !!}
                        </div>


                        {{--<script>--}}
                        {{--// Replace the <textarea id="editor1"> with a CKEditor 4--}}
                        {{--// instance, using default configuration.--}}
                        {{--CKEDITOR.replace('blog_body');--}}
                        {{--</script>--}}

                    </div>

                    <div class="col-lg-3">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Most Posed Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    @foreach($categories as $category)
                                        <?php
                                        $enCategory_id = \Illuminate\Support\Facades\Crypt::encrypt($category->id);
                                        ?>
                                        <li><a href="/blog/Category/{{$enCategory_id}}">{{$category->cat_name}}
                                                <span>({{$category->post_count}})</span></a></li>
                                    @endforeach
                                </ul>
                            </div><!-- End sidebar categories-->

                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach($recent_posts as $recent_post)
                                    <?php
                                    $enBlog_id = \Illuminate\Support\Facades\Crypt::encrypt($recent_post->id);
                                    ?>
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('blog_thumbnail/'.$recent_post->thumbnail) }}" alt="">
                                        <h4><a href="/View_a_Blog_more/{{$enBlog_id}}">{{$recent_post->title}}</a></h4>
                                        <time datetime="2020-01-01">{{$recent_post->created_at}}</time>
                                    </div>
                                @endforeach

                            </div><!-- End sidebar recent posts-->

                            <h3 class="sidebar-title">Tags</h3>
                            <div class="sidebar-item tags">
                                <ul>
                                    <li><a href="#">App</a></li>
                                    <li><a href="#">IT</a></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Mac</a></li>
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">Office</a></li>
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Studio</a></li>
                                    <li><a href="#">Smart</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul>
                            </div><!-- End sidebar tags-->

                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->
                </div>
            </div>
        </section>
    </main>



@endsection