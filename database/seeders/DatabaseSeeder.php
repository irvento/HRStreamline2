<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear the table before inserting
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate(); // Truncate users table
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'manager',
                'email' => 'manager@example.com',
                'password' => bcrypt('manager123'),
                'role' => 'manager',
            ],
        ]);
    }
    
}
