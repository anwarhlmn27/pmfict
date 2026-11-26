<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Memperbarui pengaturan web termasuk upload gambar flowmap Siklus PPEPP.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'site_email' => ['nullable', 'email', 'max:150'],
            'site_phone' => ['nullable', 'string', 'max:50'],
            'site_address' => ['nullable', 'string', 'max:255'],
            'site_maps_url' => ['nullable', 'string', 'max:255'],
            'site_visi' => ['nullable', 'string', 'max:2000'],
            'ppepp_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'remove_ppepp_image' => ['nullable', 'boolean'],
        ]);

        foreach (['site_email', 'site_phone', 'site_address', 'site_maps_url', 'site_visi'] as $field) {
            if (array_key_exists($field, $validated) && $validated[$field] !== null) {
                SiteSetting::setValue($field, $validated[$field]);
            }
        }

        $currentPpeppPath = SiteSetting::getValue('ppepp_image_path');

        if ($request->boolean('remove_ppepp_image')) {
            $this->deleteStoredImageIfExists($currentPpeppPath);
            SiteSetting::setValue('ppepp_image_path', null);
        } elseif ($request->hasFile('ppepp_image')) {
            $this->deleteStoredImageIfExists($currentPpeppPath);

            $storedPath = $request->file('ppepp_image')->store('ppepp', 'public');
            $this->syncPublicStorageFile($storedPath);

            SiteSetting::setValue('ppepp_image_path', 'storage/'.$storedPath);
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Pengaturan web & gambar Siklus PPEPP berhasil disimpan.')
            ->with('active_tab', 'settings');
    }

    /**
     * Menyalin file hasil upload ke public/storage jika symlink tidak aktif di Windows.
     */
    private function syncPublicStorageFile(string $relativePath): void
    {
        $source = Storage::disk('public')->path($relativePath);
        $destination = public_path('storage/'.$relativePath);

        if (is_link(public_path('storage')) || ! is_file($source)) {
            return;
        }

        $directory = dirname($destination);
        if (! is_dir($directory)) {
            @mkdir($directory, 0755, true);
        }

        @copy($source, $destination);
    }

    /**
     * Menghapus gambar PPEPP lama jika tersimpan di storage/ppepp.
     */
    private function deleteStoredImageIfExists(?string $imagePath): void
    {
        if (! $imagePath || ! str_starts_with($imagePath, 'storage/ppepp/')) {
            return;
        }

        $relativePath = substr($imagePath, strlen('storage/'));
        Storage::disk('public')->delete($relativePath);

        $publicCopy = public_path($imagePath);
        if (! is_link(public_path('storage')) && is_file($publicCopy)) {
            @unlink($publicCopy);
        }
    }
}
