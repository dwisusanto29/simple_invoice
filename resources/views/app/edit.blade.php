@extends('layouts.appnew')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="/artikel">Artikel</a></li>
                        <li class="breadcrumb-item active">Edit Artikel</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <form action="{{ url('artikel/update') }}" method="post" role="form" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $data -> id }}">
                    <input type="hidden" name="status" value="{{ $data -> status }}">
                    <div class="form-group">
                        <label for="judul">Judul Artikel</label>
                        <input class="form-control" name="judul" value="{{ $data -> judul}}">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control col-sm-2" name="kategori">
                            @foreach($category as $kat )
                            <option value="{{ $kat->id }}"
                                @if($data->id == $kat->id) selected @endif>{{ $kat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <textarea name="artikel" id="compose-textarea" class="form-control" style="height: 300px">
                              {{ $data -> content }}
                          </textarea>
                      </div>

                      <div class="form-group">
                        <label for="file">Unggah Foto</label>
                        <br>
                        @foreach($foto as $gambar)
                            <img src="{{ url($gambar->lokasi_file) }}" height="150px"><br>    
                        @endforeach

                        <div class="input-group control-group increment" >
                          <input type="file" name="foto[]" class="form-control">
                          <div class="input-group-btn">
                            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                          </div>
                        </div>
                        <div class="clone hide">
                          <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="foto[]" class="form-control">
                            <div class="input-group-btn">
                              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                          </div>
                        </div>
                    </div>

{{-- 
                      <div class="form-group">
                        <label for="file">Unggah Foto</label>
                        @if($data->foto !== null)
                        <br><a href="/images/{{ $data->foto }}" target="_blank"
                         data-toggle="tooltip" class=" btn btn-info btn-sm"><i
                         class="far fa-edit"></i>Foto di Unggah</a>
                         @endif
                         <div class="input-group">
                            <div class="custom-file">
                                <input name="foto" type="file" class="custom-file-input" id="foto">
                                <label class="custom-file-label" for="file"
                                value="{{ $data->foto }}">{{ $data -> foto }}</label>
                            </div>
                        </div>
                    </div>
                     --}}
                    <div class="form-group">
                        <div class="form-group">
                            <label for="video">Masukkan URL Video</label>
                            <input class="form-control" name="video" placeholder="URL Video"
                            value="{{ $data -> video }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file">Unggah Dokumen</label>

                        @foreach($dok as $dokumen)
                        <br><a href="{{ url($dokumen->lokasi_file) }}" target="_blank"
                         data-toggle="tooltip" class=" btn btn-info btn-sm"><i
                         class="far fa-edit"></i>Dokumen di Unggah</a>
                         @endforeach
                        
                         <div class="input-group">
                            <div class="custom-file">
                                <input name="dokumen" type="file" class="custom-file-input" id="dokumen" value="{{ $data->lampiran }}">
                                <label class="custom-file-label" for="file">Pilih Dokumen</label>
                            </div>
                        </div>
                    </div>

                    @if(Auth::user()->level == 3)
                    <div class="form-group">
                        <label>Publish</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="status" id="status_0" type="radio" class="custom-control-input"
                            value="1">
                            <label for="status_0" class="custom-control-label">Ya</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="status" id="status_1" type="radio" class="custom-control-input"
                            value="2">
                            <label for="status_1" class="custom-control-label">Tidak</label>
                        </div>
                    </div>
                    @endif

                    @if($data->status == 1)
                    <div class="form-group">
                        <label>Published at</label>
                        <br> {{ $data->published_at }}
                    </div>
                    @endif

                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit"><i class="far fa-save"></i>
                            <b>Simpan</b></button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

    @endsection
