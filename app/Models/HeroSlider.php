<?php

namespace App\Models;

use Database\Factories\HeroSliderFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'badge_text',
    'title',
    'description',
    'image_path',
    'primary_btn_text',
    'primary_btn_url',
    'secondary_btn_text',
    'secondary_btn_url',
    'sort_order',
    'is_active',
])]
class HeroSlider extends Model
{
    /** @use HasFactory<HeroSliderFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Menghasilkan URL gambar latar yang siap ditampilkan di browser.
     */
    public function imageUrl(): string
    {
        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }

        if (str_starts_with($this->image_path, 'storage/')) {
            $publicTarget = public_path($this->image_path);
            $relativeDiskPath = substr($this->image_path, strlen('storage/'));
            $storageSource = Storage::disk('public')->path($relativeDiskPath);

            if (! is_file($publicTarget) && is_file($storageSource)) {
                File::ensureDirectoryExists(dirname($publicTarget));
                File::copy($storageSource, $publicTarget);
            }
        }

        return asset($this->image_path);
    }

    /**
     * Data default hero slider PM FICT.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function defaultSlides(): array
    {
        return [
            [
                'badge_text' => 'SISTEM PENJAMINAN MUTU INTERNAL (SPMI)',
                'title' => 'Membangun Budaya Mutu Unggul Fakultas Informatika & Komputer',
                'description' => 'Mengawal mutu Tridharma Perguruan Tinggi, akreditasi nasional (BAN-PT & LAMINFOKOM), dan tata kelola akademik berstandar prima melalui siklus berkelanjutan PPEPP.',
                'image_path' => 'img/foto/Meet1.jpeg',
                'primary_btn_text' => 'Siklus PPEPP',
                'primary_btn_url' => '#ppepp',
                'secondary_btn_text' => 'Unduh Dokumen Mutu',
                'secondary_btn_url' => '#dokumen-standar-mutu',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'badge_text' => 'GUGUS KENDALI MUTU (GKM) FICT',
                'title' => 'Review Kurikulum & Ketercapaian Capaian Pembelajaran Lulusan',
                'description' => 'Penyelarasan kurikulum berbasis Outcome-Based Education (OBE) pada Program Studi Informatika dan Sistem Informasi.',
                'image_path' => 'img/foto/Meet2.jpeg',
                'primary_btn_text' => 'Akreditasi SPME',
                'primary_btn_url' => '#spme',
                'secondary_btn_text' => 'Galeri Rapat Mutu',
                'secondary_btn_url' => '#galeri-kegiatan',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'badge_text' => 'RAPAT TINJAUAN MANAJEMEN',
                'title' => 'Pengendalian & Peningkatan Standar Mutu Berkesinambungan',
                'description' => 'Tindak lanjut rekomendasi hasil Audit Mutu Internal (AMI) bersama jajaran pimpinan fakultas dan program studi.',
                'image_path' => 'img/foto/Meet4.jpeg',
                'primary_btn_text' => 'Aplikasi AQA',
                'primary_btn_url' => 'https://spmi.horizon.ac.id/login',
                'secondary_btn_text' => 'Portal LMS',
                'secondary_btn_url' => 'https://lms.horizon.ac.id/',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];
    }
}
