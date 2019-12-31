@extends('layouts.admin')



@section('content')


	<h1>Admin</h1>

	 <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{$post_count}}</p>
                    <p class="announcement-text">Posts</p>
                  </div>
                </div>
              </div>
              <a href="{{URL::to('admin/posts')}}">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                     View Details
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-check fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{$category_count}}</p>
                    <p class="announcement-text">Categories</p>
                  </div>
                </div>
              </div>
              <a href="{{URL::to('admin/categories')}}">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Details
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{$media_count}}</p>
                    <p class="announcement-text">Media</p>
                  </div>
                </div>
              </div>
              <a href="{{URL::to('admin/media')}}">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Details
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{$user_count}}</p>
                    <p class="announcement-text">Users</p>
                  </div>
                </div>
              </div>
              <a href="{{URL::to('admin/users')}}">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Details
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">

      <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Data', 'Count'],

            ['All Posts',3],['Active Posts',2],['Draft Posts',1],['Comments',1],['Pending Comments',1],['Users',3],['Subscribers',2],['Categories',5],            ]);

          var options = {
            chart: {
              title: '',
              subtitle: '',
            }
          };

          var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

          chart.draw(data, google.charts.Bar.convertOptions(options));
        }
      </script>



      <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>




    </div>




@stop