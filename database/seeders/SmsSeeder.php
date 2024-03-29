<?php

namespace Database\Seeders;

use App\Models\Sms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sms::updateOrCreate([
           'id'=> 1
        ],
        [
            'subject' => "Test Subject2",
            'body' => 'Some body',
        ]);
    }
}
