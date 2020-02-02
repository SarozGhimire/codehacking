@extends('layouts.blog-home')


@section('content')


<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                MY BLOGGING MACHINE
                <small>Home for all developer</small>
            </h1>

				<!-- Blog Post -->

				<!-- Title -->
				<h1>{{$post->title}}</h1>

				<!-- Author -->
				<p class="lead">
					by <a href="{{URL::to('/author')}}/{{$post->user_id}}">{{$post->user->name}}</a>
				</p>

				<hr>

				<!-- Date/Time -->
				<p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

				<hr>

				<!-- Preview Image -->
				<img class="img-responsive" src="{{$post->photo->file}}" alt="">

				<hr>

				<!-- Post Content -->
				<p>{{$post->body}}</p>

				<hr>

				<div id="disqus_thread"></div>
				<script>

				/**
				*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
				/*
				var disqus_config = function () {
				this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
				this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				};
				*/
				(function() { // DON'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement('script');
					s.src = 'https://codehacking-dpwl6jvc5e.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
				})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

				<script id="dsq-count-scr" src="//codehacking.disqus.com/count.js" async></script>
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
              <div class="text-center">
              <a href="{{URL::to('/register')}}" class="btn btn-success">Register</a>
              </div>
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

          <div class="well">
            <h4>Populor Posts</h4>
            @foreach($pposts as $post)
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="{{URL::to('/category')}}/{{$category->id}}">{{$post->title}}</a></li>
                    </ul>
                </div>

            </div>
            @endforeach
            <!-- /.row -->
        </div>



          <a class="navbar-brand" href="{{URL::to('https://laravel.com/docs/5.3')}}"><img height="390" width="430" src="{{URL::to('../public/images/laravel.jpg')}}" alt=""></a>

        </div>

    </div>

	</div>

@stop