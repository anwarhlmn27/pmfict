<?php

namespace Database\Seeders;

use App\Models\HeroSlider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class HeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! Schema::hasTable('hero_sliders')) {
            return;
        }

        foreach (HeroSlider::defaultSlides() as $slide) {
            HeroSlider::updateOrCreate(
                ['title' => $slide['title']],
                $slide
            );
        }
    }
}
