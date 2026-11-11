<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\AdminSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test halaman login dapat dimuat dan memiliki komponen logo, username, password, remember me, dan button submit.
     */
    public function test_login_screen_can_be_rendered_with_all_required_components(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('fict.png');
        $response->assertSee('name="username"', false);
        $response->assertSee('name="password"', false);
        $response->assertSee('name="remember"', false);
        $response->assertSee('type="submit"', false);
    }

    /**
     * Test autentikasi berhasil dengan username valid dan mengarah ke dashboard.
     */
    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create([
            'name' => 'adminfict',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'username' => 'adminfict',
            'password' => 'password123',
            'remember' => '1',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('admin.dashboard'));
    }

    /**
     * Test autentikasi gagal dengan password yang salah.
     */
    public function test_users_cannot_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'name' => 'adminfict',
        ]);

        $this->post('/login', [
            'username' => $user->name,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    /**
     * Test user yang sudah login dapat mengakses halaman dashboard admin.
     */
    public function test_authenticated_user_can_access_admin_dashboard(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin FICT',
        ]);

        $response = $this->actingAs($user)->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.dashboard');
        $response->assertSee('Dashboard Admin Penjaminan Mutu FICT');
        $response->assertSee('Admin FICT');
        $response->assertSee('Dokumen Mutu');
        $response->assertSee('Berita & Agenda', false);
        $response->assertSee('Galeri Kegiatan');
        $response->assertSee('Akreditasi SPME');
        $response->assertSee('Struktur Organisasi');
        $response->assertSee('Hero Slider');
        $response->assertSee('Pesan Kontak');
        $response->assertSee('Pengaturan Web');
    }

    /**
     * Test user yang sudah login dapat logout.
     */
    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect(route('login'));
    }

    /**
     * Test AdminSeeder berhasil membuat akun admin default dan dapat digunakan untuk login.
     */
    public function test_admin_seeder_creates_admin_role_account_and_can_login(): void
    {
        $this->seed(AdminSeeder::class);

        $this->assertDatabaseHas('users', [
            'name' => 'admin',
            'email' => 'admin@horizon.ac.id',
            'role' => 'admin',
        ]);

        $response = $this->post('/login', [
            'username' => 'admin',
            'password' => 'admin123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    /**
     * Test middleware guest dan auth/admin bekerja dengan benar.
     */
    public function test_middleware_protects_login_and_admin_dashboard_routes(): void
    {
        // 1. Guest tidak bisa akses dashboard admin (redirect ke /login)
        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('login'));

        // 2. User dengan role 'admin' yang sudah login otomatis redirect ke dashboard jika akses /login
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin)
            ->get(route('login'))
            ->assertRedirect(route('admin.dashboard'));

        // 3. User dengan role selain 'admin' ditolak (403) saat akses dashboard admin
        $nonAdmin = User::factory()->create(['role' => 'user']);
        $this->actingAs($nonAdmin)
            ->get(route('admin.dashboard'))
            ->assertStatus(403);
    }
}
