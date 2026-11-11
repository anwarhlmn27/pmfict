<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Menyimpan berita & agenda baru ke tabel news.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_badge' => ['required', 'string', 'max:50'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'thumbnail_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'thumbnail' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $thumbnailPath = $validated['thumbnail'] ?? 'img/foto/Meet1.jpeg';

        if ($request->hasFile('thumbnail_file')) {
            $thumbnailPath = $this->storeThumbnailImage($request->file('thumbnail_file'));
        }

        $content = $validated['content'];
        $excerpt = $validated['excerpt'] ?: Str::limit(strip_tags($content), 160);

        News::create([
            'user_id' => $request->user()?->id,
            'title' => $validated['title'],
            'slug' => News::uniqueSlug($validated['title']),
            'category_badge' => $validated['category_badge'],
            'excerpt' => $excerpt,
            'content' => $content,
            'thumbnail' => $thumbnailPath,
            'published_at' => $validated['published_at'] ?? now(),
            'is_published' => $request->boolean('is_published', true),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Berita & agenda berhasil ditambahkan.')
            ->with('active_tab', 'berita');
    }

    /**
     * Memperbarui data berita & agenda pada tabel news.
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_badge' => ['required', 'string', 'max:50'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'thumbnail_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'thumbnail' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $thumbnailPath = $validated['thumbnail'] ?: $news->thumbnail;

        if ($request->hasFile('thumbnail_file')) {
            $this->deleteStoredImage($news->thumbnail);
            $thumbnailPath = $this->storeThumbnailImage($request->file('thumbnail_file'));
        }

        $content = $validated['content'];
        $excerpt = $validated['excerpt'] ?: Str::limit(strip_tags($content), 160);

        $slug = $news->title !== $validated['title']
            ? News::uniqueSlug($validated['title'], $news->id)
            : $news->slug;

        $news->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_badge' => $validated['category_badge'],
            'excerpt' => $excerpt,
            'content' => $content,
            'thumbnail' => $thumbnailPath,
            'published_at' => $validated['published_at'] ?? $news->published_at ?? now(),
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Berita & agenda berhasil diperbarui.')
            ->with('active_tab', 'berita');
    }

    /**
     * Menghapus berita & agenda dari tabel news.
     */
    public function destroy(News $news): RedirectResponse
    {
        $this->deleteStoredImage($news->thumbnail);

        $news->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Berita & agenda berhasil dihapus.')
            ->with('active_tab', 'berita');
    }

    /**
     * Menyimpan file gambar thumbnail ke storage disk public dan menyalin ke public/storage/news
     * agar tetap terbaca meskipun symlink storage belum dibuat di Windows.
     */
    private function storeThumbnailImage(UploadedFile $file): string
    {
        $storedPath = $file->store('news', 'public');
        $publicRelativePath = 'storage/'.$storedPath;

        $sourceFullPath = Storage::disk('public')->path($storedPath);
        $targetFullPath = public_path($publicRelativePath);

        if (is_file($sourceFullPath) && ! is_link(public_path('storage'))) {
            File::ensureDirectoryExists(dirname($targetFullPath));
            File::copy($sourceFullPath, $targetFullPath);
        }

        return $publicRelativePath;
    }

    /**
     * Menghapus file gambar lama dari storage dan folder public/storage.
     */
    private function deleteStoredImage(?string $imagePath): void
    {
        if (! $imagePath || ! str_starts_with($imagePath, 'storage/')) {
            return;
        }

        $relativeDiskPath = substr($imagePath, strlen('storage/'));
        Storage::disk('public')->delete($relativeDiskPath);

        $publicFile = public_path($imagePath);
        if (is_file($publicFile) && ! is_link(public_path('storage'))) {
            File::delete($publicFile);
        }
    }
}
