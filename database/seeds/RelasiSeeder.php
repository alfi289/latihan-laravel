<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menghapus semua sample data
        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();

        //membuat data dosen
        $dosen = Dosen::create([
            'nama' => 'Abdulloh',
            'nipd' => '89163476'
        ]);
        $this->command->info('Data Dosen Berhasil dibuat');

        //membuat data mahasiswa
        $mamat = Mahasiswa::create([
            'nama' => 'Mamat Kaplo',
            'nim' => '10101',
            'id_dosen' => $dosen->id
        ]);

        $dadang = Mahasiswa::create([
            'nama' => 'Dadang Peloy',
            'nim' => '10102',
            'id_dosen' => $dosen->id
        ]);

        $feri = Mahasiswa::create([
            'nama' => 'Feri Ambyar',
            'nim' => '10103',
            'id_dosen' => $dosen->id
        ]);
        $this->command->info('Data Mahasiswa Berhasil dibuat');

        //membuat data wali
        $ahmad = Wali::create([
            'nama' => 'Ahmad',
            'id_mahasiswa' => $mamat->id
        ]);

        $dudung = Wali::create([
            'nama' => 'Dudung',
            'id_mahasiswa' => $dadang->id
        ]);

        $basit = Wali::create([
            'nama' => 'Basit',
            'id_mahasiswa' => $feri->id
        ]);
        $this->command->info('Data Wali Berhasil dibuat');

        //membuat data hobi
        $mancing = Hobi::create([
            'hobi' => 'Mancing Keributan'
        ]);

        $gaming = Hobi::create([
            'hobi' => 'Game Mobile'
        ]);

        $mengaji = Hobi::create([
            'hobi' => 'Ngaji One Day One Ayah'
        ]);

        //menampilkan hobi ke mahasiswa
        $mamat->hobi()->attach($mancing->id);
        $mamat->hobi()->attach($mengaji->id);
        $dadang->hobi()->attach($gaming->id);
        $feri->hobi()->attach($mengaji->id);
        $this->command->info('Data Hobi Mahasiswa Berhasil dibuat');
    }
}
