<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use Image;
  
class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('password.confirm')->only(['create']);
    //     // $this->middleware('password.confirm')->only(['show']);
    //     $this->middleware('password.confirm')->only(['edit']);

    // }

    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $Posts = Post::with("kategori")->get();
        // $Layanans = Layanan::get();
        // dd($Layanans);
        /// mengirimkan variabel $DetailsLayanans ke halaman views DetailsLayanans/index.blade.php
        /// include dengan number index
        return view('dashboard.posts.index', compact('Posts'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        /// menampilkan halaman create
        $Kategoris = Kategori::get();

        return view('dashboard.posts.create',compact('Kategoris'));
    }
  
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'details' => 'required',
            'image' => 'required',
        ]);
        $slug = Str::slug($request->title, '-');
        $request['slug'] = $slug;
        

        if ($request->file('image')) {
            $image = $request->file('image');

            $file_name = time(). rand(1111, 9999) . '.' .$image->getClientOriginalExtension();

            // $save_Path = 'images/'.$file_name;
            //$save_Path = public_path('images/'.$file_name);

            //Image::make($image->getRealPath())->resize(300, 236)->save($save_Path);
            $image->move('images',$file_name);
            Image::make('images/'.$file_name)->save('images/'.$file_name);
        } else {
            $file_name = null;
        }

     
        $data = new Post;
		$data->title = $request->title;
		$data->slug = $slug;
        $data->subtitle = $request->subtitle;
		$data->details = $request->details;
        $data->kategori_id = $request->kategori_id;
        $data->image = $file_name;

        $data->save();

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('akuntansi');
        return redirect()->action([PostController::class,'index'])
                        ->with('success','DetailsLayanan created successfully.');
    }
  
    // public function show(Post $post)
    // {
    //     /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
    //     /// berdasarkan id yang dipilih
    //     /// href="{{ route('DetailsLayanans.show',$post->id) }}
    //     // dd($detailsLayanan);
    //     return view('dashboard.DetailsLayanans.show',compact('post'));
    // }
  
    public function edit($id)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('DetailsLayanans.edit',$post->id) }}
        $Post = Post::findorfail($id);

        return view('dashboard.posts.edit',compact('Post'));
    }
  
    public function update(Request $request,$id)
    {
        
        $slug = Str::slug($request->title, '-');
        $request['slug'] = $slug;
        
        // $id = $request->input('id');
        $data = Post::findorfail($id);
        

        if ($request->file('image')){

            $image = $request->file("image");

            $file_name = time(). rand(1111, 9999) . '.' .$image->getClientOriginalExtension();

            $image->move('images',$file_name);
            Image::make('images/'.$file_name)->save('images/'.$file_name);

        }
        elseif($data->image != null){
            $file_name = $request->input('image');
        }
        else{
            $file_name = null;
        }

        $data->title = $request->title;
		$data->slug = $slug;
        $data->subtitle = $request->subtitle;
		$data->details = $request->details;
        $data->kategori_id = $request->kategori_id;
        $data->image = $file_name;
        $data->update();
        
        /// membuat validasi untuk title dan content wajib diisi
        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        // ]);
         
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        // $DetailsLayanan->update($request->all());
        
        /// setelah berhasil mengubah data
        return redirect()->action([PostController::class,'index'])->with('success','DetailsLayanan updated successfully');
    }

  
    public function destroy($id)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $data = Post::findorfail($id);
        $data->delete();
  
        return redirect()->action([PostController::class,'index'])
                        ->with('success','DetailsLayanan deleted successfully');
    }
}
