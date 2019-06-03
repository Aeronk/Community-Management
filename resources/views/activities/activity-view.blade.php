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

            <div class="container">
                <div class="row">


                    <br>

                    <table id="tableA" class="table table-striped table-hover table-fw-widget">
                        <thead>

                        <tr class="default">

                            <th><strong>Date</strong></th>
                            <th><strong>Activity Type</strong></th>
                            <th><strong>Organiser</strong></th>
                            <th><strong>Men</strong></th>
                            <th><strong>Women</strong></th>
                            <th><strong>Total Members</strong></th>
                            <th>Operations</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activities as $activity)
                            <tr>
                                <td>{{$activity->date}}</td>
                                <td>{{$activity->type}}</td>
                                <td>{{$activity->organiser}}</td>
                                <td>{{$activity->men}}</td>
                                <td>{{$activity->women}}</td>
                                <td>{{$activity->total_members}}</td>

                                <td>
                                    <a class="btn btn-danger btn-xs"><i class="icon s7-search icon-sm"></i>
                                    </a>
                                    <a class="btn btn-danger btn-xs"><i class="icon s7-pen"></i></a>

                                    <a class="btn btn-danger btn-xs"><i class="icon s7-trash"></i></a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <label style='font-family:serif;font-size:13px'>Select All</label><input type="checkbox" class=""
                                                                                             id="bulkDelete"/> <br>
                    <button id="deleteTriger" class="default">Delete Selected Records</button>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent

@endsection
@section('page-scripts')
<script>

</script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#tableA').dataTable({
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

                //             "columnDefs": [

                //             {
                //             "targets": [ 1 ],
                //             "visible": false,
                //             "searchable": false
                //         },
                // ],


            })


        });

    </script>
    @include('partials.flash-swal')
@endsection
 