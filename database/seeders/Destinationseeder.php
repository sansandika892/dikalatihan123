<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\destination as ModelsDestination;

class Destinationseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Destination::create([
        'name'=>"asia farm",
        'description'=>"Asia Farm Pekanbaru bisa menjadi pilihan destinasi wisata untuk kamu yang suka dengan suasana estetis serta unik",
        'location'=>"Jl. Badak Ujung, Bencah Lesung, Kec. Tenayan Raya, Kota Pekanbaru, Riau",
        'working_days'=>"senin-jum'at",
        'working_hours'=>"09.00–18.00",
        'ticket_price'=>"50000",
        ]);


        Destination::create([
        'name'=>"asia heritage",
        'description'=>"Bangunan replika dari China, Jepang, dan Korea di desa warisan dengan seluncuran anak dan tempat berfoto.",
        'location'=>"Jl. Yos Sudarso No.12, Muara Fajar, Kec. Rumbai, Kota Pekanbaru, Riau 28265",
        'working_days'=>"senin-jum'at",
        'working_hours'=>"09.00–18.00",
        'ticket_price'=>"30000",
    ]);

        Destination::create([
        'name'=>"candi prambanan",
        'description'=>"Kompleks candi Hindu terbesar di Indonesia dengan relief epik Ramayana.",
        'location'=>"jawa timur",
        'working_days'=>"all day",
        'working_hours'=>"09.00–18.00",
        'ticket_price'=>"80000",
    ]);


        Destination::create([
        'name'=>"Lombok",
        'description'=>"Pulau dengan pantai indah dan Gunung Rinjani yang menantang..",
        'location'=>"Nusa Tenggara Barat",
        'working_days'=>"all day",
        'working_hours'=>"09.00–18.00",
        'ticket_price'=>"80000",
    ]);


        Destination::create([
        'name'=>"Pulo Cinta, Gorontalo",
        'description'=>"Pulau eksotis nan romantis ini masuk ke dalam daerah coral triangle. Maka dari itu, laut di sekitar pulau ini memiliki ekosistem terumbu karang yang luas. Ada berbagai kegiatan menarik yang bisa kamu lakukan jika berniat mengunjungi Pulo Cinta. Di antaranya menyusuri pulau dan treking, stargazing night, dan tentu saja snorkeling juga diving.",
        'location'=>"Teluk Tomini, Desa Patoameme, Kecamatan Botumoito, Kabupaten Boalemo, Provinsi Gorontalo.",
        'working_days'=>"all day",
        'working_hours'=>"09.00–18.00",
        'ticket_price'=>"80000",
    ]);
    for ($i= 1; $i<=500;$i++){
        Destination::create([
            'name'=>fake(locale:"id_ID")->name(),
             'description'=>fake(locale:"id_ID")->sentence(),
             'location'=>fake(locale:"id_ID")->address(),
             'working_days'=>"everyday",
             'working_hours'=>"8am -5pm",
             'ticket_price'=> rand(1000, 5000),
        ]);
    }
    }
}
