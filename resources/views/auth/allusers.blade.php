
@extends('layout')
@section('title')
All Users
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

  	<table class="table table-striped" id="userst">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Denomination</th>
			<th>Province</th>
			{{-- <th>Zone</th> --}}
			<th>User Level</th>
			<th>Status</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
		@foreach($userlists as $user)

		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->denomination->name??""}}</td>
			<td>{{$user->province->name}}</td>
			{{-- <td>{{$user->region->name}}</td> --}}
			<td>{{$user->userlevel->name}}</td>
			<td>Active</td>
			<td>
			<a class="btn btn-danger btn-xs"><i class="icon s7-search icon-sm"></i> 
			</a> 
			<a  class="btn btn-danger btn-xs"><i class="icon s7-pen"></i></a>

			<a href="{{ route('delete', $user->id) }}" class="btn btn-danger btn-xs"><i class="icon s7-trash"></i></a>
			</td>
		</tr>
	
		@endforeach
	</tbody>
	
</table>



</div>
		</div>
		@endsection

@section('footer')
@parent



@endsection
@section('page-scripts')
  <script type="text/javascript">
    $(document).ready(function(){

    $('#userst').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ],


                        })
 
    });
    
  </script>


@endsection