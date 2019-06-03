@extends('layout')
@section('title')
Bible Schools
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
    
    <div class="panel-heading" >
      <h5 class='pull-left'><a href="#search" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="search">Advanced Search<span class="caret"></span></a></h5>

      <div id="search" class="form-group form-inline well panel-collapse collapse" style="border-radius:10px">
        <form>
          <div class="row">
            
            
            <div class="form-group">
              
             <div  class="form-group"><label>Status:</label>
              <select id="country" class="search-input-select"  id="customSearchBox" style="border-radius:10px">
                <option>Please Select</option>
                <option value="Good">Good</option> 
                <option value="Bad">Bad</option>
                
              </select>
            </div> 

          </div>
          
        </div>
        

      </form>


    </div>
  </div>
  <br>
  

  <table class="table table-striped" id="tableB">
    <thead>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th>Mobile</th>
      <th>Enrollment</th>
      <th>Status</th>
      <th>Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bibles as $bible)
    <tr>
      <td>{{$bible->name}}</td>
      <td>{{$bible->address}}</td>
      <td>{{$bible->mobile}}</td>
      <td>{{$bible->enrollment}}</td>
      <td>{{$bible->status}}</td>
      <td>
       <a title="View More  Bible School Info" href="{{ route('bible.show', $bible->id) }}" class="btn btn-danger btn-xs"><i class="icon s7-search icon-sm"></i> 
        </a> 

       <a title="Edit Bible School" href="{{ route('bible.edit', $bible->id) }}" class="btn btn-danger btn-xs"><i class="icon s7-pen"></i>
       </a>


        <a title="Delete Bible" data-method="DELETE" href="{{ route('bible.destroy', $bible->id) }}" class="btn btn-danger btn-xs"><i class="icon s7-trash"></i>
                         </a
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

    $('#tableB').DataTable({
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

    $('#customSearchBox').on('change',function(){
      search($(this).val()).draw() ;
    })


  });
  
</script>

@endsection
