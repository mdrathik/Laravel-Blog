@extends('FrontEnd.master')
@section('title', 'Blog Page')
@section('description', 'Page description')
@section('keyword', 'Page keywords')
@section('body')
    <div class="container">
        <div class="row">
            <!-- Latest Posts -->
            <main class="posts-listing col-lg-8">
                <div class="container">
                    <div class="row">
                        <!-- post -->
                        @foreach($posts as $Post)
                        <div class="post col-xl-6">
                            <div class="post-thumbnail"><a href="{{route('singlePost', $Post->slug)}}"><img src="{{$Post->img_url}}" alt="..." class="img-fluid"></a></div>
                            <div class="post-details">
                                <div class="post-meta d-flex justify-content-between">
                                    <div class="date meta-last"> {{$Post->updated_at}}</div>
                                    <div class="category"><a href="#">{{$Post->category->category_name}}</a></div>
                                </div><a href="{{route('singlePost', $Post->slug)}}">
                                    <h3 class="h4">{{substr(strip_tags($Post->title), 0, 25)}}..</h3></a>
                                <p class="text-muted">{{Str::words($Post->body, '25')}}</p>
                                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                        <div class="avatar"><img src="{{asset('assets')}}/img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                        <div class="title"><span>{{substr(strip_tags($Post->user->name), 0, 10)}}</span></div></a>
                                    <div class="date"><i class="icon-clock"></i> {{Carbon\Carbon::parse($Post->updated_at)->diffForHumans()}}</div>
                                    <div class="comments meta-last"><i class="icon-comment"></i>{{$Post->comment_count}}</div>
                                </footer>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="Page navigation example">
                        {{ $posts->links() }}
                    </nav>
                </div>
            </main>
 @include('FrontEnd.Layouts.aside')
        </div>
    </div>

    @stop