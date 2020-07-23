@extends('layouts.appnew')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Invoice</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/invoice">invoice</a></li>
            <li class="breadcrumb-item active">Tambah Invoice</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card card-primary card-outline">
      <div class="card-body">
        <form action="{{ url('invoice/add') }}" method="post" role="form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="status" value="0">
          <div class="form-group row">
            <label>Pilih Customer</label><br>
            <select class="form-control select2" name="customer_id">
              @foreach($customer as $to )
                <option value="{{ $to->id }}">{{ $to->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group row">
            <label for="issue_date">Issue Date</label><br>
            <input  class="form-control" type="date" name="issue_date">
          </div>

          <div class="form-group row">
            <label>Due Date</label><br>
            <input class="form-control" type="date" name="due_date">
          </div>

          <div class="form-group row">
            <label>Subject</label><br>
            <input class="form-control" type="text" name="subject">
          </div>


         {{--  <div class="form-group">
            <label>Pilih Layanan</label>
             <select class="form-control select2" name="layanan_id">
              @foreach($services as $layanan)
                <option value="{{ $layanan->id }}">{{ $layanan->description}}</option>
              @endforeach
            </select>

            <label>Jumlah Unit</label>
            <input type="number" name="unit">

          </div> --}}

          <table class="table table-bordered" id="invoicedetail">
                      <thead>
                        <tr>
                          <td>ID</td>
                          <td>Item Type</td>
                          <td>Description</td>
                          <td>Quantity</td>
                          <td>Unit Price</td>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($services as $layanan)
                          <tr>
                            <td>{{ $layanan->id }}</td>
                            <td>{{ $layanan->type->type }}</td>
                            <td>{{ $layanan->description }}</td>
                            <td>
                              <form method="POST" accept="{{ url('invoice/add') }}">
                              <input type="number" name="jumlah[]" value="" class="form-control">
                              <input type="hidden" name="id_barang" value="{{ $layanan->id }}" class="form-control">

                            </td>
                            <td>{{ $layanan->unit_price }}</td>
                          </tr>
                        @endforeach                       
                      </tbody>
                  </table>


          <div class="card-footer">
            <button class="btn btn-primary" type="submit"><i class="far fa-save"></i>
              <b>Simpan</b></button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>

  <script type="text/javascript">


  $(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });


    $(".btn-success").click(function(){
      var html = $(".clone").html();
      $(".increment").after(html);
    });

    $("body").on("click",".btn-danger",function(){
      $(this).parents(".control-group").remove();
    });

  });
  </script>

  @endsection
