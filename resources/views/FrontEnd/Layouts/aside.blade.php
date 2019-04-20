<aside class="col-lg-4">
    <!-- Widget [Search Bar Widget]-->
    <div class="widget search">
        <header>
            <h3 class="h6">Search the blog</h3>
        </header>
        <form action="#" class="search-form">
            <div class="form-group">
                <input type="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
            </div>
        </form>
    </div>
    <!-- Widget [Latest Posts Widget]        -->
    <div class="widget latest-posts">
        <header>
            <h3 class="h6">More Posts</h3>
        </header>
        <div class="blog-posts">
            @foreach($latestPosts as $Post)
                <a href="{{route('singlePost', $Post->slug)}}">
                    <div class="item d-flex align-items-center">
                        <div class="image"><img src="{{$Post->img_url}}" alt="..." class="img-fluid"></div>
                        <div class="title"><strong>{{Str::words($Post->title,10)}}</strong>
                            <div class="d-flex align-items-center">
                                <div class="views"><i class="icon-eye"></i> {{$Post->views}}</div>
                                <div class="comments"><i class="icon-comment"></i>{{$Post->comment_count}}</div>
                            </div>
                        </div>
                    </div></a>
            @endforeach
        </div>
    </div>
    <!-- Widget [Categories Widget]-->
    <div class="widget categories">
        <header>
            <h3 class="h6">Categories</h3>
        </header>
        @foreach($categories as $category)
            <div class="item d-flex justify-content-between"><a href="#">{{$category->category_name}}</a><span>{{$category->post_count}}</span></div>
        @endforeach
    </div>
    <!-- Widget [Tags Cloud Widget]-->
    <div class="widget tags">
        <header>
            <h3 class="h6">Tags</h3>
        </header>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
            <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
            <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
            <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
            <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
        </ul>
    </div>
</aside>