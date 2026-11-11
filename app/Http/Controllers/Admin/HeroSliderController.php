<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    /**
     * Menyimpan slide baru ke tabel hero_sliders.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'badge_text' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'image_path' => ['nullable', 'string', 'max:255', 'required_without:image_file'],
            'primary_btn_text' => ['nullable', 'string', 'max:100'],
            'primary_btn_url' => ['nullable', 'string', 'max:255'],
            'secondary_btn_text' => ['nullable', 'string', 'max:100'],
            'secondary_btn_url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $imagePath = $validated['image_path'] ?? 'img/foto/Meet1.jpeg';

        if ($request->hasFile('image_file')) {
            $imagePath = $this->storeSliderImage($request->file('image_file'));
        }

        HeroSlider::create([
            'badge_text' => $validated['badge_text'] ?? null,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'image_path' => $imagePath,
            'primary_btn_text' => $validated['primary_btn_text'] ?? null,
            'primary_btn_url' => $validated['primary_btn_url'] ?? null,
            'secondary_btn_text' => $validated['secondary_btn_text'] ?? null,
            'secondary_btn_url' => $validated['secondary_btn_url'] ?? null,
            'sort_order' => (int) ($validated['sort_order'] ?? (HeroSlider::max('sort_order') + 1)),
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Slide Hero berhasil ditambahkan.')
            ->with('active_tab', 'slider');
    }

    /**
     * Memperbarui data slide pada tabel hero_sliders.
     */
    public function update(Request $request, HeroSlider $heroSlider): RedirectResponse
    {
        $validated = $request->validate([
            'badge_text' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'primary_btn_text' => ['nullable', 'string', 'max:100'],
            'primary_btn_url' => ['nullable', 'string', 'max:255'],
            'secondary_btn_text' => ['nullable', 'string', 'max:100'],
            'secondary_btn_url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $imagePath = $validated['image_path'] ?: $heroSlider->image_path;

        if ($request->hasFile('image_file')) {
            $this->deleteStoredImage($heroSlider->image_path);
            $imagePath = $this->storeSliderImage($request->file('image_file'));
        }

        $heroSlider->update([
            'badge_text' => $validated['badge_text'] ?? null,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'image_path' => $imagePath,
            'primary_btn_text' => $validated['primary_btn_text'] ?? null,
            'primary_btn_url' => $validated['primary_btn_url'] ?? null,
            'secondary_btn_text' => $validated['secondary_btn_text'] ?? null,
            'secondary_btn_url' => $validated['secondary_btn_url'] ?? null,
            'sort_order' => (int) ($validated['sort_order'] ?? $heroSlider->sort_order),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Slide Hero berhasil diperbarui.')
            ->with('active_tab', 'slider');
    }

    /**
     * Menghapus slide dari tabel hero_sliders.
     */
    public function destroy(HeroSlider $heroSlider): RedirectResponse
    {
        $this->deleteStoredImage($heroSlider->image_path);

        $heroSlider->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Slide Hero berhasil dihapus.')
            ->with('active_tab', 'slider');
    }

    /**
     * Menyimpan file gambar ke storage disk public dan menyalin ke public/storage/sliders
     * agar tetap terbaca meskipun symlink storage belum dibuat di Windows.
     */
    private function storeSliderImage(UploadedFile $file): string
    {
        $storedPath = $file->store('sliders', 'public');
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
