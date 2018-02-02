@extends('layouts.app')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if (Session::has('notice'))
            <div class="alert alert-danger">
                {{ Session::get('notice')}}
            </div>
        @endif
        <div class="card">
            <div class="header">
                <h2>
                    UPLOAD CV
                </h2>
            </div>
            <div class="body">
                @if($user == null)
                    <h4>You must add your profile data</h4>
                    {{link_to(route('home'), "Back to Home")}}
                @else
                @include('form.model_cv')
                @endif
            </div>
        </div>
    </div>
</div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
    function bs_input_file() {
        $(".input-file").before(
            function() {
                if ( ! $(this).prev().hasClass('input-ghost') ) {
                    var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0' id='file_cv'>");
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

@stop
