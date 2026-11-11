<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;

class BeritaController extends Controller
{
    /**
     * Menampilkan halaman lengkap detail berita & agenda mutu.
     */
    public function show(string $slug): View
    {
        $article = null;

        if (Schema::hasTable('news')) {
            $article = News::with('author')
                ->where('slug', $slug)
                ->where('is_published', true)
                ->first();
        }

        if (! $article) {
            $defaultMatch = collect(News::defaultArticles())->firstWhere('slug', $slug);
            if ($defaultMatch) {
                $article = (object) $defaultMatch;
            }
        }

        abort_if(! $article, 404);

        $relatedNews = Schema::hasTable('news')
            ? News::where('is_published', true)
                ->where('slug', '!=', $slug)
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->limit(4)
                ->get()
            : collect();

        if ($relatedNews->isEmpty()) {
            $relatedNews = collect(News::defaultArticles())
                ->where('slug', '!=', $slug)
                ->map(fn (array $item): object => (object) $item)
                ->values();
        }

        return view('berita.detail', [
            'article' => $article,
            'relatedNews' => $relatedNews,
        ]);
    }
}
