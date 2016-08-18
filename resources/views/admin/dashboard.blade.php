@extends('layouts.admin')

@section('content')
<script type="text/javascript" src="{{url('js/plugins/flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{url('js/plugins/flot/jquery.flot.categories.min.js')}}"></script>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard
                        <small>Statistics Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> ALL TIMES
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-4x"></i>

                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$AllSpeakers}}</div>
                                    <div>ALL Speakers!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-wpforms fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$AllReviews}}</div>
                                    <div>ALL Reviews!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$AllComments}}</div>
                                    <div>ALL Comments!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-quote-left fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$AllQuotes}}</div>
                                    <div>ALL Quotes!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> This Month
                </li>
            </ol>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$newSpeaker}}</div>
                                    <div>New Speakers!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-wpforms fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$newReview}}</div>
                                    <div>New Reviews!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$newComment}}</div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-quote-left fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$newQuote}}</div>
                                    <div>New Quotes!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Last Month
                </li>
            </ol>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$lastSpeaker}}</div>
                                    <div>Last Speakers!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-wpforms fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$lastReview}}</div>
                                    <div>Last Reviews!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$lastComment}}</div>
                                    <div>Last Comments!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-quote-left fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$lastQuote}}</div>
                                    <div>Last Quotes!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->           
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Most of Review</h3>
                        </div>
                        <div class="panel-body" style="width:541px;">  
                            <center>
                                <img style="width:100px;position:absolute;margin: 49px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$maxReviewer[0]->profile_picture}}">
                                <h4>{{$maxReviewer[0]->name}}</h4>
                            </center>
                                <img style="width:100px;position:absolute;margin: 193px 100px 20px 29px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$maxReviewer[1]->profile_picture}}">
                                <h4 style="position:absolute;margin: 160px 100px 20px 46px;">{{$maxReviewer[1]->name}}</h4>
                                <img style="width:100px;position:absolute;margin: 141px 100px 20px 373px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$maxReviewer[2]->profile_picture}}">
                                <h4 style="position:absolute;margin: 104px 100px 20px 407px;">{{$maxReviewer[2]->name}}</h4>
                            <center>
                                <img style="width:500px;margin-top:100px;" src="../../img/Artboard1.png">
                            </center>
                        </div>
                    </div>            
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Most of Review this month</h3>
                        </div>
                        <div class="panel-body" style="width:541px;">
                        <?php
                            if ($monthMaxReviewer==0) {
                                echo "This month has 0 review!";
                            }else{
                            switch (count($monthMaxReviewer)){
                                case 1:?>
                        <center>
                                <img style="width:100px;position:absolute;margin: 49px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[0]->profile_picture}}">
                                <h4>{{$monthMaxReviewer[0]->name}}</h4>
                            </center>
                            <center>
                                <img style="width:500px;margin-top:100px;" src="../../img/Artboard1.png">
                            </center>

                        <?php 
                                  break;
                                case 2:?>
                        <center>
                                <img style="width:100px;position:absolute;margin: 49px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[0]->profile_picture}}">
                                <h4>{{$monthMaxReviewer[0]->name}}</h4>
                            </center>
                                <img style="width:100px;position:absolute;margin: 193px 100px 20px 29px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[1]->profile_picture}}">
                                <h4 style="position:absolute;margin: 160px 100px 20px 46px;">{{$monthMaxReviewer[1]->name}}</h4>
                            <center>
                                <img style="width:500px;margin-top:100px;" src="../../img/Artboard1.png">
                            </center>
                        <?php
                                  break;
                                case 3:?>
                        <center>
                                <img style="width:100px;position:absolute;margin: 49px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[0]->profile_picture}}">
                                <h4>{{$monthMaxReviewer[0]->name}}</h4>
                            </center>
                                <img style="width:100px;position:absolute;margin: 193px 100px 20px 29px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[1]->profile_picture}}">
                                <h4 style="position:absolute;margin: 160px 100px 20px 46px;">{{$monthMaxReviewer[1]->name}}</h4>
                                <img style="width:100px;position:absolute;margin: 141px 100px 20px 373px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[2]->profile_picture}}">
                                <h4 style="position:absolute;margin: 104px 100px 20px 407px;">{{$monthMaxReviewer[2]->name}}</h4>
                            <center>
                                <img style="width:500px;margin-top:100px;" src="../../img/Artboard1.png">
                            </center>
                        <?php
                                  break;
                                default:
                                    break;
                            }
                        }
                        ?>
                        </div>
                    </div>            
                </div>
            </div>
            <!-- /.row -->           
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <div class="text-right">
                                <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <span class="badge">just now</span>
                                    <i class="fa fa-fw fa-calendar"></i> Calendar updated
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="badge">4 minutes ago</span>
                                    <i class="fa fa-fw fa-comment"></i> Commented on a post
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="badge">23 minutes ago</span>
                                    <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="badge">46 minutes ago</span>
                                    <i class="fa fa-fw fa-money"></i> Invoice 653 has been paid
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="badge">1 hour ago</span>
                                    <i class="fa fa-fw fa-user"></i> A new user has been added
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="badge">2 hours ago</span>
                                    <i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="badge">yesterday</span>
                                    <i class="fa fa-fw fa-globe"></i> Saved the world
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="badge">two days ago</span>
                                    <i class="fa fa-fw fa-check"></i> Completed task: "fix error on sales page"
                                </a>
                            </div>
                            <div class="text-right">
                                <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Order Date</th>
                                        <th>Order Time</th>
                                        <th>Amount (USD)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>3326</td>
                                        <td>10/21/2013</td>
                                        <td>3:29 PM</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr>
                                        <td>3325</td>
                                        <td>10/21/2013</td>
                                        <td>3:20 PM</td>
                                        <td>$234.34</td>
                                    </tr>
                                    <tr>
                                        <td>3324</td>
                                        <td>10/21/2013</td>
                                        <td>3:03 PM</td>
                                        <td>$724.17</td>
                                    </tr>
                                    <tr>
                                        <td>3323</td>
                                        <td>10/21/2013</td>
                                        <td>3:00 PM</td>
                                        <td>$23.71</td>
                                    </tr>
                                    <tr>
                                        <td>3322</td>
                                        <td>10/21/2013</td>
                                        <td>2:49 PM</td>
                                        <td>$8345.23</td>
                                    </tr>
                                    <tr>
                                        <td>3321</td>
                                        <td>10/21/2013</td>
                                        <td>2:23 PM</td>
                                        <td>$245.12</td>
                                    </tr>
                                    <tr>
                                        <td>3320</td>
                                        <td>10/21/2013</td>
                                        <td>2:15 PM</td>
                                        <td>$5663.54</td>
                                    </tr>
                                    <tr>
                                        <td>3319</td>
                                        <td>10/21/2013</td>
                                        <td>2:13 PM</td>
                                        <td>$943.45</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right">
                                <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <!-- Custom Theme JavaScript -->
    <script src={!! json_encode(url('/js/jquery.min.js')) !!}></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src={!! json_encode(url('/js/metisMenu.min.js')) !!}></script>
    <script src={!! json_encode(url('/js/plugins/morris/raphael.min.js')) !!}></script>
    <script src={!! json_encode(url('/js/plugins/morris/morris.min.js')) !!}></script>
    <script src={!! json_encode(url('/js/plugins/morris/morris-data.js')) !!}></script>
@endsection


