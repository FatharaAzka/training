    
    {!! Form::model($user, ['route' => ['cv.store', $user->user_id], "method" => "put", "files" => true])!!}
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-md-6">
                <div class="form-group form-line">
                    <span class="" style="font-size: 12px">
                        @if(!empty($user->file_cv))
                        <a href="{{asset($user->file_cv)}}" target="_blank">View your CV</a></span><br>
                        @endif
                    <div class="input-group input-file" name="file_cv" style="margin-bottom: 0px;">
                        <span class="input-group-addon">
                            <button class="btn btn-primary btn-choose" type="button">Choose</button>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder='Choose a file...' value=""/>
                        </div>
                    </div>
                    @if ($errors->has('file_cv'))
                        <span class="font-bold col-pink" id="errorAvatar">
                            <strong>*{{ $errors->first('file_cv') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->
        <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
    {!! Form::close()!!}