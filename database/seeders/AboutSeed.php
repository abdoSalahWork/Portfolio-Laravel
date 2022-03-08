<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'name' => 'Abdo Salah',
            'title' => 'Full Stack Develapor',
            'from' => 'Egypt',
            'live_in' => 'Cairo',
            'age' => '25',
            'gender' => 'Male',
            'image' => 'images/About/1633103713.jpg',
            'description' =>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form but the majority have suffered alteration in some',
            'cv' => 'Gehad Eid(Frontend2)-2.pdf'
        ]);
    }
}
