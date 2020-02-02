@extends('layouts.blog-home')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                MY BLOGGING MACHINE
                <small>Home for all developer</small>
            </h1>

            <!-- First Blog Post -->
            @foreach($posts as $post)
            <h2>
                <a href="{{URL::to('/')}}/post/{{$post->slug}}">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by <a href="{{URL::to('/author')}}/{{$post->user_id}}">{{$post->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
            <hr>
            <img src="{{$post->photo ?  URL::to('/') : ''}}{{$post->photo ?  $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
            <hr>
            <p>{{str_limit($post->body, $limit = 10, $end = '............')}}</p>  
            <a class="btn btn-primary" href="{{URL::to('/')}}/post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
            @endforeach

            <div class="row">

                <div class="col-sm-6 col-sm-offset-5">

                    {{$posts->render()}}

                </div>

            </div>

        </div>

         <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                  <form method="POST" action="{{URL::to('/search')}}">
                    {{ csrf_field() }}
                    <span class="input-group-btn">
                    <input type="text" class="form-control" name="key">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                  </form>
                </div>
                <!-- /.input-group -->
            </div>




            <!-- Login Form -->
            @if(!$user)
            <div class="well">
                    <h4>Login</h4>
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <input type="text" name="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
                      @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                  </div>
                  <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                      <input type="password" name="password" class="form-control" placeholder="Enter Password">
                      @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                      <span class="input-group-btn">
                          <button class="btn btn-primary" type="submit" name="login">Submit</button>
                      </span>
                  </div>
              </form><br>
              <a href="{{URL::to('/register')}}" class="btn btn-success">Register</a>
          </div>
          @endif

          
          <!-- Blog Categories Well -->
          <div class="well">
            <h4>Blog Categories</h4>
            @foreach($categories as $category)
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="{{URL::to('/category')}}/{{$category->id}}">{{$category->name}}</a></li>
                    </ul>
                </div>

            </div>
            @endforeach
            <!-- /.row -->
        </div>



            <a class="navbar-brand" href="{{URL::to('https://laravel.com/docs/5.3')}}"><img height="390" width="430" src="{{URL::to('../public/images/laravel.jpg')}}" alt=""></a>

    </div>

</div>
<!-- /.row -->

<hr>

<!-- /.container -->
@endsection
