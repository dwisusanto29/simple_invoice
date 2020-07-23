@extends('layouts.appnew')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="card-title">Invoice

                            <a href="{{url ('invoice/add')}}" class="btn btn-primary btn-sm" role="button"><i
                                    class="fas fa-plus-circle"></i> <b>Tambah</b></a></h2>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Invoice</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body table-responsive xl">
                        <div class="table-responsive">
                            <table id="tbTenagaAsing" class="table table-striped table-bordered table-sm"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-center">Invoice ID</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">Issue Date</th>
                                    <th class="text-center">Due Date</th>
                                    <th class="text-center">Total Invoice</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--confirmation modal-->
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        Apakah Anda Yakin untuk menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <script>
        var table = $('#tbTenagaAsing').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ url('invoice/list') }}",
                "type": "GET"
            },
            "columns": [
                {
                    "data": "id",
                    "searchable": false,
                    "visible": false
                },
                {
                    "data": "subject",
                    "searchable": false
                },
                {
                    "data": "issue_date",
                    "searchable": true,
                },
                {
                    "data": "due_date",
                    "searchable": true
                },
                {
                    "data": "payments", 
                },

                {
                    "data": "action",
                    "searchable": true
                }
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        var user_id;

        $(document).on('click', '.edit', function () {
            var user_id = $(this).attr('id');
            var url = '{{ url('invoice/edit/') }}' + '/' + user_id + '';
            location.href = url;
        });

        $(document).on('click', '.delete', function () {
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function () {
            $.ajax({
                url: "{{ url('invoice/destroy/') }}"  + '/' + user_id,
                beforeSend: function () {
                    $('#ok_button').text('Deleting...');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#confirmModal').modal('hide');
                        $('#tbTenagaAsing').DataTable().ajax.reload();
                        alert('Data Deleted');
                    }, 2000);
                    table.draw();


                }
            })
        });
    </script>
@endsection
