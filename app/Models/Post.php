<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable= ['kategori_id','image','title','subtitle','details','slug'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
