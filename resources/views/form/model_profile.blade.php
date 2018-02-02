    
    <form id = 'editProfile' method="put">
        {{csrf_field()}}
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-md-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="name" class="form-control" value="{{$data2->name}}">
                        <label class="form-label" for="name">Name</label>
                    </div>
                    <span class="font-bold col-pink" id="errorName">
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="email" class="form-control" value="{{$data2->email}}">
                        <label class="form-label">Email</label>
                    </div>
                    <span class="font-bold col-pink" id="errorEmail">
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" id="password" class="form-control" value="">
                        <label class="form-label">Password</label>
                    </div>
                    <span class="font-bold col-pink" id="errorPassword">
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" name="password_confirmation" id="password-confirmation" class="form-control" value="">
                        <label class="form-label">Password Confirmation</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="date" class="form-control" name="age" placeholder="Birthday" value="{{$data2->age}}" required id="age">
                    </div>
                    <span class="font-bold col-pink" id="errorAge">
                    </span>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->
        <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
    </form>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script>
    $('#editProfile').on('submit', function(e) {
        event.preventDefault();

        $.ajax({
            type: 'PUT',
            url: "{{route('profile.update' , Auth::user()->id)}}", // point to server-side PHP script
            dataType: 'json', 
            data: {
                '_token' : $('input[name=_token]').val(),
                'name': $('#name').val(),
                'email': $('#email').val(),
                'password': $('#password').val(),
                'password_confirmation': $('#password-confirmation').val(),
                'age': $('#age').val()
            },
            success: function(data) {
                $("#errorName").html('');
                $("#errorEmail").html('');
                $("#errorPassword").html('');
                $("#errorAge").html('');

                $('#btn-name').text( $('#name').val() );
                $('#txt-name').text( $('#name').val() );
                $('#txt-email').text( $('#email').val() );

                console.log(data.name);
                toastr.success('Data berhasil ditambahkan', 'Success');
                
            },
            error: function(data){
                var errors = data.responseJSON;
                setTimeout(function () {
                    toastr.error('Data gagal ditambahkan!', 'Error', {timeOut: 5000});
                }, 500);

                $("#errorEmail").html("");
                $("#errorName").html("");
                $("#errorAge").html("");
                $("#errorPassword").html("");

                if(errors !== 'undefined') {
                    console.log(errors);
                    $.each(errors, function(index, value){
                      //your code
                        if(index=="errors") {
                            $.each(errors[index], function(key, val){
                              //your code
                                $.each(errors['errors'][key], function(key2, values){
                                    //your code
                                    if(key == 'email') {
                                        $("#errorEmail").html(values);
                                    }
                                    if(key == 'password') {
                                        $("#errorPassword").html(values);
                                    }
                                    if(key == 'age') {
                                        $("#errorAge").html(values);
                                    }
                                    if(key == 'name') {
                                        $("#errorName").html(values);
                                    }
                                });
                            });
                        }
                    });
                }

                // console.log(errors['errors']['email']);

                // if (typeof errors['errors']['email'] !== null ) {
                //     if (typeof errors['errors']['email'] !== 'undefined' ) {
                //     document.getElementById("errorEmail").innerHTML = errors['errors']['email'];
                //     }
                // } else {
                //     document.getElementById("errorEmail").innerHTML = "";
                // }
                // if (typeof errors['errors']['name'] !== 'undefined') {
                //     $("#errorName").html(errors['errors']['name']);
                // } else {
                //     $("#errorName").html('');
                // }

                // if (typeof errors['errors']['password'] !== 'undefined') {
                //     $("#errorPassword").html(errors['errors']['password']);
                // } else {
                //     $("#errorPassword").html('');
                // }

                // if (typeof errors['errors']['age'] !== 'undefined') {
                //     $("#errorAge").html(errors['errors']['age']);
                // } else {
                //     $("#errorAge").html('');
                // }
                
            },
        });     
    });
</script>