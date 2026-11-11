<?php

namespace App\Models;

use Database\Factories\QualityDocumentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'category',
    'code',
    'title',
    'edition',
    'file_path',
    'file_type',
    'file_size',
    'download_count',
    'sort_order',
    'is_active',
])]
class QualityDocument extends Model
{
    /** @use HasFactory<QualityDocumentFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'download_count' => 'integer',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Nama kategori dokumen yang ramah dibaca.
     */
    public function categoryLabel(): string
    {
        return match ($this->category) {
            'kebijakan' => 'Kebijakan Mutu',
            'standar' => 'Standar Mutu',
            'manual' => 'Manual Mutu',
            'formulir' => 'Formulir Mutu',
            default => ucfirst((string) $this->category),
        };
    }

    /**
     * Class warna badge sesuai kategori dokumen.
     */
    public function badgeClass(): string
    {
        return match ($this->category) {
            'manual' => 'badge-info',
            'formulir' => 'badge-success',
            default => 'badge-primary',
        };
    }

    /**
     * Class ikon berkas berdasarkan tipe file.
     */
    public function fileIconClass(): string
    {
        $type = strtoupper((string) $this->file_type);

        if (str_contains($type, 'XLS')) {
            return 'far fa-file-excel text-success';
        }

        if (str_contains($type, 'DOC')) {
            return 'far fa-file-word text-primary';
        }

        return 'far fa-file-pdf text-danger';
    }

