<?php

namespace App\Models;

use Database\Factories\GalleryFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'title',
    'subtitle',
    'badge',
    'image_path',
    'sort_order',
    'is_active',
])]
class Gallery extends Model
{
    /** @use HasFactory<GalleryFactory> */
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
     * Menghasilkan URL gambar galeri yang siap ditampilkan di browser.
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
     * Menentukan class warna badge Bootstrap sesuai nama badge.
     */
    public function badgeClass(): string
    {
        return self::resolveBadgeClass($this->badge);
    }

    /**
     * Menentukan class warna badge dari string kategori.
     */
    public static function resolveBadgeClass(?string $badge): string
    {
        return match (strtoupper((string) $badge)) {
            'GKM', 'AMI' => 'badge-success',
            'CPL' => 'badge-warning',
            'RTM', 'PTK' => 'badge-danger',
            'SOP', 'SARPRAS', 'LAMINFOKOM' => 'badge-info',
            'MONEV' => 'badge-dark',
            default => 'badge-primary',
        };
    }

    /**
     * Data default 10 foto galeri rapat & kegiatan mutu FICT.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function defaultItems(): array
    {
        return [
            [
                'title' => 'Rapat Koordinasi Tim Mutu FICT',
                'subtitle' => 'Pemetaan Standar Mutu Akademik',
                'badge' => 'SPMI',
                'image_path' => 'img/foto/Meet1.jpeg',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Diskusi Gugus Kendali Mutu & Kurikulum',
                'subtitle' => 'Review Capaian Pembelajaran Lulusan (CPL)',
                'badge' => 'GKM',
                'image_path' => 'img/foto/Meet2.jpeg',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Presentasi Pemetaan Standar Capaian',
                'subtitle' => 'Pemaparan Instrumen Mutu Perkuliahan',
                'badge' => 'CPL',
                'image_path' => 'img/foto/Meet3.jpeg',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Rapat Tinjauan Manajemen Semesteran',
                'subtitle' => 'Pengendalian Temuan Audit Mutu Internal',
                'badge' => 'RTM',
                'image_path' => 'img/foto/Meet4.jpeg',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Workshop Pemutakhiran Dokumen Standar',
                'subtitle' => 'Sinkronisasi Standar SN-Dikti & LAMINFOKOM',
                'badge' => 'SOP',
                'image_path' => 'img/foto/Meet5.jpeg',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Monitoring Ketercapaian Perkuliahan',
                'subtitle' => 'Analisis Hasil Kuesioner Kepuasan',
                'badge' => 'MONEV',
                'image_path' => 'img/foto/Meet6.jpeg',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Tim Auditor Mutu Internal',
                'subtitle' => 'Penugasan Auditor Lapangan',
                'badge' => 'AMI',
                'image_path' => 'img/foto/Meet7.jpeg',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Tindak Lanjut Temuan Audit',
                'subtitle' => 'Kaizen Peningkatan Standar Mutu',
                'badge' => 'PTK',
                'image_path' => 'img/foto/Meet8.jpeg',
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Standarisasi Lab Komputer',
                'subtitle' => 'Fasilitas Praktikum & Riset ICT',
                'badge' => 'SARPRAS',
                'image_path' => 'img/foto/Meet9.jpeg',
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'title' => 'Finalisasi Berkas LED/LKPS',
                'subtitle' => 'Submit Dokumen LAMINFOKOM',
                'badge' => 'AKREDITASI',
                'image_path' => 'img/foto/Meet10.jpeg',
                'sort_order' => 10,
                'is_active' => true,
            ],
        ];
    }
}
