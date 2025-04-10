<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run()
    {
        $sections = ['программирование', 'тестирование', 'безопасность'];
        foreach ($sections as $section) {
            Section::create(['title' => $section]);
        }
    }
}
