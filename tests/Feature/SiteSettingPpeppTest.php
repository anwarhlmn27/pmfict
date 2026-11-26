<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SiteSettingPpeppTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_upload_and_remove_ppepp_image(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['role' => 'admin']);

        $imageFile = UploadedFile::fake()->image('flowmap-ppepp.png', 1200, 600);

        $response = $this->actingAs($admin)->post(route('admin.site-settings.update'), [
            'site_email' => 'pm.fict@horizon.ac.id',
            'ppepp_image' => $imageFile,
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('active_tab', 'settings');

        $savedPath = SiteSetting::getValue('ppepp_image_path');
        $this->assertNotNull($savedPath);
        $this->assertStringStartsWith('storage/ppepp/', $savedPath);

        $homeResponse = $this->get(route('home'));
        $homeResponse->assertOk();
        $homeResponse->assertSee($savedPath);

        $removeResponse = $this->actingAs($admin)->post(route('admin.site-settings.update'), [
            'remove_ppepp_image' => '1',
        ]);

        $removeResponse->assertRedirect(route('admin.dashboard'));
        $this->assertNull(SiteSetting::getValue('ppepp_image_path'));

        $fallbackHome = $this->get(route('home'));
        $fallbackHome->assertOk();
        $fallbackHome->assertSee('ppepp-flowmap-wrapper');
    }
}
