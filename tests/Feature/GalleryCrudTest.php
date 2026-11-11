<?php

namespace Tests\Feature;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GalleryCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_gallery_item(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('admin.galleries.store'), [
            'title' => 'Rapat Koordinasi Akreditasi LAMINFOKOM',
            'subtitle' => 'Penyusunan Bukti Fisik Kriteria 1-9',
            'badge' => 'AKREDITASI',
            'image_path' => 'img/foto/Meet5.jpeg',
            'sort_order' => 1,
            'is_active' => 1,
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Foto galeri kegiatan berhasil ditambahkan.');
        $response->assertSessionHas('active_tab', 'galeri');

        $this->assertDatabaseHas('galleries', [
            'title' => 'Rapat Koordinasi Akreditasi LAMINFOKOM',
            'subtitle' => 'Penyusunan Bukti Fisik Kriteria 1-9',
            'badge' => 'AKREDITASI',
            'image_path' => 'img/foto/Meet5.jpeg',
            'is_active' => true,
        ]);

        $homeResponse = $this->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('Rapat Koordinasi Akreditasi LAMINFOKOM');
    }

    public function test_admin_can_update_gallery_item(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $gallery = Gallery::factory()->create([
            'title' => 'Judul Galeri Lama',
            'badge' => 'SPMI',
            'image_path' => 'img/foto/Meet1.jpeg',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->put(route('admin.galleries.update', $gallery), [
            'title' => 'Judul Galeri Diperbarui',
            'subtitle' => 'Keterangan kegiatan diperbarui',
            'badge' => 'RTM',
            'image_path' => 'img/foto/Meet4.jpeg',
            'sort_order' => 3,
            'is_active' => 0,
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Foto galeri kegiatan berhasil diperbarui.');
        $response->assertSessionHas('active_tab', 'galeri');

        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'title' => 'Judul Galeri Diperbarui',
            'subtitle' => 'Keterangan kegiatan diperbarui',
            'badge' => 'RTM',
            'image_path' => 'img/foto/Meet4.jpeg',
            'sort_order' => 3,
            'is_active' => false,
        ]);
    }

    public function test_admin_can_delete_gallery_item(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $gallery = Gallery::factory()->create([
            'title' => 'Foto Yang Akan Dihapus',
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.galleries.destroy', $gallery));

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Foto galeri kegiatan berhasil dihapus.');
        $response->assertSessionHas('active_tab', 'galeri');

        $this->assertDatabaseMissing('galleries', [
            'id' => $gallery->id,
        ]);
    }

    public function test_non_admin_cannot_manage_galleries(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $gallery = Gallery::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.galleries.store'), [
                'title' => 'Foto Ilegal',
                'badge' => 'SPMI',
                'image_path' => 'img/foto/Meet1.jpeg',
            ])
            ->assertForbidden();

        $this->actingAs($user)
            ->delete(route('admin.galleries.destroy', $gallery))
            ->assertForbidden();
    }
}
