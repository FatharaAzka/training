{!! Form::open(['route' => 'manage_detail.store', "id" => "addDetail", "method" => "post", "files" => true])!!}
        <input type="hidden" name="user_id" value="{{$data->id}}">      
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="name" name="name" class="form-control" value="{{$data->name}}" disabled="disabled">
                        <label class="form-label">Name</label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <span class="" style="font-size: 12px">Jenis Kelamin</span>
                    <div class="demo-radio-button">
                        <input name="jk" type="radio" class="with-gap" id="p" value="p">
                        <label for="p">Perempuan</label>

                        <input name="jk" type="radio" class="with-gap" id="l" value="l">
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
                        <input type="text" id="no_telp" name="no_telp" class="form-control" value>
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
                        <textarea rows="4" class="form-control no-resize" name="alamat" placeholder="Please type what you want..." id="alamat"></textarea>
                    </div>
                    @if ($errors->has('alamat'))
                        <span class="font-bold col-pink" id="errorAlamat">
                            <strong>*{{ $errors->first('alamat') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group form-line">
                <span class="" style="font-size: 12px">Avatar</span><br>
<!-- -->
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