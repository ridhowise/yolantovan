@extends('layoutsDashboard.index')
 
@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Postingan</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

        
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               
            <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Buat Post</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="/dashboard/postingan"> Kembali</a>
                </div>
            </div>
        </div>
        
        <!-- @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        
        <form action="/dashboard/postingan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div style="width:20%;" class="form-group">
                        <strong>Kategori :</strong>
                        <select name="kategori_id" id="kategori_id" class="form-control select" required>
                        <option value="" style="text-align:center;" >-- PILIH Kategori --</option>
                        @foreach ($Kategoris as $kategori)
                        <option value="{{$kategori->id}}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama}}</option>
                        @endforeach
                        @error('kategori_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Judul :</strong>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control"  placeholder="Judul"  >
                            @error('title')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi :</strong>
                            <input type="text" name="subtitle" value="{{ old('subtitle') }}" class="form-control" placeholder="Deskripsi" >
                            @error('subtitle')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar :</strong>
                        <input type="file" name="image" class="form-control" placeholder="PIlih Gambar" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>
                </div>
                <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('.ckeditor').ckeditor();
                    });
                </script>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail :</strong>
                        <br>
                        <textarea class="ckeditor" name="details" placeholder="details" >{{ old('details') }}</textarea>
                        @error('details')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        
        </form>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->


        


@endsection