    /**
     * Menghasilkan URL berkas dokumen yang siap diunduh.
     */
    public function fileUrl(): string
    {
        $path = trim((string) ($this->file_path ?? ''));

        if ($path === '' || $path === '#') {
            return '#';
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        $normalized = ltrim($path, '/');

        if (str_starts_with($normalized, 'storage/')) {
            $relativeStoragePath = substr($normalized, strlen('storage/'));
            $sourceFile = storage_path('app/public/'.$relativeStoragePath);
            $publicFile = public_path($normalized);

            if (is_file($sourceFile) && ! is_file($publicFile)) {
                $targetDir = dirname($publicFile);
                if (! is_dir($targetDir)) {
                    @mkdir($targetDir, 0755, true);
                }
                @copy($sourceFile, $publicFile);
            }
        }

        return asset($normalized);
    }

    /**
     * Data default 20 dokumen mutu SPMI FICT untuk 4 pilar dokumen.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function defaultDocuments(?string $category = null): array
    {
        $items = [
            // 1. Kebijakan Mutu
            [
                'category' => 'kebijakan',
                'code' => 'KBJ-SPMI-01',
                'title' => 'Buku Kebijakan Sistem Penjaminan Mutu Internal (SPMI) FICT',
                'edition' => 'Revisi 2026',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '2.6 MB',
                'download_count' => 0,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'kebijakan',
                'code' => 'KBJ-SPMI-02',
                'title' => 'Keputusan Dekan tentang Struktur & Tata Kerja Gugus Penjaminan Mutu',
                'edition' => 'SK Dekan 2026',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '1.4 MB',
                'download_count' => 0,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'kebijakan',
                'code' => 'KBJ-SPMI-03',
                'title' => 'Kebijakan Kurikulum Berbasis Outcome-Based Education (OBE) FICT',
                'edition' => 'Versi 2026',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '2.1 MB',
                'download_count' => 0,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'kebijakan',
                'code' => 'KBJ-SPMI-04',
                'title' => 'Kebijakan Mutu Penelitian, Publikasi Ilmiah, dan Pengabdian Masyarakat',
                'edition' => 'Versi 2026',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '1.8 MB',
                'download_count' => 0,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'category' => 'kebijakan',
                'code' => 'KBJ-SPMI-05',
                'title' => 'Pedoman Etika Akademik dan Budaya Mutu Civitas Akademika FICT',
                'edition' => 'Versi 2026',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '1.5 MB',
                'download_count' => 0,
                'sort_order' => 5,
                'is_active' => true,
            ],

            // 2. Standar Mutu
            [
                'category' => 'standar',
                'code' => 'STD-SPMI-01',
                'title' => 'Standar Kompetensi Lulusan (SKL) & Capaian Pembelajaran Lulusan (CPL)',
                'edition' => 'Versi 2026',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '2.4 MB',
                'download_count' => 0,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'standar',
                'code' => 'STD-SPMI-02',
                'title' => 'Standar Isi Pembelajaran & Kurikulum OBE',
                'edition' => 'Versi 2026',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '3.1 MB',
                'download_count' => 0,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'standar',
                'code' => 'STD-SPMI-03',
                'title' => 'Standar Proses & Penilaian Pembelajaran',
                'edition' => 'Versi 2026',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '1.9 MB',
                'download_count' => 0,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'standar',
                'code' => 'STD-SPMI-04',
                'title' => 'Standar Dosen & Tenaga Kependidikan',
                'edition' => 'Versi 2026',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '1.5 MB',
                'download_count' => 0,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'category' => 'standar',
                'code' => 'STD-SPMI-05',
                'title' => 'Standar Sarana, Prasarana & Laboratorium ICT',
                'edition' => 'Versi 2026',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '2.8 MB',
                'download_count' => 0,
                'sort_order' => 5,
                'is_active' => true,
            ],

            // 3. Manual Mutu
            [
                'category' => 'manual',
                'code' => 'MNL-PPEPP-01',
                'title' => 'Manual Penetapan Standar Mutu (P)',
                'edition' => 'Penyusunan Standar',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '1.8 MB',
                'download_count' => 0,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'manual',
                'code' => 'MNL-PPEPP-02',
                'title' => 'Manual Pelaksanaan Standar Mutu (P)',
                'edition' => 'Implementasi Tridharma',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '2.1 MB',
                'download_count' => 0,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'manual',
                'code' => 'MNL-PPEPP-03',
                'title' => 'Manual Evaluasi & Audit Mutu Internal (E)',
                'edition' => 'Instrumen AMI',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '3.4 MB',
                'download_count' => 0,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'manual',
                'code' => 'MNL-PPEPP-04',
                'title' => 'Manual Pengendalian Standar & RTM (P)',
                'edition' => 'Tata Cara RTM',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '1.6 MB',
                'download_count' => 0,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'category' => 'manual',
                'code' => 'MNL-PPEPP-05',
                'title' => 'Manual Peningkatan Standar Mutu (P)',
                'edition' => 'Kaizen Mutu',
                'file_path' => '#',
                'file_type' => 'PDF',
                'file_size' => '1.4 MB',
                'download_count' => 0,
                'sort_order' => 5,
                'is_active' => true,
            ],

            // 4. Formulir Mutu
            [
                'category' => 'formulir',
                'code' => 'FRM-SPMI-01',
                'title' => 'Formulir Rencana Pembelajaran Semester (RPS) & Kontrak Kuliah OBE',
                'edition' => '2026',
                'file_path' => '#',
                'file_type' => 'DOCX / PDF',
                'file_size' => '850 KB',
                'download_count' => 0,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'formulir',
                'code' => 'FRM-SPMI-02',
                'title' => 'Formulir Monitoring dan Evaluasi (Monev) Ketercapaian Perkuliahan',
                'edition' => '2026',
                'file_path' => '#',
                'file_type' => 'XLSX / PDF',
                'file_size' => '620 KB',
                'download_count' => 0,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'formulir',
                'code' => 'FRM-SPMI-03',
                'title' => 'Formulir Daftar Tilik (Checklist) & Instrumen Audit Mutu Internal (AMI)',
                'edition' => '2026',
                'file_path' => '#',
                'file_type' => 'DOCX / PDF',
                'file_size' => '1.2 MB',
                'download_count' => 0,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'formulir',
                'code' => 'FRM-SPMI-04',
                'title' => 'Formulir Permintaan Tindakan Koreksi (PTK) Temuan Audit',
                'edition' => '2026',
                'file_path' => '#',
                'file_type' => 'DOCX / PDF',
                'file_size' => '540 KB',
                'download_count' => 0,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'category' => 'formulir',
                'code' => 'FRM-SPMI-05',
                'title' => 'Formulir Berita Acara & Risalah Rapat Tinjauan Manajemen (RTM)',
                'edition' => '2026',
                'file_path' => '#',
                'file_type' => 'DOCX / PDF',
                'file_size' => '710 KB',
                'download_count' => 0,
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        if ($category !== null) {
            return array_values(array_filter(
                $items,
                fn (array $doc): bool => $doc['category'] === $category
            ));
        }

        return $items;
    }
}
