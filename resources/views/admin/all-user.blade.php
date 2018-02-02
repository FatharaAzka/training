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
                                USER
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover user-table dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Birthday</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Birthday</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($user as $data)
                                        @if( $data->hasRole("ROLE_USER") )
                                        <tr>
                                            <td><a href="{{url('manage_detail/'.$data->id)}}">{{$data->name}}</a></td>
                                            <td>{{$data->email}}</td>
                                            <td>
                                                <?php 
                                                echo \Carbon\Carbon::parse($data->age)->toFormattedDateString();
                                                ?>
                                            </td>
                                            
                                            @if( empty($data->userDetail) )
                                            <td>
                                                <a href="{{route('manage_detail.add', $data->id)}}"><button type="button" class="btn btn-primary btn-modal waves-effect" data-name="{{$data->name}}" data-id="{{$data->id}}">Tambah</button></a>
                                            </td>

                                            @else
                                            <td>Ada</td>
                                            @endif

                                            <td>
                                                <button type="button" class="btn btn-danger waves-effect">DELETE</button>
                                            </td>
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

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @include('form.detail_by_admin')
        </div>
    </div>
</div>
<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
<script>
$(function () {
    $('.user-table').DataTable({
        responsive: true
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