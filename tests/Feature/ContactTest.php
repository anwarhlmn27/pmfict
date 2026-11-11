<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * Test halaman Kontak Kami dapat diakses dan menampilkan alamat, telepon, email, web, form, dan maps.
     */
    public function test_halaman_kontak_kami_dapat_diakses(): void
    {
        $response = $this->get(route('kontak'));

        $response->assertStatus(200);
        $response->assertViewIs('kontak');
        $response->assertSee('Kontak Kami');
        $response->assertSee('Alamat Kami');
        $response->assertSee('Telepon / WhatsApp');
        $response->assertSee('Email Resmi');
        $response->assertSee('Website Resmi');
        $response->assertSee('https://maps.app.goo.gl/DDstLPTdgou3sE1q7');
        $response->assertSee('name="name"', false);
        $response->assertSee('name="email"', false);
        $response->assertSee('name="subject"', false);
        $response->assertSee('name="message"', false);
    }

    /**
     * Test pengiriman form Kontak Kami berhasil dengan data yang valid.
     */
    public function test_pengiriman_form_kontak_kami_berhasil_dengan_data_valid(): void
    {
        $response = $this->from(route('kontak'))->post(route('kontak.submit'), [
            'name' => 'Budi Santoso',
            'email' => 'budi@horizon.ac.id',
            'phone' => '081234567890',
            'subject' => 'Konsultasi Dokumen Mutu',
            'message' => 'Mohon informasi terkait jadwal Audit Mutu Internal semester ini.',
        ]);

        $response->assertRedirect(route('kontak'));
        $response->assertSessionHas('status', 'Terima kasih! Pesan Anda telah berhasil dikirim ke Unit Penjaminan Mutu FICT.');
    }

    /**
     * Test pengiriman form Kontak Kami gagal jika kolom wajib kosong.
     */
    public function test_pengiriman_form_kontak_kami_memvalidasi_input_wajib(): void
    {
        $response = $this->from(route('kontak'))->post(route('kontak.submit'), []);

        $response->assertRedirect(route('kontak'));
        $response->assertSessionHasErrors([
            'name' => 'Nama lengkap wajib diisi.',
            'email' => 'Alamat email wajib diisi.',
            'subject' => 'Subjek pesan wajib diisi.',
            'message' => 'Isi pesan wajib diisi.',
        ]);
    }
}
