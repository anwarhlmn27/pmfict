<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Test the homepage returns 200 and renders all required menus and photos.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Assert Menus
        $response->assertSee('Home');
        $response->assertSee('Profile');
        $response->assertSee('Struktur Organisasi');
        $response->assertSee('Visi dan Misi');
        $response->assertSee('SPME');
        $response->assertSee('BAN-PT');
        $response->assertSee('LAMINFOKOM');
        $response->assertSee('Berita');
        $response->assertSee('Download');
        $response->assertSee('Dokumen Standar Mutu');
        $response->assertSee('Dokumen Manual Mutu');
        $response->assertSee('Aplikasi');
        $response->assertSee('AQA');
        $response->assertSee('LMS');
        $response->assertSee('Repository');
        $response->assertSee('Login');
        $response->assertSee('PPEPP');
        $response->assertSee('Penetapan');
        $response->assertSee('Pelaksanaan');
        $response->assertSee('Evaluasi');
        $response->assertSee('Pengendalian');
        $response->assertSee('Peningkatan');

        // Assert Photos
        for ($i = 1; $i <= 10; $i++) {
            $response->assertSee("Meet{$i}.jpeg");
        }
    }
}
