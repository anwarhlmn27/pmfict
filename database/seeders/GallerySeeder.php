<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! Schema::hasTable('galleries')) {
            return;
        }

        foreach (Gallery::defaultItems() as $item) {
            Gallery::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
