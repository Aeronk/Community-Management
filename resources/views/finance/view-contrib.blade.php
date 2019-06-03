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
            <div class="row">

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


                    </tbody>
                </table>

            </div>


            <table id="tableC" class="table table-striped table-hover table-fw-widget" style="padding:3px">
                <thead>

                <tr class="default">

                    <th><strong>Denomination</strong></th>
                    <th><strong>Amount Paid</strong></th>
                    <th><strong>Balance</strong></th>
                    <th><strong>Date Received</strong></th>
                    <th><strong>Captured By</strong></th>
                    {{-- <th><strong>Status</strong></th> --}}

                    {{-- <th><strong>Comment</strong></th> --}}
                    <th><strong>Operations</strong></th>

                </tr>
                </thead>
                <tbody>
                @foreach($indcontributions as $contribution)
                    <tr>
                        <td>{{$contribution->denomination->name??''}}</td>
                        <td>{{$contribution->amount}}</td>
                        <td>{{$contribution->denomination->sub_balance??''}}</td>
                        <td>{{$contribution->date_recieved}}</td>
                        <td>{{$contribution->captured_by}}</td>
                        {{-- <td>{{$contribution->status}}</td> --}}

                        {{-- <td>{{$contribution->comment}}</td> --}}
                        <td>
                            <a title="View More  Contribution Info"
                               href="{{ route('individualcontribution.show', $contribution->id) }}"
                               class="btn btn-danger btn-xs"><i class="icon s7-search icon-sm"></i>
                            </a>

                            <a title="Edit minister"
                               href="{{ route('individualcontribution.edit', $contribution->id) }}"
                               class="btn btn-danger btn-xs"><i class="icon s7-pen"></i>
                            </a>
                            {{--  <a title="Delete minister" data-method="DELETE" href="{{ route('minister.destroy', $minister->id) }}" class="btn btn-danger btn-xs"><i class="icon s7-trash"></i>
                             </a> --}}


                        </td>

                    </tr>

                @endforeach

                </tbody>

                <tfoot>
                <tr>
                    <th colspan="3" style="text-align:right">Total:</th>
                    <th></th>
                </tr>
                </tfoot>
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


            function filterGlobal() {
                $('#tableC').DataTable().search(
                    $('#global_filter').val(),
                    $('#global_regex').prop('checked'),
                    $('#global_smart').prop('checked')
                ).draw();
            }

            function filterColumn(i) {
                $('#tableC').DataTable().column(i).search(
                    $('#col' + i + '_filter').val(),
                    $('#col' + i + '_regex').prop('checked'),
                    $('#col' + i + '_smart').prop('checked')
                ).draw();
            }

            $('#tableC').DataTable({
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

            $('#tableC').DataTable();

            $('input.global_filter').on('keyup click', function () {
                filterGlobal();
            });

            $('input.column_filter').on('keyup click', function () {
                filterColumn($(this).parents('tr').attr('data-column'));
            });

            $('select.columns_filter').on('change', function () {
                filterColumn($(this).parents('tr').attr('data-column'));
            });


        });

    </script>


@endsection