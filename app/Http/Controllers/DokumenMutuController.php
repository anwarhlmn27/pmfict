<?php

namespace App\Http\Controllers;

use App\Models\QualityDocument;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class DokumenMutuController extends Controller
{
    /**
     * Menampilkan halaman Dokumen Kebijakan Mutu.
     */
    public function kebijakanMutu(): View
    {
        return view('dokumen.kebijakan-mutu', [
            'documents' => $this->getDocumentsByCategory('kebijakan'),
        ]);
    }

    /**
     * Menampilkan halaman Dokumen Standar Mutu.
     */
    public function standarMutu(): View
    {
        return view('dokumen.standar-mutu', [
            'documents' => $this->getDocumentsByCategory('standar'),
        ]);
    }

    /**
     * Menampilkan halaman Dokumen Manual Mutu.
     */
    public function manualMutu(): View
    {
        return view('dokumen.manual-mutu', [
            'documents' => $this->getDocumentsByCategory('manual'),
        ]);
    }

    /**
     * Menampilkan halaman Dokumen Formulir Mutu.
     */
    public function formulirMutu(): View
    {
        return view('dokumen.formulir-mutu', [
            'documents' => $this->getDocumentsByCategory('formulir'),
        ]);
    }

    /**
     * Mengambil daftar dokumen aktif per kategori dengan fallback data default.
     *
     * @return Collection<int, QualityDocument>
     */
    private function getDocumentsByCategory(string $category): Collection
    {
        $documents = Schema::hasTable('quality_documents')
            ? QualityDocument::where('category', $category)
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get()
            : collect();

        if ($documents->isEmpty()) {
            $documents = collect(QualityDocument::defaultDocuments($category))
                ->map(fn (array $doc): QualityDocument => new QualityDocument($doc));
        }

        return $documents;
    }
}
