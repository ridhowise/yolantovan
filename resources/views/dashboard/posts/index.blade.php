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

        <div class="float-right"  style="margin-buttom:100px"  >
            <a class="btn btn-success" href="/dashboard/postingan/create">Tambah Postingan</a>
        </div>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align:center; width:10%" >Kategori</th>
                        <th style="text-align:center; width:10%" >Gambar</th>
                        <th style="text-align:center; width:30%" >judul</th>
                        <th style="text-align:center; width:30%" >deskripsi</th>
                        <th style="text-align:center; width:20%" >action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="text-align:center; width:10%" >Kategori</th>
                        <th style="text-align:center; width:5%" >Gambar</th>
                        <th style="text-align:center; width:35%" >Judul</th>
                        <th style="text-align:center; width:35%" >Deskripsi</th>
                        <th style="text-align:center; width:15%" >Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($Posts as $Post)
                    <tr>
                        <td style="text-align:center" >{{$Post->kategori->nama}}</td>
                        <td style="text-align:center" >{{$Post->image}}</td>
                        <td>{{$Post->title}}</td>
                        <td>{{$Post->subtitle}}</td>
                        <td class="text-center">
                            <form action="/dashboard/postingan/{{$Post->id}}" method="POST">
                                <a class="btn btn-info btn-sm" href="/kategori/{{$Post->kategori->slug}}/{{$Post->slug}}">Tampilan Web</a>
                                <a class="btn btn-primary btn-sm" href="/dashboard/postingan/{{$Post->id}}/edit">Ubah</a>         
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection
