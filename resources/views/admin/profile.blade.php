@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="col-lg-5">
                <div class="col-lg-12">
                    <!-- user photo -->
                    <center>
                        <img style="width:200px;margin:auto;" class="img-circle" src='https://s3-ap-northeast-1.amazonaws.com/talk-advisor/users/{{Auth::user()->profile_picture}}'>

                    </center>
                    <div>
                        <center>
                            <button style="margin-top:20px;" class="btn btn-success"><i class="fa fa-upload" aria-hidden="true"></i> 上傳照片
                            </button>
                        </center>
                    </div>
                    <div class="profile">
                        <h3 style="font-size:18px;"><b>姓名 :</b> {{Auth::user()->name}}</h3>
                        <h3 style="font-size:18px;"><b>Email :</b> {{Auth::user()->email}}</h3>
                        <h3 style="font-size:18px;"><b>Phone Number :</b> {{Auth::user()->phone_number}}</h3>
                        <h3 style="font-size:18px;"><b>Facebook ID :</b> {{Auth::user()->facebook_id}}</h3>
                            <button style="float:right;" class="btn btn-success" value="{{Auth::user()->id}}" id="btn-modify"><i class="fa fa-pencil" aria-hidden="true"></i> 修改資料
                            </button>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-7">
                
            </div>
        </div>
        <!-- /.container-fluid -->
         <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Modify Profile</h4>
                    </div>
                    <div class="modal-body">
                        <form id="UserForm" action='{{url('profile')}}' method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ csrf_field() }}
                                    <div class="form-group col-md-12">
                                        <h3><label for="user-name">姓名</label><font class="redStar"> *</font></h3>
                                        <input type="text" name="user-name" id="user-name" class="form-control" value="{{old('user-name')}}"> @if ($errors->has('user-name'))
                                            <br>
                                            <p class="alert alert-danger">{{ $errors->first('user-name') }}</p> @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h3><label for="user-email">Email</label><font class="redStar"> *</font></h3>
                                        <p></p>
                                        <input type="text" name="user-email" id="user-email" class="form-control" value="{{old('user-email')}}"> @if ($errors->has('user-email'))
                                            <br>
                                            <p class="alert alert-danger">{{ $errors->first('user-email') }}</p> @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h3><label for="phone-number">電話號碼</label></h3>
                                        <p></p>
                                        <input type="text" name="phone-number" id="phone-number" class="form-control" value="{{old('phone-number')}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h3><label for="facebook-id">Facebook ID</label></h3>
                                        <input type="text" name="facebook-id" id="facebook-id" class="form-control" value="{{old('facebook-id')}}">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /#page-wrapper -->
    <script>
    $(document).ready(function(){
        var url = "/profile/speaker";
        //display modal form for creating new speaker
        $('#btn-modify').click(function(){
            $('#gridSystemModal').modal({
                backdrop: 'static',
                // keyboard: false , // to prevent closing with Esc button (if you want this too)
            });
            $('.alert').remove();
            // $('.cropit-preview-image').attr('src', '');
            $('#UserForm').trigger("reset");
            $('#UserForm').attr('action','{{url('admin/profile')}}');
            $('#UserForm').attr('method','POST');
            $('#gridSystemModalLabel').text('Modify Profile');
            $('#gridSystemModal').modal('show');
        });

        // $('#crop').click(function(){
        //     $('#cropImage').modal({
        //         // backdrop: 'static',
        //     });
        // });

        $('.open-modal').click(function(){
            $('#UserForm').trigger("reset");
            $('.alert').remove();
            var user_id = $(this).val(); 
            
            $.ajax({
                type: 'GET',
                url: url+'/'+user_id,
                success: function (data) {
                    console.log(data);
                    $('#user-name').val(data.speaker_name);
                    $('#user-email').val(data.speaker_englishname);
                    $('#phone-number').val(data.speaker_company);
                    $('#facebook-id').val(data.speaker_title);

                    $('#UserForm').attr('action',url+'/'+user_id);
                    $('#UserForm').attr('method','POST');
                    $('#gridSystemModalLabel').text('Update User');
                    $('#gridSystemModal').modal('show');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
    </script>

@endsection


