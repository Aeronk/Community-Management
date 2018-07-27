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
     

   <div class="row">
    <div class="col-md-6  col-md-offset-3">
      
  
     

        <table class="table" width="60%" style="mar: 0px">
        <thead>
            <tr>
                <th>Target</th>
                <th>Search text</th>
            </tr>
        </thead>
        <tbody>
            <tr id="filter_global">
                <td>Global search</td>
                <td align="center"><input type="text" class="global_filter" id="global_filter"></td>
               
            </tr>
            <tr id="filter_col1" data-column="0">
                <td>Denomination Name</td>
                <td align="center"><input type="text" class="column_filter" id="col0_filter"></td>
               
            </tr>
            <tr id="filter_col2" data-column="1">
                <td>HOD</td>
                <td align="center"><input type="text" class="column_filter" id="col1_filter"></td>
             
            </tr>
            <tr id="filter_col3" data-column="4">
                <td>Status</td>
                <td align="center">
                  {{-- <input type="text" class="column_filter" id="col2_filter"> --}}
                  <select class="columns_filter" id="col4_filter">
                    <option></option>
                    <option>Good</option>
                    <option>Bad</option>
                    <option>Deregistered</option>
                    
                  </select>


                </td>
               
            </tr>
         
        </tbody>
    </table>
      </div>
        
    </div>
   

            <br>
          

    		 <table id="table5" class="table table-striped table-hover table-fw-widget display" style="padding:3px">
                <thead>
                  <tr class="default">
                    <th>Denomination Name</th>
                    <th>Bishop</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Operations</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($denominations as $denomination)
                        
                      <tr class="odd gradeX">
                        <td>{{$denomination->name}}</td>
                        <td>{{$denomination->hod->first_name}} {{$denomination->hod->last_name}}</td>
                        <td>{{$denomination->hod->email}}</td>
                        <td>{{$denomination->hod->home_tel}}</td>
                        <td>
                        
                          <button id="not-success" class="btn btn-space btn-success">
                          {{$denomination->status}}</button>


                        </td>
                        
                        <td>
                         <a title="View More  denomination Info" href="{{ route('denomination.show', $denomination->id) }}" class="btn btn-success btn-xs"><i class="icon s7-search icon-sm"></i> 
                         </a> 

                         <a title="Edit denomination" href="{{ route('denomination.edit', $denomination->id) }}" class="btn btn-warning btn-xs"><i class="icon s7-pen"></i>
                         </a>

                         <a title="Deregister denomination" data-method="DELETE" href="{{ route('denomination.destroy', $denomination->id) }}" class="btn btn-danger btn-xs"><i class="icon s7-trash"></i>
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

      function filterGlobal () {
    $('#table5').DataTable().search(
        $('#global_filter').val(),
        $('#global_regex').prop('checked'),
        $('#global_smart').prop('checked')
    ).draw();
}
 
function filterColumn ( i ) {
    $('#table5').DataTable().column( i ).search(
        $('#col'+i+'_filter').val(),
        $('#col'+i+'_regex').prop('checked'),
        $('#col'+i+'_smart').prop('checked')
    ).draw();
}



    var table=$('#table5').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ],

                            'ordering': true,
                            'info' : true,

   
  
        
    });

        $('#table5').DataTable();
 
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
 
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    } );

  $('select.columns_filter').on( 'change', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    } );
 




    });

    
  </script>

@endsection
