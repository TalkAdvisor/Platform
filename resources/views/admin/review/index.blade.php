@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Review
                        <small>Subheading</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href={{url('admin/dashboard')}}>Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-male"></i> Review
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-10">
                            <h2>Review</h2>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-default btn-hide" id="btn-view">
                                <i class="fa fa-btn fa-eye"></i> Views
                            </button>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-default" data-toggle="modal" id="btn-add">  <!-- data-target="#gridSystemModal" -->
                                <i class="fa fa-btn fa-plus"></i> Create
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive table-show">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Comment</th>
                                <th>Talk</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <td>{{$review->id}}</td>
                                    <td>{{$review->user_name}}</td>
                                    <td>{{$review->user_email}}</td>
                                    <td>{{$review->comment}}</td>
                                    <td>{{$review->talk_id}}</td>
                                    <td>
                                        <div>
                                        <button class="btn btn-info open-modal" name="talk_update" value="{{$review->id}}" id="btn-update">Update</button>
                                        
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'style' => 'display:inline-block',
                                                'url' => 'review/'.$review->id
                                            ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                     <div class="table-responsive table-hide">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Comment</th>
                                <th>Talk</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($reviewsAll as $review){

                                if(strcmp($review->user_name,Auth::user()->name)==0){
                            
                            ?>
                                <tr>
                                    <td>{{$review->id}}</td>
                                    <td>{{$review->user_name}}</td>
                                    <td>{{$review->user_email}}</td>
                                    <td>{{$review->comment}}</td>
                                    <td>{{$review->talk_id}}</td>
                                    <td>
                                        <div>
                                        <button class="btn btn-info open-modal" name="talk_update" value="{{$review->id}}" id="btn-update">Update</button>
                                        
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'style' => 'display:inline-block',
                                                'url' => 'review/'.$review->id
                                            ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                }
                            }?>
                            </tbody>
                        </table>
                    </div>
                    {{ $reviews->render() }}
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!--Modal-->
        <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Create Review</h4>
                    </div>
                    <div class="modal-body">
                        <form action='{{url('review')}}' id="reviewForm" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <!-- <div class="form-group  col-md-12">
                                <h3><label>演講的主題</label></h3>
                                <select class="form-control" name="talk_id">
                                    @foreach ($talks as $talk)
                                        <option value="{{ $talk->id }}"
                                                @if (old('talk_id') == $talk->id) selected="selected" @endif>{{ $talk->topic }}</option>
                                    @endforeach
                                </select>
                            </div> -->
                            <div id="speakerSection" class=" form-group col-md-12">
                                <h3><label>演講的講者</label></h3>
                                <div id="firstSpeaker"> 
                                    <input type="text" name="speaker-name" id="speaker-name" autocomplete="off" spellcheck="false" class="form-control typeahead tt-query"
                                           value="{{old('speaker-name')}}">     
                                           <!-- <button name="showSecondField" type="button" class="btn btn-default"><i class="fa fa-btn fa-plus"></i></button> -->
                                    <input type="hidden" name="speaker_id" value="">
                                         
                                </div>       
                                <!-- <div id="secondSpeaker" style="display:none;">       
                                    <input type="text" name="speaker-name[]"  autocomplete="off" spellcheck="false" class="form-control typeahead tt-query"
                                           value="{{old('speaker-name[1]')}}">
                                           <button name="hideSecondField" type="button" class="btn btn-default"><i class="fa fa-btn fa-minus"></i></button>
                                    <input type="hidden" name="speaker-id[]" value="">         
                                </div>  --> 
                                @if ($errors->has('speaker-name'))<br><p
                                    class="alert alert-danger">{{ $errors->first('speaker-name') }}</p>
                                @endif             
                            </div>
                            <div class="form-group  col-md-12 sg-replace-icons sg-question sg-type-radio sg-type-radio-likert">
                                <h3><label for="questionnaire-score">演講的評分</label></h3>
                                <p></p>
                                <div class="table-responsive sg-rating-scale">
                                    <table class="table table-striped">
                                        <tr>
                                            <td></td>
                                            <td>非常好</td>
                                            <td>好</td>
                                            <td>尚可</td>
                                            <td>差</td>
                                            <td>非常差</td>
                                        </tr>
                                        <!-- $scores from Util.php -->
                                        @for ($line = 0; $line < count($scores); $line++)
                                            <tr>
                                                <td>{{$scores[$line]["title"]}}
                                                    <div class="help-tip">
                                                        <p>{{$scores[$line]["detail"]}}</p>
                                                    </div>
                                                </td>
                                                @for ($i = 5; $i > 0; $i--)
                                                    <td>
                                                        <div class="radio" style="text-align: left;">
                                                            <label class="sg-cell sg-cell-{{$i}} sg-cell-data">
                                                                <input name="{{$scores[$line]["name"]}}"
                                                                       id="{{$scores[$line]["name"]}}-{{$line}}-{{$i}}"
                                                                       type="radio" class="sg-input sg-input-radio"
                                                                       value="{{ $i }}"
                                                                       @if (old($scores[$line]["name"]) == $i) checked @endif>
                                                                <label for="{{$scores[$line]["name"]}}-{{$line}}-{{$i}}"></label>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endfor
                                            </tr>
                                        @endfor
                                    </table>
                                </div>
                                @if ($errors->has('total-score'))<br><p
                                        class="alert alert-danger">{{ $errors->first('total-score') }}</p> @endif
                                @if ($errors->has('relevance-score'))<br><p
                                        class="alert alert-danger">{{ $errors->first('relevance-score') }}</p> @endif
                                @if ($errors->has('clear-score'))<br><p
                                        class="alert alert-danger">{{ $errors->first('clear-score') }}</p> @endif
                                @if ($errors->has('inspiration-score'))<br><p
                                        class="alert alert-danger">{{ $errors->first('inspiration-score') }}</p> @endif
                                @if ($errors->has('interest-score'))<br><p
                                        class="alert alert-danger">{{ $errors->first('interest-score') }}</p> @endif
                                <!-- @if ($errors->has('content-score'))<br><p
                                        class="alert alert-danger">{{ $errors->first('content-score') }}</p> @endif -->
                            </div>
                            <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-comment">個人評論</label></h3>
                                <p>首要的評分關鍵是講者能夠選取適合觀眾、演講長度、公告的主題的題材的能力。更為重要的是講者在傳達時，是否有能力以清晰、有啟發性且吸引人的方式表達。如果你還是不太知道該如何撰寫你的評論，可以嘗試先以文字敘述你以上填寫評分的原因。</p>
                                <textarea name="comment" id="questionnaire-comment" class="form-control" Rows="6" wrap="soft">{{old('comment')}}</textarea>

                            </div>
                            <div class="form-group  col-md-12">
                                <h3 class="inline"><label for="questionnaire-interviewee-quote">金句</label></h3>
                                <p class="inline">(僅限一句)</p>
                                <p>講者值得分享的金句。 e.g. 資訊時代，新的知識大家都知道，知道並不重要，重要的是執行力。by 簡立峰 - Google Taiwan 總經理</p>
                                
                                <input type="text" name="interviewee-quote" id="questionnaire-interviewee-quote"
                                       class="form-control" value="{{old('interviewee-quote')}}">
                                <!-- @if ($errors->has('interviewee-quote'))<br><p
                                        class="alert alert-danger">{{ $errors->first('interviewee-quote') }}</p> @endif -->
                            </div>
                            <!-- <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-interviewee-name">你的姓名</label></h3>
                                <p></p>
                                <input type="text" name="interviewee-name" id="questionnaire-interviewee-name"
                                       class="form-control" value="{{old('interviewee-name')}}">
                                @if ($errors->has('interviewee-name'))<br><p
                                        class="alert alert-danger">{{ $errors->first('interviewee-name') }}</p> @endif
                            </div> -->
                            <!-- <div class="form-group  col-md-12">
                                <h3><label for="questionnaire-interviewee-email">你的email</label></h3>
                                <p></p>
                                <input type="text" name="interviewee-email" id="questionnaire-interviewee-email"
                                       class="form-control" value="{{old('interviewee-email')}}">
                                @if ($errors->has('interviewee-email'))<br><p
                                        class="alert alert-danger">{{ $errors->first('interviewee-email') }}</p> @endif
                            </div> -->
                            <input type="hidden" name="interviewee-name" value="{{Auth::user()->name}}">
                            <input type="hidden" name="interviewee-email" value="{{Auth::user()->email}}">
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
    $(document).ready(function(){
        var url = "/review";
        //display modal form for creating new speaker
        $('#btn-add').click(function(){
            $('.alert').remove();
            $('#reviewForm').trigger("reset");
            $('#reviewForm').attr('action','{{url('review')}}');
            $('#reviewForm').attr('method','POST');
            $('#gridSystemModalLabel').text('Create Review');
            $('#gridSystemModal').modal('show');
        });


        $('.open-modal').click(function(){
            $('#reviewForm').trigger("reset");
            $('.alert').remove();
            var review_id = $(this).val(); 
            
            $.ajax({
                type: 'GET',
                url: url+'/'+review_id,

                success: function (data) {
                    @foreach ($speakers as $speaker)
                        if({{$speaker->id}} == data.speaker_id){
                            var name = '{{$speaker->speaker_name}}';
                        }
                    @endforeach
                    $('#speaker-name').val(name);
                    $('#questionnaire-comment').val(data.comment);
                    $('#questionnaire-interviewee-quote').val(data.quote);
                    $('#total-score').val($("input[name='']:checked").val());

                    @foreach ($options as $review)
                        
                    @endforeach
                    
                    $('#reviewForm').find(':radio[name=total-score][value="'+data.speaker_language+'"]').prop('checked', true);
                    $('#reviewForm').attr('action',url+'/'+review_id);
                    $('#reviewForm').attr('method','POST');
                    $('#gridSystemModalLabel').text('Update Review');
                    $('#gridSystemModal').modal('show');
                },
                error: function (data) {
                    console.log('Error:', data);
                    // console.log(review_id);
            }
        });
        });
    });
    </script>

    <script>
        var speakers = {!!json_encode($speakers)!!};
        
        speakers = new Bloodhound({
          datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.speaker_name); },
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          // `states` is an array of state names defined in "The Basics"
          local: speakers
        });

        $('#speakerSection input.typeahead').typeahead({
          minLength: 1,
          highlight: true,
          hint: true
        },
        {
          name: 'speakers',
          source:  speakers.ttAdapter(),
          displayKey: 'speaker_name'
        });

        $('#speakerSection input.typeahead').bind('typeahead:select', function(ev, suggestion) {
            $(this).parent().parent().children('input[type= "hidden"]').val(suggestion.id);
        });

    </script>
    <script>
        $(document).ready(function(){
            $('.btn-hide').click(function(){
                $('.table-hide').slideToggle("slow");
                $('.table-show').slideToggle("slow");
            });
        });
    </script>
    <style type="text/css">
        .typeahead, .tt-hint {
            border: 2px solid #CCCCCC;
            /*border-radius: 8px;*/
            height: 30px;
            line-height: 30px;
            outline: medium none;
            padding: 8px 12px;
            width: 100%;
        }
        .typeahead {
            background-color: #FFFFFF;
        }
        .tt-hint {
            color: #999999;
        }
        .tt-menu {
            background-color: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            margin-top: 12px;
            padding: 8px 0;
            width: 100%;
        }
        .tt-suggestion {
            font-size: 24px;
            line-height: 24px;
            padding: 3px 20px;
        }
        .tt-selectable:hover {
            background-color: #0097CF;
            color: #FFFFFF;
            cursor:pointer;
        }
        .tt-suggestion p {
            margin: 0;
        }

        .twitter-typeahead{
            width:90%;
        }
        .table-hide{
            display: none;
        }

    </style>
@endsection