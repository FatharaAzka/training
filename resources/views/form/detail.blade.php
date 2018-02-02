
<form enctype="multipart/form-data" method="post">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">    
    <div class="modal-header">
        <h4 class="modal-title" id="largeModalLabel">User Detail</h4>
    </div>
    <div class="modal-body">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-float">
                    <div class="form-line disabled">
                        <input type="text" id="name" class="form-control" value="{{Auth::user()->name}}" disabled="disabled">
                        <label class="form-label">Name</label>
                    </div>
                    <span class="font-bold col-pink" id="errorUser">
                    </span>
                </div>

                <div class="form-group form-float">
                    <span class="" style="font-size: 12px">Jenis Kelamin</span>
                    <div class="demo-radio-button">
                        <input name="jk" type="radio" class="with-gap" id="p" value="p">
                        <label for="p">Perempuan</label>

                        <input name="jk" type="radio" class="with-gap" id="l" value="l">
                        <label for="l">Laki-Laki</label>
                        <span class="font-bold col-pink" id="errorJk">

                        </span>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="no_telp" name="no_telp" class="form-control">
                        <label class="form-label">No. Telp</label>
                    </div>
                    <span class="font-bold col-pink" id="errorNoTelp">

                    </span>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        <span class="" style="font-size: 12px">Alamat</span>
                        <textarea rows="4" class="form-control no-resize" name="alamat" placeholder="Please type what you want..." id="alamat"></textarea>
                    </div>
                    <span class="font-bold col-pink" id="errorAlamat">

                    </span>
                </div>
                <div class="form-group form-line">
                    <span class="" style="font-size: 12px">Avatar</span>
                    <div class="input-group input-file" name="avatar" style="margin-bottom: 0px;">
                        <span class="input-group-addon">
                            <button class="btn btn-primary btn-choose" type="button">Choose</button>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder='Choose a file...' />
                        </div>
                    </div>
                    <span class="font-bold col-pink" id="errorAvatar">
                    </span>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
    </div>
</form>