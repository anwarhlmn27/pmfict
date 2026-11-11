<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\NewsFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[Fillable([
    'user_id',
    'title',
    'slug',
    'category_badge',
    'excerpt',
    'content',
    'thumbnail',
    'published_at',
    'is_published',
])]
class News extends Model
{
    /** @use HasFactory<NewsFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_published' => 'boolean',
        ];
    }

    /**
     * Relasi penulis berita ke tabel users.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Menghasilkan URL gambar thumbnail berita yang siap ditampilkan di browser.
     */
    public function thumbnailUrl(): string
    {
        $path = $this->thumbnail ?: 'img/foto/Meet1.jpeg';

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        if (str_starts_with($path, 'storage/')) {
            $publicTarget = public_path($path);
            $relativeDiskPath = substr($path, strlen('storage/'));
            $storageSource = Storage::disk('public')->path($relativeDiskPath);

            if (! is_file($publicTarget) && is_file($storageSource)) {
                File::ensureDirectoryExists(dirname($publicTarget));
                File::copy($storageSource, $publicTarget);
            }
        }

        return asset($path);
    }

    /**
     * Menentukan class warna badge Bootstrap sesuai category_badge.
     */
    public function badgeClass(): string
    {
        return self::resolveBadgeClass($this->category_badge);
    }

    /**
     * Menentukan class warna badge dari string kategori.
     */
    public static function resolveBadgeClass(?string $badge): string
    {
        return match (strtoupper((string) $badge)) {
            'LAMINFOKOM', 'BAN-PT', 'SOP', 'SARPRAS' => 'badge-info',
            'RTM', 'PTK' => 'badge-danger',
            'AMI', 'GKM' => 'badge-success',
            'CPL', 'PPEPP' => 'badge-warning',
            'MONEV' => 'badge-dark',
            default => 'badge-primary',
        };
    }

    /**
     * Format tanggal terbit dalam Bahasa Indonesia (contoh: 15 Oktober 2026).
     */
    public function formattedPublishedDate(): string
    {
        $date = $this->published_at ?? $this->created_at ?? now();

        return self::formatIndonesianDate($date);
    }

    /**
     * Format objek tanggal atau string menjadi tanggal Bahasa Indonesia.
     */
    public static function formatIndonesianDate(mixed $date): string
    {
        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        return $carbon->format('d').' '.($months[(int) $carbon->format('n')] ?? $carbon->format('F')).' '.$carbon->format('Y');
    }

    /**
     * Membuat slug unik dari judul berita.
     */
    public static function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title) ?: 'berita-mutu';
        $slug = $baseSlug;
        $counter = 2;

        while (
            static::where('slug', $slug)
                ->when($ignoreId !== null, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Data default 3 berita & agenda mutu FICT.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function defaultArticles(): array
    {
        return [
            [
                'title' => 'Pelaksanaan Audit Mutu Internal Semester Ganjil',
                'slug' => 'pelaksanaan-audit-mutu-internal-semester-ganjil',
                'category_badge' => 'SPMI',
                'excerpt' => 'Gugus Penjaminan Mutu FICT resmi memulai audit mutu untuk memverifikasi kesesuaian dokumen perkuliahan dan kurikulum OBE.',
                'content' => 'Gugus Penjaminan Mutu FICT resmi memulai audit mutu untuk memverifikasi kesesuaian dokumen perkuliahan dan kurikulum OBE pada seluruh program studi di lingkungan Fakultas Informatika dan Komputer.',
                'thumbnail' => 'img/foto/Meet1.jpeg',
                'published_at' => '2026-10-15 09:00:00',
                'is_published' => true,
            ],
            [
                'title' => 'Workshop Penyusunan LED Akreditasi Program Studi',
                'slug' => 'workshop-penyusunan-led-akreditasi-program-studi',
                'category_badge' => 'LAMINFOKOM',
                'excerpt' => 'Tim dosen dan pimpinan prodi Informatika & Sistem Informasi menyelaraskan bukti capaian kriteria LAMINFOKOM.',
                'content' => 'Tim dosen dan pimpinan prodi Informatika & Sistem Informasi menyelaraskan bukti capaian kriteria LAMINFOKOM dalam rangka persiapan akreditasi unggul.',
                'thumbnail' => 'img/foto/Meet3.jpeg',
                'published_at' => '2026-10-08 09:00:00',
                'is_published' => true,
            ],
            [
                'title' => 'Rapat Tinjauan Manajemen Menetapkan 8 Rekomendasi',
                'slug' => 'rapat-tinjauan-manajemen-menetapkan-8-rekomendasi',
                'category_badge' => 'RTM',
                'excerpt' => 'Pimpinan Fakultas menyepakati langkah strategis penguatan fasilitas komputasi dan percepatan publikasi ilmiah dosen.',
                'content' => 'Pimpinan Fakultas menyepakati langkah strategis penguatan fasilitas komputasi dan percepatan publikasi ilmiah dosen sebagai tindak lanjut hasil Audit Mutu Internal.',
                'thumbnail' => 'img/foto/Meet4.jpeg',
                'published_at' => '2026-09-25 09:00:00',
                'is_published' => true,
            ],
        ];
    }
}
