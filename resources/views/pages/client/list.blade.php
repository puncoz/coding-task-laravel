@extends('layouts.index')

@section('maincontent')

    <div style="margin-bottom: 10px;">
    
    <!-- MESSAGE -->
    @foreach (['error', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg.'_msg'))
            <div class="pull-left alert alert-{{ $msg=='error'?'danger':$msg }} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ ucfirst($msg) }}!</strong> {{ Session::get($msg.'_msg') }}
            </div>
        @endif
    @endforeach

        
    <a href="{{URL::to('client/add')}}" class="btn btn-success tooltip-success pull-right loadForm" 
        data-toggle="tooltip" data-placement="top" title="Add client"
        data-popupbtnlabel="Add" data-popuptitle="Add New Client" data-popupclass="dialog-60">
        <span class="fa fa-user-plus"><span class="sr-only">Add</span></span>
    </a>    
    
    <div class="clearfix"></div>
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Nationality</th>
            <th>DoB</th>
            <th>Education</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @php $cnt = ($clients->currentPage() * $clients->perPage()) - $clients->perPage() @endphp
        @foreach($clients as $id => $client)
            <tr>
                <td>{{++$cnt}}</td>
                <td>{{$client[0]}}</td>
                <td>{{$client[1]}}</td>
                <td>
                    <span style="font-weight: {{$client[4] == 'Phone' ? 'bold' : 'normal'}}">Phone: {{$client[2]}} <i class="fa fa-{{$client[4] == 'Phone' ? 'check' : ''}}"></i></span><br>
                    <span style="font-weight: {{$client[4] == 'Email' ? 'bold' : 'normal'}}">Email: {{$client[3]}} <i class="fa fa-{{$client[4] == 'Email' ? 'check' : ''}}"></i></span>
                </td>
                <td>{{$client[5]}}</td>
                <td>{{$client[6]}}</td>
                <td>{{$client[7]}}</td>
                <td>{{$client[8]}}</td>
                <td>
                    <a href="{{URL::to('client/edit/'.url_encrypt($id))}}" class="btn btn-xs btn-info tooltip-info loadForm" 
                        data-toggle="tooltip" data-placement="top" title="edit"
                        data-popupbtnlabel="Update" data-popuptitle="Update Client" data-popupclass="dialog-60">
                        <span class="fa fa-edit"><span class="sr-only">Edit</span></span>
                    </a>
                    <a href="{{URL::to('client/delete/'.url_encrypt($id))}}" class="btn btn-xs btn-danger tooltip-danger bootbox-confirm" 
                        data-toggle="tooltip" data-placement="top" title="delete"
                        data-msg="Are you sure? You cannot undo once confirmed.">
                        <span class="fa fa-remove"><span class="sr-only">Delete</span></span>
                    </a>
                </td>
            </tr>
        @endforeach
        @if($cnt == 0)
            <tr>
                <td colspan="9">No records found!</td>
            </tr>
        @endif
    </tbody>
</table>

<!-- Pagination -->
<nav aria-label="Page navigation">
@include('layouts.pagination', ['paginator' => $clients])
</nav>

@endsection