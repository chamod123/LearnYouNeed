@extends('layout.app')

@section('contentBody')


    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Blog</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Blog</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        @foreach($blogs as $blog)
                        <article class="entry">

                            {{--<div class="entry-img">--}}
                                {{--<img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">--}}
                            {{--</div>--}}

                            <h2 class="entry-title">
                                <a href="blog-single.html">{{$blog->title}}</a>
                            </h2>

                            <h2 class="entry-title" style="font-size: 18px;">
                                <a href="blog-single.html" style="color: #8b8e95">{{$blog->slug}}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-single.html">{{$blog->user->name}}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-single.html">
                                            <time datetime="2020-01-01">{{$blog->created_at}}</time>
                                        </a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                href="blog-single.html">{{$blog->comment_count}}</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <div>

                                    {!! base64_decode(Illuminate\Support\Str::limit($blog->blog_body, 1000)) !!} ...
{{--                                    {!! base64_decode($blog->blog_body) !!}--}}
                                </div>
                                <?php
                                $enBlog_id = \Illuminate\Support\Facades\Crypt::encrypt($blog->id);
                                ?>
                                <div class="read-more">
                                    <a href="/View_a_Blog_more/{{$enBlog_id}}">Read More</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                        @endforeach

                        {{--<article class="entry">--}}

                            {{--<div class="entry-img">--}}
                                {{--<img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">--}}
                            {{--</div>--}}

                            {{--<h2 class="entry-title">--}}
                                {{--<a href="blog-single.html">Nisi magni odit consequatur autem nulla dolorem</a>--}}
                            {{--</h2>--}}

                            {{--<div class="entry-meta">--}}
                                {{--<ul>--}}
                                    {{--<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a--}}
                                                {{--href="blog-single.html">John Doe</a></li>--}}
                                    {{--<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a--}}
                                                {{--href="blog-single.html">--}}
                                            {{--<time datetime="2020-01-01">Jan 1, 2020</time>--}}
                                        {{--</a></li>--}}
                                    {{--<li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a--}}
                                                {{--href="blog-single.html">12 Comments</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                            {{--<div class="entry-content">--}}
                                {{--<p>--}}
                                    {{--Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum--}}
                                    {{--voluptatum et. Quo libero rerum voluptatem pariatur nam.--}}
                                    {{--Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit--}}
                                    {{--aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui--}}
                                    {{--aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore--}}
                                    {{--enim omnis non alias odio quos distinctio.--}}
                                {{--</p>--}}
                                {{--<div class="read-more">--}}
                                    {{--<a href="blog-single.html">Read More</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</article><!-- End blog entry -->--}}

                        {{--<article class="entry">--}}

                            {{--<div class="entry-img">--}}
                                {{--<img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">--}}
                            {{--</div>--}}

                            {{--<h2 class="entry-title">--}}
                                {{--<a href="blog-single.html">Possimus soluta ut id suscipit ea ut. In quo quia et soluta--}}
                                    {{--libero sit sint.</a>--}}
                            {{--</h2>--}}

                            {{--<div class="entry-meta">--}}
                                {{--<ul>--}}
                                    {{--<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a--}}
                                                {{--href="blog-single.html">John Doe</a></li>--}}
                                    {{--<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a--}}
                                                {{--href="blog-single.html">--}}
                                            {{--<time datetime="2020-01-01">Jan 1, 2020</time>--}}
                                        {{--</a></li>--}}
                                    {{--<li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a--}}
                                                {{--href="blog-single.html">12 Comments</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                            {{--<div class="entry-content">--}}
                                {{--<p>--}}
                                    {{--Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem--}}
                                    {{--dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis.--}}
                                    {{--Doloremque est saepe laborum aut. Ipsa cupiditate ex harum at recusandae nesciunt.--}}
                                    {{--Ut dolores velit.--}}
                                {{--</p>--}}
                                {{--<div class="read-more">--}}
                                    {{--<a href="blog-single.html">Read More</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</article><!-- End blog entry -->--}}

                        {{--<article class="entry">--}}

                            {{--<div class="entry-img">--}}
                                {{--<img src="assets/img/blog/blog-4.jpg" alt="" class="img-fluid">--}}
                            {{--</div>--}}

                            {{--<h2 class="entry-title">--}}
                                {{--<a href="blog-single.html">Non rem rerum nam cum quo minus. Dolor distinctio deleniti--}}
                                    {{--explicabo eius exercitationem.</a>--}}
                            {{--</h2>--}}

                            {{--<div class="entry-meta">--}}
                                {{--<ul>--}}
                                    {{--<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a--}}
                                                {{--href="blog-single.html">John Doe</a></li>--}}
                                    {{--<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a--}}
                                                {{--href="blog-single.html">--}}
                                            {{--<time datetime="2020-01-01">Jan 1, 2020</time>--}}
                                        {{--</a></li>--}}
                                    {{--<li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a--}}
                                                {{--href="blog-single.html">12 Comments</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                            {{--<div class="entry-content">--}}
                                {{--<p>--}}
                                    {{--Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem--}}
                                    {{--veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui.--}}
                                    {{--Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut--}}
                                    {{--itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non--}}
                                    {{--omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus--}}
                                    {{--sint id earum ut nesciunt sed corrupti nemo.--}}
                                {{--</p>--}}
                                {{--<div class="read-more">--}}
                                    {{--<a href="blog-single.html">Read More</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</article><!-- End blog entry -->--}}

                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </div>

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

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
                                        <li><a href="#">{{$category->cat_name}} <span>({{$category->post_count}})</span></a></li>
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
                                        <img src="assets/img/blog/blog-recent-1.jpg" alt="">
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
        </section><!-- End Blog Section -->

    </main><!-- End #main -->

@endsection

@section('content_script')
    <script>
        $('#nave_tab_blog').addClass('active');
    </script>

@endsection
