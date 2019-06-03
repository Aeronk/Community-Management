@extends('layout')
@section('title')
    Ministers
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

            <div class="col-md-12">
                @include('partials.flash')
            </div>
            <table id="tableM" class="table table-striped table-hover table-fw-widget" style="padding:3px">
                <thead>
                <tr class="default">
                    <th>Denomination</th>
                    <th>Province</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Operations</th>
                </tr>
                </thead>
                <tbody>

                @foreach($ministers as $minister)
                    <tr class="odd gradeX">
                        <td>{{$minister->denomination->name}}</td>
                        <td>{{$minister->province}}</td>
                        <td>{{$minister->first_name}} {{$minister->last_name}} </td>
                        <td>{{$minister->email}} </td>
                        <td>{{$minister->home_tel}} </td>


                        <td>
                            <a title="View More  minister Info"
                               href="{{ route('minister.show', $minister->id) }}" class="btn btn-danger btn-xs"><i
                                        class="icon s7-search icon-sm"></i>
                            </a>

                            <a title="Edit minister" href="{{ route('minister.edit', $minister->id) }}"
                               class="btn btn-danger btn-xs"><i class="icon s7-pen"></i>
                            </a>
                            <a title="Delete minister" data-method="DELETE"
                               href="{{ route('minister.destroy', $minister->id) }}" class="btn btn-danger btn-xs"><i
                                        class="icon s7-trash"></i>
                            </a>

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
        $(document).ready(function () {

            $('#tableM').DataTable({
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
                ]
            });


            $('#tableM thead th:gt4').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" style="width:90%;" placeholder="Search ' + title + '" />');
            });

            // DataTable
            var table = $('#tableM').DataTable();

            // Apply the search
            table.columns(':gt(4)').every(function () {
                var that = this;

                $('input', this.header()).on('keyup change', function () {
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