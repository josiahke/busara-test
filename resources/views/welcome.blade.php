<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="google-site-verification" content="LXhS-qEHTAhwAYQH6QOxYR0179baAyj4fI1RVAVDKiE" />
        {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">--}}
        {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            body {
                padding-top: 40px;
            }
        </style>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <!-- jQuery -->
        {{--<script src="//code.jquery.com/jquery.js"></script>--}}
        <!-- DataTables -->
        {{--<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>--}}
        <!-- Bootstrap JavaScript -->
        {{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
        <!-- App scripts -->

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.6/jqc-1.12.3/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>
        <link href="{{ asset('validation/validationEngine.jquery.css')}}" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/jqc-1.12.3/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
        <script src="{{asset('validation/jquery.validationEngine-en.js')}}" type="text/javascript"></script>
        <script src="{{asset('validation/jquery.validationEngine.js')}}" type="text/javascript"></script>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 200;
                font-family: 'Lato';
            }

            .container {
                /*text-align: center;*/
                /*display: table-cell;*/
                /*vertical-align: middle;*/
                margin: 0 auto;
                padding: 10px;
                margin: 10px;
                font-weight: bold;
            }

            .content {
                /*text-align: center;*/
                /*display: inline-block;*/
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">

                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">People List </a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> Add New Person </a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">

                            <table id="myTable1" style="margin-top: 10px;" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Phone</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile" style="padding: 20px; margin: 20px;">

                            {{--{!! Form::open(['url' => '/save/person']) !!}--}}
                            {!! Form::open(array('route' => array('save.person'),'method'=>'POST')) !!}
                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="">Name</label>
                                        {!! Form::text('name', null,
                                        ['class'=>'form-control validate[required]','placeholder'=>'' , 'required']) !!}
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                        </span> @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('age') ? ' has-error' : '' }}">
                                        <label class="">Age</label>
                                        {!! Form::text('age', null,
                                        ['class'=>'form-control validate[required,custom[integer]]','placeholder'=>'' , 'required']) !!}
                                        @if ($errors->has('age'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                        </span> @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label class="">Phone</label>
                                        {!! Form::text('phone', null,
                                        ['class'=>'form-control validate[required,custom[number]]','placeholder'=>'' , 'required']) !!}
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                        </span> @endif
                                    </div>
                                    {!! Form::submit('Save', ['class' => 'btn green', 'id' =>'regsubmit']) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </body>


    <script>
        $.fn.dataTableExt.sErrMode = 'throw';
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
                $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
            } );

        } );
        jQuery("form").validationEngine('attach', { prettySelect: true, usePrefix: 's2id_',useSuffix: "select2-offscreen", autoPositionUpdate: true });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        var table1 = $('#myTable1').DataTable({
            dom: 'Bfrtip',buttons: [
                'copy', 'excel', 'pdf'
            ],
            pageLength: 10,
            lengthMenu: [
                [5, 10, 25, 50, 100,18446744073709551615],
                [5, 10, 25, 50, 100,'All'] // change per page values here
            ],
            processing: true,
            serverSide: true,
            "order": [],"ordering": false,stateSave: true,
            fixedHeader: {
                header: true,
                headerOffset: $('.page-header.navbar-fixed-top').outerHeight(true)
            },"deferRender": true,
            ajax: {
                url: '{!! route('view.list') !!}',//datatables.gcomplains
                method: 'POST'
            },
            columns: [
                {data: 'id', name: 'id', orderable: true, searchable: true },
                {data: 'name', name: 'name', orderable: true, searchable: true },
                {data: 'age', name: 'age', orderable: true, searchable: true },
                {data: 'phone', name: 'phone', orderable: true, searchable: true},
                {data: 'created_at', name: 'created_at', orderable: true, searchable: true}
            ]
        });
    </script>

    @include('partials.messages')
</html>
