<?php

use App\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $X = Kelas::create([
            'nama' => 'X'
        ]);
        $xi = Kelas::create([
            'nama' => 'XI'
        ]);
        $xii = Kelas::create([
            'nama' => 'XII'
        ]);
    }
}
