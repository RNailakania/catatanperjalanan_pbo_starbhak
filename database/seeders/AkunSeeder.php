<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
            'nik' => '808080',
            'namalengkap' => 'admin',
            'password' => bcrypt('admin123'),
            ]
            ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
