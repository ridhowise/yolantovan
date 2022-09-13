<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Str;
 
use Illuminate\Http\Request;
use App\Models\Kategori;
  
class KategoriController extends Controller
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

        $Kategoris = Kategori::orderBy('id','desc')->get();
        // dd($Layanans);
        /// mengirimkan variabel $Layanans ke halaman views Layanans/index.blade.php
        /// include dengan number index
        return view('dashboard.kategoris.index', compact('Kategoris'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        /// menampilkan halaman create
        return view('dashboard.kategoris.create');
    }
  
    public function store(Request $request)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'nama' => 'required|unique:kategori,nama',
            'icon' => 'required|unique:kategori,icon',
        ]);
        
        $slug = Str::slug($request->nama, '-');
        $request['slug'] = $slug;
        // dd($request->all());
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        Kategori::create($request->all());
        
         
        /// redirect jika sukses menyimpan data
        return redirect()->action([KategoriController::class,'index'])
                        ->with('success','Kategori created successfully.');
    }
  
    // public function show(Kategori $kategori)
    // {
    //     /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
    //     /// berdasarkan id yang dipilih
    //     return view('dashboard.kategori.show',compact('kategori'));
    // }
  
    public function edit($id)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        $Kategori = Kategori::findorfail($id);

        return view('dashboard.Kategoris.edit',compact('Kategori'));
    }
  
    public function update(Request $request, $id)
    {
        $slug = Str::slug($request->nama, '-');
        $request['slug'] = $slug;
        
        // $id = $request->input('id');
        $data = Kategori::findorfail($id);
        
        /// membuat validasi untuk title dan content wajib diisi
        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        // ]);
         
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $data->nama = $request->nama;
		$data->slug = $slug;
        $data->icon = $request->icon;
		$data->color = $request->color;
        $data->update();
         
        /// setelah berhasil mengubah data
        return redirect()->action([KategoriController::class,'index'])->with('success','Layanan updated successfully');
    }
  
    public function destroy($id)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $data = Kategori::findorfail($id);
        $data->delete();
  
        return redirect()->action([KategoriController::class,'index'])
                        ->with('success','Layanan deleted successfully');
    }
}
