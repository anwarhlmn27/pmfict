<?php

namespace Tests\Feature;

use App\Models\HeroSlider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HeroSliderCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_hero_slider(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('admin.hero-sliders.store'), [
            'badge_text' => 'AUDIT MUTU INTERNAL',
            'title' => 'Pelaksanaan Siklus AMI Fakultas Informatika & Komputer',
            'description' => 'Evaluasi kepatuhan standar mutu akademik secara berkala.',
            'image_path' => 'img/foto/Meet3.jpeg',
            'primary_btn_text' => 'Lihat Jadwal',
            'primary_btn_url' => '#ppepp',
            'secondary_btn_text' => 'Unduh Laporan',
            'secondary_btn_url' => '#dokumen-standar-mutu',
            'sort_order' => 1,
            'is_active' => 1,
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Slide Hero berhasil ditambahkan.');
        $response->assertSessionHas('active_tab', 'slider');

        $this->assertDatabaseHas('hero_sliders', [
            'title' => 'Pelaksanaan Siklus AMI Fakultas Informatika & Komputer',
            'badge_text' => 'AUDIT MUTU INTERNAL',
            'image_path' => 'img/foto/Meet3.jpeg',
            'is_active' => true,
        ]);

        $homeResponse = $this->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('Pelaksanaan Siklus AMI Fakultas Informatika & Komputer');
    }

    public function test_admin_can_update_hero_slider(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $slider = HeroSlider::factory()->create([
            'title' => 'Judul Lama Slide',
            'image_path' => 'img/foto/Meet1.jpeg',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->put(route('admin.hero-sliders.update', $slider), [
            'badge_text' => 'BADGE BARU',
            'title' => 'Judul Baru Slide FICT',
            'description' => 'Deskripsi yang telah diperbarui.',
            'image_path' => 'img/foto/Meet5.jpeg',
            'primary_btn_text' => 'Tombol Utama',
            'primary_btn_url' => '#spme',
            'secondary_btn_text' => 'Tombol Kedua',
            'secondary_btn_url' => '#berita',
            'sort_order' => 2,
            'is_active' => 0,
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Slide Hero berhasil diperbarui.');

        $this->assertDatabaseHas('hero_sliders', [
            'id' => $slider->id,
            'title' => 'Judul Baru Slide FICT',
            'badge_text' => 'BADGE BARU',
            'image_path' => 'img/foto/Meet5.jpeg',
            'sort_order' => 2,
            'is_active' => false,
        ]);
    }

    public function test_admin_can_delete_hero_slider(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $slider = HeroSlider::factory()->create([
            'title' => 'Slide Yang Akan Dihapus',
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.hero-sliders.destroy', $slider));

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Slide Hero berhasil dihapus.');

        $this->assertDatabaseMissing('hero_sliders', [
            'id' => $slider->id,
        ]);
    }

    public function test_non_admin_cannot_manage_hero_sliders(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $slider = HeroSlider::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.hero-sliders.store'), [
                'title' => 'Slide Ilegal',
                'image_path' => 'img/foto/Meet1.jpeg',
            ])
            ->assertForbidden();

        $this->actingAs($user)
            ->delete(route('admin.hero-sliders.destroy', $slider))
            ->assertForbidden();
    }
}
