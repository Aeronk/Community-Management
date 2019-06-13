@extends('layout')
@section('title')
    Contributions
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
           {{-- <div class="row">
                <div class="col-md-3">
                    Contribution Type
                    <select id="type">
                        <option></option>
                        @foreach($types as $t)
                            <option>{{$t->name}}</option>

                        @endforeach
                    </select>

                </div>

                <div class="col-md-3">
                    Amount
                    <input type="text" name="amount" id="amount">

                </div>

            </div>

--}}
            <h2>Contributions Table</h2>
            <table class="table table-striped" id="tableCo">
                <thead>
                <tr>
                    <th>Contribution Type</th>
                    <th>Minister</th>
                    <th>Amount</th>
                    <th>Recieved From</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contris as $contri)
                    <tr>
                        <td>{{$contri->type}}</td>
                        <td>{{$contri->minister_id}}</td>
                        <td>{{$contri->amount}}</td>
                        <td>{{$contri->recieved_from}}</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-xs"><i class="icon s7-search icon-sm"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="icon s7-pen"></i></a>

                            <a href="#" class="btn btn-danger btn-xs"><i class="icon s7-trash"></i></a>
                        </td>

                        {{--   <a href="{{ route('contribution.show', $contri->id) }}" class="btn btn-danger btn-xs"><i class="icon s7-search icon-sm"></i>
                          </a>
                          <a href="{{ route('contribution.edit', $contri->id) }}" class="btn btn-danger btn-xs"><i class="icon s7-pen"></i></a>

                          <a href="{{ route('contribution.destroy' , $contri->id)}}" class="btn btn-danger btn-xs"><i class="icon s7-trash"></i></a>
                          </td> --}}
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
        $(document).ready(function () {

            $('#tableCo').DataTable({
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


            // DataTable
            var table = $('#tableCo').DataTable();

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('#type').on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });


            table.columns().every(function () {
                var that = this;

                $('#amount').on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });


        });

    </script>


@endsection
@section('page-scripts')

    @include('partials.flash-swal')
@endsection