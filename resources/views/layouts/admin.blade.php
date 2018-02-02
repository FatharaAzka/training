@extends('layouts.app')
@section('content')
@if(Auth::user()->hasRole('ROLE_ADMIN'))
<div class="col-lg-12 col-md-12">
    <div class="block-header">
        <h2>
            <blockquote class="m-b-25" style="border-left-color: #406586;padding:15px 20px;background: #fefefe">
                <p>Welcome Admin</p>
            </blockquote>
        </h2>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box-4">
        <div class="icon">
            <i class="material-icons col-light-blue">face</i>
        </div>
        <div class="content">
            <?php $a=0; ?>
            @foreach($user as $data_u)
                @if( ($data_u->hasRole("ROLE_USER")) )
                    <?php $a++ ?>
                @endif
            @endforeach
            <div class="text">USER</div>
            <div class="number">{{$a}}</div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box-4">
        <div class="icon">
            <i class="material-icons col-red">face</i>
        </div>
        <div class="content">
            <?php $a=0; ?>
            @foreach($user as $data_u)
                @if(empty($data_u->userDetail) && ($data_u->hasRole("ROLE_USER")) )
                    <?php $a++ ?>
                @endif
            @endforeach
            <div class="text">USER (no detail)</div>
            <div class="number">{{$a}}</div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box-4">
        <div class="icon">
            <i class="material-icons col-light-blue">attach_file</i>
        </div>
        <div class="content">
            <div class="text">CV</div>
            <div class="number">{{$cv->count()}}</div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box-4">
        <div class="icon">
            <i class="material-icons col-red">attach_file</i>
        </div>
        <div class="content">
            <?php $a=0 ?>
            @foreach($cv as $data_cv)
                @if($data_cv->status == "0")
                    <?php $a++ ?>
                @endif
            @endforeach
            <div class="text">UNREAD CV</div>
            <div class="number">{{$a}}</div>
        </div>
    </div>
</div>
@elseif (Auth::user()->hasRole('ROLE_USER'))

    <div class="block-header">
        <h2>
            Welcome User
        </h2><br>
        <blockquote style="border-left-color:#406586;background:#fefefe">
        @if(!empty($data->file_cv))
            @if($data->status == "0")
                CV Anda belum diproses
            @elseif($data->status == "1")
                CV Anda sudah diterima
            @elseif($data->status == "2")
                CV Anda ditolak
            @endif
        @else
            Anda belum mengupload CV
        @endif
        </blockquote>
    </div>
    @if(Session::has('notice'))
        <!-- For Material Design Colors -->
        <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Perhatian!</h4>
                    </div>
                    <div class="modal-body">
                        {{Session::get('notice')}}. Silahkan mengisi detail profile anda dengan menekan tombol "NEXT"
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-modal btn-link waves-effect">NEXT</button>
                    </div>
                </div>
            </div>
        </div>

        @include('user.detail')
    @endif
@endif

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
$(function () {
    $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-blue-grey');/*/?<>,.-_-=+:{[(*/
    $('#mdModal').modal({backdrop: 'static', keyboard: false});
    
    $('.btn-modal').on('click', function () {
        $('#mdModal').modal('hide');
        $('#largeModal').modal('show');
    });

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
});
</script>
<script type="text/javascript">
    function bs_input_file() {
        $(".input-file").before(
            function() {
                if ( ! $(this).prev().hasClass('input-ghost') ) {
                    var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0' id='avatar'>");
                    element.attr("name",$(this).attr("name"));
                    element.change(function(){
                        element.next(element).find('input').val((element.val()).split('\\').pop());
                    });
                    $(this).find('input').css("cursor","pointer");
                    $(this).find('input').mousedown(function() {
                        $(this).parents('.input-file').prev().click();
                        return false;
                    });
                    return element;
                }
            }
        );
    }
    $(function() {
        bs_input_file();
    });
</script>
@stop