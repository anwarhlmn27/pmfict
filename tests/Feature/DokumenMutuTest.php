<?php

namespace Tests\Feature;

use Tests\TestCase;

class DokumenMutuTest extends TestCase
{
    /**
     * Test halaman Dokumen Kebijakan Mutu berhasil dimuat.
     */
    public function test_halaman_dokumen_kebijakan_mutu_dapat_diakses(): void
    {
        $response = $this->get(route('download.kebijakan-mutu'));

        $response->assertStatus(200);
        $response->assertViewIs('dokumen.kebijakan-mutu');
        $response->assertSee('Dokumen Kebijakan Mutu');
        $response->assertSee('Buku Kebijakan Sistem Penjaminan Mutu Internal (SPMI) FICT');
    }

    /**
     * Test halaman Dokumen Standar Mutu berhasil dimuat.
     */
    public function test_halaman_dokumen_standar_mutu_dapat_diakses(): void
    {
        $response = $this->get(route('download.standar-mutu'));

        $response->assertStatus(200);
        $response->assertViewIs('dokumen.standar-mutu');
        $response->assertSee('Dokumen Standar Mutu');
        $response->assertSee('Standar Kompetensi Lulusan (SKL)');
    }

    /**
     * Test halaman Dokumen Manual Mutu berhasil dimuat.
     */
    public function test_halaman_dokumen_manual_mutu_dapat_diakses(): void
    {
        $response = $this->get(route('download.manual-mutu'));

        $response->assertStatus(200);
        $response->assertViewIs('dokumen.manual-mutu');
        $response->assertSee('Dokumen Manual Mutu');
        $response->assertSee('Manual Penetapan Standar Mutu (P)');
    }

    /**
     * Test halaman Dokumen Formulir Mutu berhasil dimuat.
     */
    public function test_halaman_dokumen_formulir_mutu_dapat_diakses(): void
    {
        $response = $this->get(route('download.formulir-mutu'));

        $response->assertStatus(200);
        $response->assertViewIs('dokumen.formulir-mutu');
        $response->assertSee('Dokumen Formulir Mutu');
        $response->assertSee('Formulir Rencana Pembelajaran Semester (RPS)');
    }
}
