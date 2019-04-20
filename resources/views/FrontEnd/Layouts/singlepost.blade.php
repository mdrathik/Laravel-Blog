@extends('FrontEnd.master')
@section('title', 'Page Title')
@section('description', 'Page description')
@section('keyword', 'Page keywords')
@section('body')
    <div class="container">
        <div class="row">
            <!-- Latest Posts -->
            <main class="post blog-post col-lg-8">
                <div class="container">
                    <div class="post-single">
                        <div class="post-thumbnail"><img src="{{$Post->img_url}}" alt="..." class="img-fluid"></div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="category"><a href="#">{{$Post->category->category_name}}</a></div>
                            </div>
                            <h1>{{$Post->title}}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                            <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{asset('assets')}}/img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>{{$Post->user->name}}</span></div></a>
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="date"><i class="icon-clock"></i> {{Carbon\Carbon::parse($Post->updated_at)->diffForHumans()}}</div>
                                    <div class="views"><i class="icon-eye"></i> {{$Post->views}}</div>
                                    <div class="comments meta-last"><i class="icon-comment"></i>{{$Post->comment_count}}</div>
                                </div>
                            </div>
                            <div class="post-body">
                                <p class="lead">{{$Post->body}}</p>
                            </div>
                            <div class="post-tags"><a href="#" class="tag">#Business</a><a href="#" class="tag">#Tricks</a><a href="#" class="tag">#Financial</a><a href="#" class="tag">#Economy</a></div>
                            <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row">
                                @if($previous_id)
                                <a href="{{route('singlePost', $previous_id->slug)}}" class="prev-post text-left d-flex align-items-center">
                                    <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                                    <div class="text"><strong class="text-primary">Previous Post </strong>
                                        <h6>{{substr(strip_tags($previous_id->title), 0, 15)}}..</h6>
                                    </div></a>
                                @endif

                                    @if($next_id)
                                <a href="{{route('singlePost', $next_id->slug)}}" class="next-post text-right d-flex align-items-center justify-content-end">
                                    <div class="text"><strong class="text-primary">Next Post </strong>
                                        <h6>{{substr(strip_tags($next_id->title), 0, 15)}}..</h6>
                                    </div>
                                    <div class="icon next"><i class="fa fa-angle-right">   </i></div></a>

                                  @endif

                            </div>




                            <div class="post-comments">
                                <header>
                                    <h3 class="h6">Post Comments<span class="no-of-comments">({{$Post->comment_count}})</span></h3>
                                </header>

                                @foreach($Post->comments as $comment)
                                <div class="comment">
                                    <div class="comment-header d-flex justify-content-between">
                                        <div class="user d-flex align-items-center">
                                            <div class="image"><img src="{{asset('assets')}}/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="title"><strong>{{$comment['user']->name}}</strong><span class="date">{{Carbon\Carbon::parse($comment->updated_at)->diffForHumans()}}</span></div>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </div>

                                    @endforeach

                            </div>


                            <div class="add-comment">
                                <header>
                                    <h3 class="h6">Leave a reply</h3>
                                </header>
                                <form action="#" class="commenting-form">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="username" id="username" placeholder="Name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" name="username" id="useremail" placeholder="Email Address (will not be published)" class="form-control">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea name="usercomment" id="usercomment" placeholder="Type your comment" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-secondary">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('FrontEnd.Layouts.aside')
        </div>
    </div>
@stop