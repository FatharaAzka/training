
@foreach($data as $cek)
<!--  <form id="editDetail" method="put" enctype="multipart/form-data" action="{{route('detail.update', $cek->id)}}"> -->
    @if($cek->userDetail == null)
        <h4>You must add your profile data</h4>
        <div class="button-demo js-modal-buttons">
            <button type="button" data-toggle="modal" data-target="#largeModal" class="btn bg-red waves-effect">RED</button> 
        </div>
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    @include('form.detail')
                </div>
            </div>
        </div>
    @else
        {!! Form::model($cek, ['route' => ['detail.update', $cek->id], "id" => "editDetail", "method" => "put", "files" => true])!!}
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> 
                <input type="hidden" name="link" value="{{route('detail.update', $cek->userDetail->id)}}">     
                <!-- Vertical Layout | With Floating Label -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <span class="" style="font-size: 12px">Jenis Kelamin</span>
                            <div class="demo-radio-button">
                                <input name="jk" type="radio" class="with-gap" id="p" value="p" {{ $cek->userDetail->jk == 'p' ? 'checked' : '' }}>
                                <label for="p">Perempuan</label>

                                <input name="jk" type="radio" class="with-gap" id="l" value="l" {{ $cek->userDetail->jk == 'l' ? 'checked' : '' }}>
                                <label for="l">Laki-Laki</label>
                                @if ($errors->has('jk'))
                                    <span class="font-bold col-pink" id="errorJk">
                                        <strong>*{{ $errors->first('jk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="no_telp" name="no_telp" class="form-control" value="{{$cek->userDetail->no_telp}}">
                                <label class="form-label">No. Telp</label>
                            </div>
                            @if ($errors->has('no_telp'))
                                <span class="font-bold col-pink" id="errorNoTelp">
                                    <strong>*{{ $errors->first('no_telp') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <span class="" style="font-size: 12px">Alamat</span>
                                <textarea rows="4" class="form-control no-resize" name="alamat" placeholder="Please type what you want..." id="alamat">{{ $cek->userDetail->alamat }}</textarea>
                            </div>
                            @if ($errors->has('alamat'))
                                <span class="font-bold col-pink" id="errorAlamat">
                                    <strong>*{{ $errors->first('alamat') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group form-line">
                        <span class="" style="font-size: 12px">Avatar</span><br>
                        <div class="col-md-2 col-sm-3 col-xs-12 col-lg-2">
                            <img src="{{asset($cek->userDetail->avatar)}}" class="img-responsive">
                        </div>
                            <div class="input-group input-file" name="avatar" style="margin-bottom: 0px;">
                                <span class="input-group-addon">
                                    <button class="btn btn-primary btn-choose" type="button">Choose</button>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder='Choose a file...' value=""/>
                                </div>
                            </div>
                            @if ($errors->has('avatar'))
                                <span class="font-bold col-pink" id="errorAvatar">
                                    <strong>*{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Vertical Layout | With Floating Label -->
                <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
        {!! Form::close()!!}
    @endif
@endforeach
<script>
$('#largeModal').on('submit', function(e) {
    event.preventDefault();

    //getjk
    var jk = $('input[name=jk]:checked').val();

    //cek file
    var avatar = $('#avatar').prop('files')[0];

    //masukkan data ke form data
    var user = new FormData();
    user.append('_token', $('input[name=_token]').val());
    user.append('user_id', $('input[name=user_id]').val());
    user.append('jk', jk);
    user.append('no_telp', $('#no_telp').val() );
    user.append('alamat', $('#alamat').val() );
    user.append('avatar', avatar);

    $.ajax({
        url: "{{route('detail.store')}}", // point to server-side PHP script
        data: user,
        type: 'POST',
        dataType: 'json',
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        success: function(data) {
            $("#errorJk").html('');
            $("#errorNoTelp").html('');
            $("#errorAlamat").html('');
            $("#errorAvatar").html('');

            toastr.success('Data berhasil ditambahkan', 'Success');
            console.log("ini form");
            // $('#largeModal').get(0).reset();
            $('#largeModal').modal('hide');
            location.reload();
        },
        error: function(data){
            var errors = data.responseJSON;
            setTimeout(function () {
                toastr.error('Data gagal ditambahkan!', 'Error', {timeOut: 5000});
            }, 500);
            $('#largeModal').modal('show');
            console.log(errors);

            if (typeof errors['errors']['user_id'] !== 'undefined') {
                $("#errorUser").html(errors['errors']['user_id']);
            } else {
                $("#errorUser").html('');
                if (typeof errors['errors']['jk'] !== 'undefined') {
                    $("#errorJk").html(errors['errors']['jk']);
                } else {
                    $("#errorJk").html('');
                }

                if (typeof errors['errors']['no_telp'] !== 'undefined') {
                    $("#errorNoTelp").html(errors['errors']['no_telp']);
                } else {
                    $("#errorNoTelp").html('');
                }

                if (typeof errors['errors']['alamat'] !== 'undefined') {
                    $("#errorAlamat").html(errors['errors']['alamat']);
                } else {
                    $("#errorAlamat").html('');
                }

                if (typeof errors['errors']['avatar'] !== 'undefined') {
                    $("#errorAvatar").html(errors['errors']['avatar']);
                } else {
                    $("#errorAvatar").html('');
                }
            }
        }
    });     
});
</script>

<!-- </form> -->