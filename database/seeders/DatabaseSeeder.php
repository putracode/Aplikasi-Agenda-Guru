<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Guru::factory(2)->create();

        Kelas::factory(3)->create();
        
        
        User::create([
            'name' => 'Ratih Halimah S.T.',
            'username' => 'ratih',
            'email' => 'ratih@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Fiki Maulana',
            'username' => 'fiki',
            'email' => 'fiki@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Sabrina',
            'username' => 'admin',
            'email' => 'sabrina75@gmail.com',
            'password' => bcrypt('password')
        ]);

        // bcrypt('password')
        // User::factory(3)->create();

        DB::table('agendas')->insert([[
            'nama_guru'=> 'raphael',
            'mata_pelajaran'=> 'sincos',
            'materi'=> 'mtk',
            'jam_pelajaran'=>'07:00-08:00',
            'absen'=>'yang tidak masuk',
            'kelas'=>'XI RPL 2',
            'pembelajaran'=>'Offline',
            'link'=>'inilink',
            'image'=>'inifoto',
            'keterangan'=>'ijin',
            'kelas_id' => '1'
        ],[
            'nama_guru'=> 'raphael',
            'mata_pelajaran'=> 'sincos',
            'materi'=> 'mtk',
            'jam_pelajaran'=>'07:00-08:00',
            'absen'=>'yang tidak masuk',
            'kelas'=>'XI RPL 2',
            'pembelajaran'=>'Offline',
            'link'=>'inilink',
            'image'=>'inifoto',
            'keterangan'=>'ijin',
            'kelas_id' => '2'
        ],[
            'nama_guru'=> 'raphael',
            'mata_pelajaran'=> 'sincos',
            'materi'=> 'mtk',
            'jam_pelajaran'=>'07:00-08:00',
            'absen'=>'yang tidak masuk',
            'kelas'=>'XI RPL 2',
            'pembelajaran'=>'Offline',
            'link'=>'inilink',
            'image'=>'inifoto',
            'keterangan'=>'ijin',
            'kelas_id' => '1'
        ]
            

        ]);
    }
}
