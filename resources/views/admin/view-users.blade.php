@extends('layout')
@section('title')
Users
@endsection

@section('header')
    @parent
@endsection


@section('sidebar')
 @parent
@endsection

@section('content')
    <div class="am-content">
    <div class="main-content">
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>

        </div>
        
        
    </div>
@endsection

@section('footer')
    @parent
 
@endsection

@section('page-scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            
        ],

    });
});
</script>
@endsection


