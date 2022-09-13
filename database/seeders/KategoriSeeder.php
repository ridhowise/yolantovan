<?php

namespace Database\Seeders;

use DB;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->delete();

        $kategori = 
        [
            [
                'id'    => 1, 
                'nama'  => 'Keamanan', 
                'slug'  => 'keamanan', 
                'icon'  => 'ri-police-car-fill', 
                'color' => '#ff0000'
            ],
            [
                'id'    => 2, 
                'nama'  => 'Kesehatan', 
                'slug'  => 'kesehatan', 
                'icon'  => 'ri-stethoscope-fill', 
                'color' => '#5578ff'
            ],
            [
                'id'    => 3, 
                'nama'  => 'Transport', 
                'slug'  => 'transport', 
                'icon'  => 'ri-route-fill', 
                'color' => '#e80368'
            ],
            [
                'id'    => 4, 
                'nama'  => 'Olahraga', 
                'slug'  => 'olahraga', 
                'icon'  => 'ri-basketball-line', 
                'color' => '#ff6200'
            ],
            [
                'id'    => 5, 
                'nama'  => 'Pemadam Kebakaran', 
                'slug'  => 'pemadam-kebakaran', 
                'icon'  => 'ri-bus-2-line', 
                'color' => '#47aeff'
            ],
            [
                'id'    => 6, 
                'nama'  => 'Lingkungan hidup', 
                'slug'  => 'lingkungan-hidup', 
                'icon'  => 'ri-earth-fill', 
                'color' => '#63ff8d'
            ],
        ];
      Kategori::insert($kategori);
    }

}