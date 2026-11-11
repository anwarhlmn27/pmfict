<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! Schema::hasTable('news')) {
            return;
        }

        $adminId = Schema::hasTable('users') ? User::where('role', 'admin')->value('id') : null;

        foreach (News::defaultArticles() as $article) {
            News::updateOrCreate(
                ['slug' => $article['slug']],
                array_merge($article, ['user_id' => $adminId])
            );
        }
    }
}
