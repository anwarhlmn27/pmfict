<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_news_article(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('admin.news.store'), [
            'title' => 'Sosialisasi Instrumen Akreditasi LAMINFOKOM 2026',
            'category_badge' => 'LAMINFOKOM',
            'excerpt' => 'Ringkasan kegiatan sosialisasi instrumen akreditasi prodi.',
            'content' => 'Isi lengkap berita sosialisasi instrumen akreditasi LAMINFOKOM untuk seluruh dosen FICT.',
            'thumbnail' => 'img/foto/Meet3.jpeg',
            'published_at' => '2026-11-10',
            'is_published' => 1,
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Berita & agenda berhasil ditambahkan.');
        $response->assertSessionHas('active_tab', 'berita');

        $this->assertDatabaseHas('news', [
            'user_id' => $admin->id,
            'title' => 'Sosialisasi Instrumen Akreditasi LAMINFOKOM 2026',
            'slug' => 'sosialisasi-instrumen-akreditasi-laminfokom-2026',
            'category_badge' => 'LAMINFOKOM',
            'thumbnail' => 'img/foto/Meet3.jpeg',
            'is_published' => true,
        ]);

        $homeResponse = $this->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('Sosialisasi Instrumen Akreditasi LAMINFOKOM 2026');
        $homeResponse->assertSee('Lihat Detail');

        $detailResponse = $this->get(route('berita.detail', 'sosialisasi-instrumen-akreditasi-laminfokom-2026'));
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee('Sosialisasi Instrumen Akreditasi LAMINFOKOM 2026');
        $detailResponse->assertSee('Isi lengkap berita sosialisasi instrumen akreditasi LAMINFOKOM untuk seluruh dosen FICT.');
    }

    public function test_admin_can_update_news_article(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $news = News::factory()->create([
            'title' => 'Judul Berita Lama',
            'slug' => 'judul-berita-lama',
            'category_badge' => 'SPMI',
            'is_published' => true,
        ]);

        $response = $this->actingAs($admin)->put(route('admin.news.update', $news), [
            'title' => 'Judul Berita Baru FICT',
            'category_badge' => 'RTM',
            'excerpt' => 'Ringkasan berita yang telah diperbarui.',
            'content' => 'Isi lengkap berita yang telah diperbarui oleh admin.',
            'thumbnail' => 'img/foto/Meet4.jpeg',
            'published_at' => '2026-11-11',
            'is_published' => 0,
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Berita & agenda berhasil diperbarui.');
        $response->assertSessionHas('active_tab', 'berita');

        $this->assertDatabaseHas('news', [
            'id' => $news->id,
            'title' => 'Judul Berita Baru FICT',
            'slug' => 'judul-berita-baru-fict',
            'category_badge' => 'RTM',
            'thumbnail' => 'img/foto/Meet4.jpeg',
            'is_published' => false,
        ]);
    }

    public function test_admin_can_delete_news_article(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $news = News::factory()->create([
            'title' => 'Berita Yang Akan Dihapus',
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.news.destroy', $news));

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Berita & agenda berhasil dihapus.');
        $response->assertSessionHas('active_tab', 'berita');

        $this->assertDatabaseMissing('news', [
            'id' => $news->id,
        ]);
    }

    public function test_non_admin_cannot_manage_news(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $news = News::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.news.store'), [
                'title' => 'Berita Ilegal',
                'category_badge' => 'SPMI',
                'content' => 'Isi ilegal',
            ])
            ->assertForbidden();

        $this->actingAs($user)
            ->delete(route('admin.news.destroy', $news))
            ->assertForbidden();
    }
}
