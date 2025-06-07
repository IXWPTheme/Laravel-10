<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name'=>'Dinesh',
            'username'=>'dinesh',
            'email'=>'dinesh.pathmanathan@efsme.com',
            'password'=>Hash::make('!2026@#')
        ]);
    }
}
