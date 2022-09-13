@extends('layoutsDashboard.index')

@section('content')

<style>
    input[type="file"] {
        color: transparent;
    }
</style>

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
                                <h2>Ubah Post</h2>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-secondary" href="/dashboard/postingan">Kembali</a>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="/dashboard/postingan/{{$Post->id}}" method="POST" enctype="multipart/form-data" n>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            {{-- @if($Post->image == null)
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="file" value="{{$Post->image}}" name="image" placeholder="image" id="image">
                            {{-- @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                        </div>
                        @enderror --}}
                        {{-- </div>
                </div>
                @else --}}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="hidden" value="{{$Post->id}}" name="id">
                                <input type="hidden" value="{{$Post->image}}" name="image">
                                <input type="hidden" value="{{$Post->kategori_id}}" name="kategori_id">
                                <img src="{{url('images')}}/{{$Post->image}}" style="width:70px"><br>
                                <input style="padding:0px" type="file" value="{{$Post->image}}" name="image" placeholder="{{$Post->image}}" id="image">
                                {{-- <p>{{$Post->image}}"</p> --}}
                                {{-- @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                            </div>
                            @enderror --}}
                        </div>
            </div>
            {{-- @endif --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul :</strong>
                    <input type="text" name="title" value="{{ $Post->title }}" class="form-control" placeholder="Title">
                    @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi :</strong>
                    <input type="text" name="subtitle" value="{{ $Post->subtitle }}" class="form-control" placeholder="subtitle">
                    @error('subtitle')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.ckeditor').ckeditor();
                });
            </script>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail :</strong>
                    <br>
                    <textarea class="ckeditor" name="details" placeholder="details">{{ $Post->details }}</textarea>
                    @error('details')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">update</button>
            </div>
        </div>

        </form>
        </table>
    </div>
</div>
</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(function() {
        $('input[type="file"]').change(function() {
            if ($(this).val() != "") {
                $(this).css('color', '#333');
            } else {
                $(this).css('color', 'transparent');
            }
        });
    })
</script>

<!-- /.container-fluid -->





@endsection