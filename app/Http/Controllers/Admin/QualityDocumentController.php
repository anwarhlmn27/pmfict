<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualityDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class QualityDocumentController extends Controller
{
    /**
     * Menyimpan dokumen mutu baru ke tabel quality_documents.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category' => ['required', 'string', Rule::in(['kebijakan', 'standar', 'manual', 'formulir'])],
            'code' => ['required', 'string', 'max:50', Rule::unique('quality_documents', 'code')],
            'title' => ['required', 'string', 'max:255'],
            'edition' => ['nullable', 'string', 'max:100'],
            'file_type' => ['nullable', 'string', 'max:30'],
            'file_size' => ['nullable', 'string', 'max:30'],
            'file_path' => ['nullable', 'string', 'max:255'],
            'document_file' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx', 'max:10240'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $filePath = $validated['file_path'] ?? '#';
        $fileType = $validated['file_type'] ?: 'PDF';
        $fileSize = $validated['file_size'] ?? null;

        if ($request->hasFile('document_file')) {
            $uploadedFile = $request->file('document_file');
            $storedPath = $uploadedFile->store('documents', 'public');
            $this->syncPublicStorageFile($storedPath);
            $filePath = 'storage/'.$storedPath;

            if (empty($fileSize)) {
                $fileSize = $this->formatBytes((int) $uploadedFile->getSize());
            }

            if (empty($validated['file_type'])) {
                $ext = strtoupper((string) $uploadedFile->getClientOriginalExtension());
                $fileType = $ext !== '' ? $ext : 'PDF';
            }
        }

        $nextOrder = (int) QualityDocument::where('category', $validated['category'])->max('sort_order') + 1;

        QualityDocument::create([
            'category' => $validated['category'],
            'code' => strtoupper(trim($validated['code'])),
            'title' => $validated['title'],
            'edition' => $validated['edition'] ?? 'Versi 2026',
            'file_path' => $filePath ?: '#',
            'file_type' => $fileType,
            'file_size' => $fileSize ?: '1.0 MB',
            'download_count' => 0,
            'sort_order' => (int) ($validated['sort_order'] ?? $nextOrder),
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Dokumen mutu berhasil ditambahkan.')
            ->with('active_tab', 'dokumen');
    }

    /**
     * Memperbarui data dokumen mutu pada tabel quality_documents.
     */
    public function update(Request $request, QualityDocument $qualityDocument): RedirectResponse
    {
        $validated = $request->validate([
            'category' => ['required', 'string', Rule::in(['kebijakan', 'standar', 'manual', 'formulir'])],
            'code' => ['required', 'string', 'max:50', Rule::unique('quality_documents', 'code')->ignore($qualityDocument->id)],
            'title' => ['required', 'string', 'max:255'],
            'edition' => ['nullable', 'string', 'max:100'],
            'file_type' => ['nullable', 'string', 'max:30'],
            'file_size' => ['nullable', 'string', 'max:30'],
            'file_path' => ['nullable', 'string', 'max:255'],
            'document_file' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx', 'max:10240'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $filePath = $validated['file_path'] ?? $qualityDocument->file_path;
        $fileType = $validated['file_type'] ?: $qualityDocument->file_type;
        $fileSize = $validated['file_size'] ?? $qualityDocument->file_size;

        if ($request->hasFile('document_file')) {
            $this->deleteStoredFileIfExists($qualityDocument->file_path);

            $uploadedFile = $request->file('document_file');
            $storedPath = $uploadedFile->store('documents', 'public');
            $this->syncPublicStorageFile($storedPath);
            $filePath = 'storage/'.$storedPath;
            $fileSize = $this->formatBytes((int) $uploadedFile->getSize());
        }

        $qualityDocument->update([
            'category' => $validated['category'],
            'code' => strtoupper(trim($validated['code'])),
            'title' => $validated['title'],
            'edition' => $validated['edition'] ?? $qualityDocument->edition,
            'file_path' => $filePath ?: '#',
            'file_type' => $fileType ?: 'PDF',
            'file_size' => $fileSize ?: $qualityDocument->file_size,
            'sort_order' => (int) ($validated['sort_order'] ?? $qualityDocument->sort_order),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Dokumen mutu berhasil diperbarui.')
            ->with('active_tab', 'dokumen');
    }

    /**
     * Menghapus dokumen mutu dari tabel quality_documents.
     */
    public function destroy(QualityDocument $qualityDocument): RedirectResponse
    {
        $this->deleteStoredFileIfExists($qualityDocument->file_path);

        $qualityDocument->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Dokumen mutu berhasil dihapus.')
            ->with('active_tab', 'dokumen');
    }

    /**
     * Format ukuran byte menjadi KB atau MB.
     */
    private function formatBytes(int $bytes): string
    {
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1).' MB';
        }

        return max(1, (int) round($bytes / 1024)).' KB';
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
     * Menghapus berkas dokumen lama jika tersimpan pada storage/documents.
     */
    private function deleteStoredFileIfExists(?string $filePath): void
    {
        if (! $filePath || ! str_starts_with($filePath, 'storage/documents/')) {
            return;
        }

        $relativePath = substr($filePath, strlen('storage/'));
        Storage::disk('public')->delete($relativePath);

        $publicCopy = public_path($filePath);
        if (! is_link(public_path('storage')) && is_file($publicCopy)) {
            @unlink($publicCopy);
        }
    }
}
