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
                            <i class="fa fa-dashboard"></i> 所有時間
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
                                    <div>所有講者!</div>
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
                                    <div>所以評論!</div>
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
                                    <div>所有評語!</div>
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
                                    <div>所有金句!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> 本月
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
                                    <div>新的講者!</div>
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
                                    <div>新的評論!</div>
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
                                    <div>新的評語!</div>
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
                                    <div>新的金句!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> 上一個月
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
                                    <div>上個月的講者!</div>
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
                                    <div>上個月的評論!</div>
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
                                    <div>上個月的評語!</div>
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
                                    <div>上個月的金句!</div>
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
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> 評論排名</h3>
                        </div>
                        <div class="panel-body" style="width:541px;">  
                            <center>
                                <img style="width:100px;position:absolute;margin: 38px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$maxReviewer[0]->profile_picture}}">
                                <h4>{{$maxReviewer[0]->name}} : {{$countMaxreviewer[0]}}篇評論</h4>
                            </center>
                                <img style="width:100px;position:absolute;margin: 64px 100px 20px 29px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$maxReviewer[1]->profile_picture}}">
                                <h4 style="position:absolute;margin: 30px 100px 20px 10px;">{{$maxReviewer[1]->name}} : {{$countMaxreviewer[1]}}篇評論</h4>
                                <img style="width:100px;position:absolute;margin: 90px 100px 20px 373px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$maxReviewer[2]->profile_picture}}">
                                <h4 style="position:absolute;margin: 57px 0px 20px 350px;">{{$maxReviewer[2]->name}} : {{$countMaxreviewer[2]}}篇評論</h4>
                            <center>
                                <!-- <img style="width:500px;margin-top:100px;" src="../../img/Artboard1.png"> -->
                                <img style="width:500px;margin-top:80px;" src="../../admin/img/Podium.png">
                            </center>
                        </div>
                    </div>            
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> 本月評論排名</h3>
                        </div>
                        <div class="panel-body" style="width:541px;">
                        <?php
                            if ($monthMaxReviewer==0) {
                                echo "This month has 0 review!";
                            }else{
                            switch (count($monthMaxReviewer)){
                                case 1:?>
                        <center>
                                <img style="width:100px;position:absolute;margin: 38px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[0]->profile_picture}}">
                                <h4>{{$monthMaxReviewer[0]->name}} : {{$countMonthMaxReviewer[0]}}篇評論</h4>
                            </center>
                            <center>
                                <img style="width:500px;margin-top:80px;" src="../../admin/img/Podium.png">
                            </center>

                        <?php 
                                  break;
                                case 2:?>
                        <center>
                                <img style="width:100px;position:absolute;margin: 38px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[0]->profile_picture}}">
                                <h4>{{$monthMaxReviewer[0]->name}} : {{$countMonthMaxReviewer[0]}}篇評論</h4>
                            </center>
                                <img style="width:100px;position:absolute;margin: 64px 100px 20px 29px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[1]->profile_picture}}">
                                <h4 style="position:absolute;margin: 30px 100px 20px 10px;">{{$monthMaxReviewer[1]->name}} : {{$countMonthMaxReviewer[1]}}篇評論</h4>
                            <center>
                                <img style="width:500px;margin-top:80px;" src="../../admin/img/Podium.png">
                            </center>
                        <?php
                                  break;
                                case 3:?>
                        <center>
                                <img style="width:100px;position:absolute;margin: 38px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[0]->profile_picture}}">
                                <h4>{{$monthMaxReviewer[0]->name}} : {{$countMonthMaxReviewer[0]}}篇評論</h4>
                            </center>
                                <img style="width:100px;position:absolute;margin: 64px 100px 20px 29px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[1]->profile_picture}}">
                                <h4 style="position:absolute;margin: 30px 100px 20px 10px;">{{$monthMaxReviewer[1]->name}} : {{$countMonthMaxReviewer[1]}}篇評論</h4>
                                <img style="width:100px;position:absolute;margin: 90px 100px 20px 373px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$monthMaxReviewer[2]->profile_picture}}">
                                <h4 style="position:absolute;margin: 57px 0px 20px 350px;">{{$monthMaxReviewer[2]->name}} : {{$countMonthMaxReviewer[2]}}篇評論</h4>
                            <center>
                                <img style="width:500px;margin-top:80px;" src="../../admin/img/Podium.png">
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

            <div class="row">
                
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> 上個月評論排名</h3>
                        </div>
                        <div class="panel-body" style="width:541px;">
                        <?php
                            if ($lastMonthMaxReviewer==0) {
                                echo "This month has 0 review!";
                            }else{
                            switch (count($lastMonthMaxReviewer)){
                                case 1:?>
                        <center>
                                <img style="width:100px;position:absolute;margin: 38px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$lastMonthMaxReviewer[0]->profile_picture}}">
                                <h4>{{$lastMonthMaxReviewer[0]->name}} : {{$countLastMonthMaxReviewer[0]}}篇評論</h4>
                            </center>
                            <center>
                                <img style="width:500px;margin-top:80px;" src="../../admin/img/Podium.png">
                            </center>

                        <?php 
                                  break;
                                case 2:?>
                        <center>
                                <img style="width:100px;position:absolute;margin: 38px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$lastMonthMaxReviewer[0]->profile_picture}}">
                                <h4>{{$lastMonthMaxReviewer[0]->name}} : {{$countLastMonthMaxReviewer[0]}}篇評論</h4>
                            </center>
                                <img style="width:100px;position:absolute;margin: 64px 100px 20px 29px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$lastMonthMaxReviewer[1]->profile_picture}}">
                                <h4 style="position:absolute;margin: 30px 100px 20px 10px;">{{$lastMonthMaxReviewer[1]->name}} : {{$countLastMonthMaxReviewer[1]}}篇評論</h4>
                            <center>
                                <img style="width:500px;margin-top:80px;" src="../../admin/img/Podium.png">
                            </center>
                        <?php
                                  break;
                                case 3:?>
                        <center>
                                <img style="width:100px;position:absolute;margin: 38px 100px 20px -48px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$lastMonthMaxReviewer[0]->profile_picture}}">
                                <h4>{{$lastMonthMaxReviewer[0]->name}} : {{$countLastMonthMaxReviewer[0]}}篇評論</h4>
                            </center>
                                <img style="width:100px;position:absolute;margin: 64px 100px 20px 29px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$lastMonthMaxReviewer[1]->profile_picture}}">
                                <h4 style="position:absolute;margin: 30px 100px 20px 10px;">{{$lastMonthMaxReviewer[1]->name}} : {{$countLastMonthMaxReviewer[1]}}篇評論</h4>
                                <img style="width:100px;position:absolute;margin: 90px 100px 20px 373px;" src="https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{$lastMonthMaxReviewer[2]->profile_picture}}">
                                <h4 style="position:absolute;margin: 57px 0px 20px 350px;">{{$lastMonthMaxReviewer[2]->name}} : {{$countLastMonthMaxReviewer[2]}}篇評論</h4>
                            <center>
                                <img style="width:500px;margin-top:80px;" src="../../admin/img/Podium.png">
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

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <!-- Custom Theme JavaScript -->
    <script src={!! json_encode(url('/js/jquery.min.js')) !!}></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <script src={!! json_encode(url('/js/metisMenu.min.js')) !!}></script>
    <script src={!! json_encode(url('/js/plugins/morris/raphael.min.js')) !!}></script>
    <script src={!! json_encode(url('/js/plugins/morris/morris.min.js')) !!}></script>
    <script src={!! json_encode(url('/js/plugins/morris/morris-data.js')) !!}></script>
@endsection


