<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::whereRole('siswa')->delete();
        // DB::table('users')->where('role', 'admin')->where('name', '!=', 'Admin')->delete();
        // \App\Models\User::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Student::factory(30)->create();

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'gender' => 'L',
            'role' => 'admin'
        ]);

        \App\Models\User::create([
            'nik' => '3671050403060001',
            'name' => 'Guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('123'),
            'gender' => 'P',
            'role' => 'guru'
        ]);

        \App\Models\User::create([
            'nik' => '3671050403060002',
            'name' => 'Guru2',
            'email' => 'guru2@gmail.com',
            'password' => bcrypt('123'),
            'gender' => 'P',
            'role' => 'guru'
        ]);

        \App\Models\User::create([
            'nis' => '12345678',
            'name' => 'Siswa',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('123'),
            'gender' => 'L',
            'role' => 'siswa'
        ]);

        \App\Models\Setting::create([
            'school_name' => 'SMKN 5 Kab. Tangerang',
            'headmaster' => 'Surta Wijaya, S.Kom. M.M',
            'email' => 'contact@smkn5kabtangerang.sch.id',
            'phone' => '(021) 59330830',
            'address' => 'Jln. IR. Sutami KM.1,2 Desa. Mauk Barat, Kec. Mauk Tangerang Banten',
        ]);
    }
}
