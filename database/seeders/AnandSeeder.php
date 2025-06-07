<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AnandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name'=>'Anand',
            'username'=>'sd70nsd70n',
            'email'=>'anandgharu@gmail.com',
            'password'=>Hash::make('n2VO$MTcbr4#A')
        ]);
    }
}
