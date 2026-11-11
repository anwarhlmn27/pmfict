<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Menyimpan foto kegiatan baru ke tabel galleries.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'badge' => ['required', 'string', 'max:50'],
            'image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'image_path' => ['nullable', 'string', 'max:255', 'required_without:image_file'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $imagePath = $validated['image_path'] ?? 'img/foto/Meet1.jpeg';

        if ($request->hasFile('image_file')) {
            $imagePath = $this->storeGalleryImage($request->file('image_file'));
        }

        Gallery::create([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'badge' => $validated['badge'],
            'image_path' => $imagePath,
            'sort_order' => (int) ($validated['sort_order'] ?? (Gallery::max('sort_order') + 1)),
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Foto galeri kegiatan berhasil ditambahkan.')
            ->with('active_tab', 'galeri');
    }

    /**
     * Memperbarui data foto kegiatan pada tabel galleries.
     */
    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'badge' => ['required', 'string', 'max:50'],
            'image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $imagePath = $validated['image_path'] ?: $gallery->image_path;

        if ($request->hasFile('image_file')) {
            $this->deleteStoredImage($gallery->image_path);
            $imagePath = $this->storeGalleryImage($request->file('image_file'));
        }

        $gallery->update([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'badge' => $validated['badge'],
            'image_path' => $imagePath,
            'sort_order' => (int) ($validated['sort_order'] ?? $gallery->sort_order),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Foto galeri kegiatan berhasil diperbarui.')
            ->with('active_tab', 'galeri');
    }

    /**
     * Menghapus foto kegiatan dari tabel galleries.
     */
    public function destroy(Gallery $gallery): RedirectResponse
    {
        $this->deleteStoredImage($gallery->image_path);

        $gallery->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Foto galeri kegiatan berhasil dihapus.')
            ->with('active_tab', 'galeri');
    }

    /**
     * Menyimpan file gambar ke storage disk public dan menyalin ke public/storage/galleries
     * agar tetap terbaca meskipun symlink storage belum dibuat di Windows.
     */
    private function storeGalleryImage(UploadedFile $file): string
    {
        $storedPath = $file->store('galleries', 'public');
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
