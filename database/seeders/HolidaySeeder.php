<?php

use App\Models\Holiday;
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{
    public function run(): void
    {
        Holiday::truncate();

        $rows = [
            [
                'title_bn'   => 'আন্তর্জাতিক মাতৃভাষা দিবস',
                'title_en'   => 'International Mother Language Day',
                'start_date' => '2025-02-21',
                'end_date'   => null,
                'type'       => 'public',
                'notes'      => 'জাতীয় দিবস',
            ],
            [
                'title_bn'   => 'স্বাধীনতা ও জাতীয় দিবস',
                'title_en'   => 'Independence Day',
                'start_date' => '2025-03-26',
                'end_date'   => null,
                'type'       => 'public',
                'notes'      => null,
            ],
            [
                'title_bn'   => 'শ্রমিক দিবস',
                'title_en'   => 'May Day',
                'start_date' => '2025-05-01',
                'end_date'   => null,
                'type'       => 'public',
                'notes'      => null,
            ],
            [
                'title_bn'   => 'গ্রীষ্মকালীন ছুটি',
                'title_en'   => 'Summer Vacation',
                'start_date' => '2025-06-01',
                'end_date'   => '2025-06-07',
                'type'       => 'academic',
                'notes'      => 'স্কুল বন্ধ থাকবে',
            ],
            [
                'title_bn'   => 'বিজয় দিবস',
                'title_en'   => 'Victory Day',
                'start_date' => '2025-12-16',
                'end_date'   => null,
                'type'       => 'public',
                'notes'      => null,
            ],
        ];

        foreach ($rows as $r) {
            Holiday::create($r);
        }
    }
}

