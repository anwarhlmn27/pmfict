<?php

namespace Tests\Feature;

use App\Models\OrganizationStructure;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrganizationStructureCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_organization_structure(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('admin.organization-structures.store'), [
            'position_title' => 'Sekretaris Gugus Mutu FICT',
            'person_name' => 'Dr. Budi Santoso, M.Kom.',
            'role_description' => 'Pengelolaan Dokumen SPMI & Administrasi AMI',
            'icon_class' => 'fas fa-users-cog',
            'sort_order' => 5,
            'is_active' => 1,
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Data struktur organisasi berhasil ditambahkan.');
        $response->assertSessionHas('active_tab', 'struktur');

        $this->assertDatabaseHas('organization_structures', [
            'position_title' => 'Sekretaris Gugus Mutu FICT',
            'person_name' => 'Dr. Budi Santoso, M.Kom.',
            'role_description' => 'Pengelolaan Dokumen SPMI & Administrasi AMI',
            'icon_class' => 'fas fa-users-cog',
            'sort_order' => 5,
            'is_active' => true,
        ]);

        $homeResponse = $this->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('Sekretaris Gugus Mutu FICT');
        $homeResponse->assertSee('Dr. Budi Santoso, M.Kom.');
    }

    public function test_admin_can_update_organization_structure(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $structure = OrganizationStructure::factory()->create([
            'position_title' => 'Jabatan Lama',
            'icon_class' => 'fas fa-user-tie',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->put(route('admin.organization-structures.update', $structure), [
            'position_title' => 'Ketua Gugus Penjaminan Mutu FICT',
            'person_name' => 'Ir. Siti Aminah, M.T.',
            'role_description' => 'Koordinator SPMI & SPME Tingkat Fakultas',
            'icon_class' => 'fas fa-award',
            'sort_order' => 2,
            'is_active' => 0,
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Data struktur organisasi berhasil diperbarui.');
        $response->assertSessionHas('active_tab', 'struktur');

        $this->assertDatabaseHas('organization_structures', [
            'id' => $structure->id,
            'position_title' => 'Ketua Gugus Penjaminan Mutu FICT',
            'person_name' => 'Ir. Siti Aminah, M.T.',
            'icon_class' => 'fas fa-award',
            'sort_order' => 2,
            'is_active' => false,
        ]);
    }

    public function test_admin_can_delete_organization_structure(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $structure = OrganizationStructure::factory()->create([
            'position_title' => 'Jabatan Yang Akan Dihapus',
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.organization-structures.destroy', $structure));

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('status', 'Data struktur organisasi berhasil dihapus.');
        $response->assertSessionHas('active_tab', 'struktur');

        $this->assertDatabaseMissing('organization_structures', [
            'id' => $structure->id,
        ]);
    }

    public function test_non_admin_cannot_manage_organization_structures(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $structure = OrganizationStructure::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.organization-structures.store'), [
                'position_title' => 'Jabatan Ilegal',
                'icon_class' => 'fas fa-user-tie',
            ])
            ->assertForbidden();

        $this->actingAs($user)
            ->delete(route('admin.organization-structures.destroy', $structure))
            ->assertForbidden();
    }
}
