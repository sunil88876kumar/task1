<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Phase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $phases = Phase::factory()->createMany(
            collect([
                'Nurseries',
                'Primary',
                'Secondary',
                'Further Education',
                'International',
                'Independent Schools',
                'Special Schools',
            ])->map(fn ($phase) => ['name' => $phase, 'slug' => Str::slug($phase)])
        );

        $course = Course::factory()->count(200)->create();

        $course->each(function ($course) use ($phases) {
            $course->phases()->attach(
                $phases->random(rand(1, 4))->pluck('id')->toArray()
            );
        });
    }
}
