<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
use App\Models\Mapel;
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
        // Guru::factory(2)->create();

        // Kelas::factory(3)->create();
        
        
        User::create([
            'name' => 'Samuel Jason',
            'role' => 'guru',
            'username' => 'samuel',
            'email' => 'samuel@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Reza Adriansyah',
            'role' => 'guru',
            'username' => 'reza',
            'email' => 'reza33@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Sabrina Putri',
            'role' => 'admin',
            'username' => 'Sabrina',
            'email' => 'sabrina75@gmail.com',
            'password' => bcrypt('password')
        ]);

        // Mapel::create([
            
        // ]);

        // bcrypt('password')
        // User::factory(3)->create();
        
        DB::table('mapel')->insert([[
            'nama_mapel' => 'Progdas'
        ],[
            'nama_mapel' => 'Basis Data'
        ],[
            'nama_mapel' => 'PBO'
        ]
        ]);

        // DB::table('agendas')->insert([[
        //     'nama_guru'=> 'raphael',
        //     'mata_pelajaran'=> 'sincos',
        //     'materi'=> 'mtk',
        //     'jam_pelajaran'=>'07:00-08:00',
        //     'absen'=>'yang tidak masuk',
        //     'kelas'=>'XI RPL 2',
        //     'pembelajaran'=>'Offline',
        //     'link'=>'inilink',
        //     'image'=>'inifoto',
        //     'keterangan'=>'ijin',
            
        // ],[
        //     'nama_guru'=> 'raphael',
        //     'mata_pelajaran'=> 'sincos',
        //     'materi'=> 'mtk',
        //     'jam_pelajaran'=>'07:00-08:00',
        //     'absen'=>'yang tidak masuk',
        //     'kelas'=>'XI RPL 2',
        //     'pembelajaran'=>'Offline',
        //     'link'=>'inilink',
        //     'image'=>'inifoto',
        //     'keterangan'=>'ijin',
            
        // ],[
        //     'nama_guru'=> 'raphael',
        //     'mata_pelajaran'=> 'sincos',
        //     'materi'=> 'mtk',
        //     'jam_pelajaran'=>'07:00-08:00',
        //     'absen'=>'yang tidak masuk',
        //     'kelas'=>'XI RPL 2',
        //     'pembelajaran'=>'Offline',
        //     'link'=>'inilink',
        //     'image'=>'inifoto',
        //     'keterangan'=>'ijin',
            
        // ]
            
        
        // ]);
    }
}
