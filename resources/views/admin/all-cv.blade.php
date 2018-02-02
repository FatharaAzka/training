@extends('layouts.app')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CV DATA
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover cv-table dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Unduh</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Unduh</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($data as $cv)
                                    @if(!empty($cv->userDetail->file_cv))
                                        <tr>
                                            <td>{{$cv->name}}</td>
                                            <td>{{$cv->userDetail->file_cv}}</td>
                                            <td><span id="status">@if($cv->userDetail->status == 0)
                                                    Unread
                                                @elseif($cv->userDetail->status == 1)
                                                    Accept
                                                @elseif($cv->userDetail->status == 2)
                                                    Reject
                                                @endif</span>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="published" id="cekStat" data-id="{{$cv->userDetail->id}}" @if ($cv->userDetail->status == 1) checked @endif>
                                            </td>
                                            <td><a href=""><button type="button" class="btn btn-primary btn-modal waves-effect">Unduh</button></a></td>
                                        </tr>
                                    @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
<script>
$(function () {
    $('.cv-table').DataTable({
        responsive: true
    });
}); 
</script>
<script>
        $(document).ready(function(){
            $('.published').iCheck({
                checkboxClass: 'icheckbox_square-yellow',
                radioClass: 'iradio_square-yellow',
                increaseArea: '20%'
            });
            $('.icheckbox_square-yellow')
            $('.published').on('ifClicked', function(event){
                id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::route('changeStatus') }}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function(data) {
                        // empty
                        // $('#status').html("Accept");
                        if(data.status == "1"){
                            $('#status').html("Accept");
                        } else if(data.status == "0") {
                            $('#status').html("Unread");
                        }
                        
                    },  
                });
            });
            $('.published').on('ifToggled', function(event) {
                $(this).closest('tr').toggleClass('warning');
                
            });
        });
        
    </script>
@stop