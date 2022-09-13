<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Str;
use App\Models\Kategori;
use App\Models\Post;



class HalamanUtamaController extends Controller
{
    public function dashboard()
    {
        $Kategoris = Kategori::with('post')->get();
     
        // dd($Layanans);

        return view("dashboard.index",compact('Kategoris'));
    }

    public function index()
    {
        // $Layanans = Layanan::get();
        // $Kategoris = Kategori::with('post')->paginate(6);
        // $Kategoriz = Kategori::get();
        // $slug = Str::slug($Layanans->nama, '-');
        // compact('Kategoris','Kategoriz')
        return view("home.index" );
    }

    


    public function index_kategori($slug_kategori)
    {
        /// mengambil data terakhir dan pagination 5 list
        $Postz = Kategori::with('post')->where('slug',$slug_kategori)->first();
        $Posts = Post::with('Kategori')->where('kategori_id',$Postz->id)->paginate(6);
        $Kategoriz = Kategori::get();
    
        // dd($Details);
        /// mengirimkan variabel $Kesehatans ke halaman views Kesehatans/index.blade.php
        /// include dengan number index
        return view('kategori.index', compact('Posts','Postz','Kategoriz'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function index_postingan($slug_kategori, $slug_detail)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('Kesehatans.show',$post->id) }}
        $Post = Post::with('kategori')->where('slug',$slug_detail)->first();
        // dd($Details);
        $Kategoriz = Kategori::get();
        // dd($Details);
        return view('kategori.show',compact('Post','Kategoriz'));
    }
}
