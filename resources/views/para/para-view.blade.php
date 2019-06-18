@extends('layout')
@section('title')
Denominations
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
   {{--  <div class="container"> --}}

    <div class="col-md-12">
      @include('partials.flash')
    </div>
  <br>


  <table class="table table-striped" id="tableP">
    <thead>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th>Mobile</th>
      <th>Contact person</th>
      <th>Email</th>
      <th>Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($parachurches as $parachurch)
    <tr>
    <td>{{$parachurch->name}}</td>
      <td>{{$parachurch->address}}</td>
      <td>{{$parachurch->mobile}}</td>
      <td>{{$parachurch->contact_person}}</td>
      <td>{{$parachurch->email}}</td>
       <td>
       <a title="View More  denomination Info" href="{{ route('parachurch.show', $parachurch->id) }}" class="btn btn-success btn-xs"><i class="icon s7-search icon-sm"></i>
        </a> 

       <a title="Edit denomination" href="{{ route('parachurch.edit', $parachurch->id) }}" class="btn btn-warning btn-xs"><i class="icon s7-pen"></i>
       </a>

        <a title="Deregister denomination" data-method="DELETE" href="{{ route('parachurch.destroy', $parachurch->id) }}" class="btn btn-danger btn-xs"><i class="icon s7-trash"></i>
                         </a>
      </td>
    </tr>
     @endforeach
    </tbody>

  </table>

{{--     </div> --}}
</div>


</div>
@endsection
@section('footer')
@parent

@endsection

@section('page-scripts')

<script type="text/javascript">
  $(document).ready(function(){

    $('#tableP').DataTable({
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'excel',
          text: 'Excel',
          className: 'btn btn-default',

        },

        {
          extend: 'pdf',
          text: 'Pdf',
          className: 'btn btn-default',

        },

        {
          extend: 'copy',
          text: 'Copy',
          className: 'btn btn-default',

        },

        {
          extend: 'csv',
          text: 'CSV',
          className: 'btn btn-default',

        },
        {
          extend: 'print',
          text: 'Print',
          className: 'btn btn-primary',

        },
      ],


    })

  });

</script>

@endsection
