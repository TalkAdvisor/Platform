@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Talk
                        <small>Subheading</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href={{url('admin/dashboard')}}>Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-comment-o"></i> Talk
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-11">
                            <h2>Talk</h2>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#gridSystemModal">
                                <i class="fa fa-btn fa-plus"></i> Create
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Topic</th>
                                <th>Event</th>
                                <th>Event_series</th>
                                <th>Date</th>
                                <th>City</th>
                                <th>Location</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{$event->id}}</td>
                                    <td>{{$event->topic}}</td>
                                    <td>{{$event->event}}</td>
                                    <td>{{$event->event_series}}</td>
                                    <td>{{$event->start_date}}</td>
                                    <td>{{$event->talk_city}}</td>
                                    <td>{{$event->talk_location}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!--Modal-->
        <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Create Talk</h4>
                    </div>
                    <div class="modal-body">
                        <form action='{{url('event')}}' id="eventForm" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-topic">演講的講題</label></h3>
                                <p>按照演講邀請書上寫的</p>
                                <input type="text" name="topic" id="questionnaire-topic" class="form-control"
                                       value="{{old('topic')}}">
                                @if ($errors->has('topic'))<br><p
                                        class="alert alert-danger">{{ $errors->first('topic') }}</p> @endif
                            </div>
                            <div class="form-group  col-md-12">
                                <h3><label>演講的講者</label></h3>
                                        <select class="form-control" name="talker_id">
                                            <option  value="0" selected>請選擇講師</option>
                                            @foreach ($speakers as $speaker)
                                                <option value="{{ $speaker->id }}" @if (old('talker_id') == $speaker->id) selected="selected" @endif>{{ $speaker->talker_name }}</option>
                                            @endforeach
                                        </select>
                            </div>
                            <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-event">如果本次演講屬於較大的活動，請填寫此活動的名稱</label></h3>
                                <p>例如：創業小聚：第62場</p>
                                <input type="text" name="event" id="questionnaire-event" class="form-control"
                                       value="">
                            </div>
                            <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-series">如果本次演講或者活動屬於一個系列，請填寫此系列的名稱</label></h3>
                                <p>例如：『與創業達人有約』</p>
                                <input type="text" name="series" id="questionnaire-series" class="form-control"
                                       value="">
                            </div>
                            <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-date">演講日期</label></h3>
                                <p></p>
                                <div class='input-group date'>
                                    <input type="text" name="date" id="questionnaire-date" class="form-control"
                                           value="{{old('date')}}">
                                <span class="input-group-addon" style="cursor:pointer">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                </span>
                                </div>
                                @if ($errors->has('date'))<br><p
                                        class="alert alert-danger">{{ $errors->first('date') }}</p> @endif
                            </div>
                            <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-city">演講地點(城市)</label></h3>
                                <p></p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="city" id="city_1" value="1"
                                               @if (old('city') == "1") checked @endif>
                                        台北
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="city" id="city_2" value="2"
                                               @if (old('city') == "2") checked @endif>
                                        新北市
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="city" id="city_3" value="3"
                                               @if (old('city') == "3") checked @endif>
                                        新竹
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="city" id="city_4" value="4"
                                               @if (old('city') == "4") checked @endif>
                                        台中
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="city" id="city_5" value="5"
                                               @if (old('city') == "5") checked @endif>
                                        高雄
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="city" id="city_6" value="999"
                                               @if (old('city') == "999") checked @endif>
                                        Other
                                        <input type="text" name="city-field" id="city_6_field"
                                               value="{{old("city-field")}}">
                                    </label>
                                </div>
                                @if ($errors->has('city'))<br><p
                                        class="alert alert-danger">{{ $errors->first('city') }}</p> @endif
                                @if ($errors->has('city-field'))<br><p
                                        class="alert alert-danger">{{ $errors->first('city-field') }}</p> @endif
                            </div>
                            <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-location">演講詳細地點</label></h3>
                                <p></p>
                                <div class="radio">
                                    <label><input name="location" type="radio" value="1"
                                                  @if (old('location') == "1") checked @endif>Garage+</label>
                                </div>
                                <div class="radio">
                                    <label><input name="location" type="radio" value="2"
                                                  @if (old('location') == "2") checked @endif>YOUR SPACE
                                        (數位時代)</label>
                                </div>
                                <div class="radio">
                                    <label><input name="location" type="radio" value="3"
                                                  @if (old('location') == "3") checked @endif>台大集思會議中心 GIS NTU
                                        Convention Center</label>
                                </div>
                                <div class="radio">
                                    <label><input name="location" type="radio" value="4"
                                                  @if (old('location') == "4") checked @endif>DOIT共創公域</label><br>
                                </div>
                                <div class="radio">
                                    <label><input name="location" type="radio" value="5"
                                                  @if (old('location') == "5") checked @endif>台大綜合體育館 NTU Sports
                                        Center</label>
                                </div>
                                <div class="radio">
                                    <label><input name="location" type="radio" value="6"
                                                  @if (old('location') == "6") checked @endif>台大醫院會議中心 NTUH
                                        International Convention Center</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input name="location" type="radio" value="999"
                                               @if (old('city') == "999") checked @endif>Other
                                        <input type="text" name="location-field" id="location_field"
                                               value="{{old("location-field")}}">
                                    </label>
                                </div>
                                @if ($errors->has('location'))<br><p
                                        class="alert alert-danger">{{ $errors->first('location') }}</p> @endif
                                @if ($errors->has('location-field'))<br><p
                                        class="alert alert-danger">{{ $errors->first('location-field') }}</p> @endif
                            </div>
                            <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-organizer">演講主辦單位</label></h3>
                                <p></p>
                                <div class="checkbox">
                                    <label><input name="organizer[]" type="checkbox" value="1"
                                                  @if (old('organizer')) @if (in_array(1,old('organizer'))) checked @endif @endif>數位時代（創業小聚，客座創業家，IoT沙龍，Meet
                                        Taipei）</label><br>
                                </div>
                                <div class="checkbox">
                                    <label><input name="organizer[]" type="checkbox" value="2"
                                                  @if (old('organizer')) @if (in_array(2,old('organizer'))) checked @endif @endif>Garage+</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="organizer[]" type="checkbox" value="3"
                                                  @if (old('organizer')) @if (in_array(3,old('organizer'))) checked @endif @endif>Taiwan
                                        Startup Stadium 台灣新創競技場</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="organizer[]" type="checkbox" value="4"
                                                  @if (old('organizer')) @if (in_array(4,old('organizer'))) checked @endif @endif>500
                                        Startups</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="organizer[]" type="checkbox" value="5"
                                                  @if (old('organizer')) @if (in_array(5,old('organizer'))) checked @endif @endif>TRIPLE
                                        快製中心</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="organizer[]" type="checkbox" value="6"
                                                  @if (old('organizer')) @if (in_array(6,old('organizer'))) checked @endif @endif>tvca
                                        中華民國創業投資商業同業協會</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="organizer[]" type="checkbox" value="7"
                                                  @if (old('organizer')) @if (in_array(7,old('organizer'))) checked @endif @endif>Seinsights
                                        社企流</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="organizer[]" type="checkbox" value="8"
                                                  @if (old('organizer')) @if (in_array(8,old('organizer'))) checked @endif @endif>Fugle
                                        群馥科技</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="organizer[]" type="checkbox" value="999"
                                               @if (old('organizer')) @if (in_array(999,old('organizer'))) checked @endif @endif>Other
                                        <input type="text" name="organizer-field" id="organizer-field"
                                               value="{{old("organizer-field")}}">
                                    </label>
                                </div>
                                @if ($errors->has('organizer'))<br><p
                                        class="alert alert-danger">{{ $errors->first('organizer') }}</p> @endif
                                @if ($errors->has('organizer-field'))<br><p
                                        class="alert alert-danger">{{ $errors->first('organizer-field') }}</p> @endif
                            </div>
                            <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-quote">值得分享的引述</label></h3>
                                <p>不記得講師講過什麼特別有趣的話，沒關係，留空白</p>
                                <input type="text" name="quote" id="questionnaire-quote" class="form-control">
                            </div>
                            <div class="form-group col-md-12" style="display:none">
                                <input type="text" name="form-type" class="form-control"
                                       value="single">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>
    <!-- /#page-wrapper -->
    @if ($errors->any())
    <script>
        $('#gridSystemModal').modal('show');
    </script>
    @endif
    <script>
        $('.input-group.date').datepicker({
            format: 'yyyy/mm/dd',
        });
    </script>
@endsection