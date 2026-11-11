<?php

namespace Tests\Feature;

use App\Models\QualityDocument;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class QualityDocumentCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_document_pages_and_admin_dashboard_render_quality_documents(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $doc = QualityDocument::factory()->create([
            'category' => 'kebijakan',
            'code' => 'KBJ-SPMI-09',
            'title' => 'Pedoman Kebijakan Mutu Riset ICT',
            'edition' => 'Revisi 2026',
            'file_type' => 'PDF',
            'file_size' => '1.9 MB',
            'is_active' => true,
        ]);

        $publicResponse = $this->get(route('download.kebijakan-mutu'));
        $publicResponse->assertOk();
        $publicResponse->assertSee('KBJ-SPMI-09');
        $publicResponse->assertSee('Pedoman Kebijakan Mutu Riset ICT');

        $adminResponse = $this->actingAs($admin)->get(route('admin.dashboard'));
        $adminResponse->assertOk();
        $adminResponse->assertSee($doc->code);
        $adminResponse->assertSee($doc->title);
    }

    public function test_admin_can_create_quality_document_with_uploaded_file(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['role' => 'admin']);

        $pdfFile = UploadedFile::fake()->create('standar-baru.pdf', 1500, 'application/pdf');

        $response = $this->actingAs($admin)->post(route('admin.quality-documents.store'), [
            'category' => 'standar',
            'code' => 'std-spmi-06',
            'title' => 'Standar Keamanan Siber & Infrastruktur Jaringan',
            'edition' => 'Versi 2026',
            'file_type' => 'PDF',
            'document_file' => $pdfFile,
            'sort_order' => 6,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('active_tab', 'dokumen');

        $this->assertDatabaseHas('quality_documents', [
            'category' => 'standar',
            'code' => 'STD-SPMI-06',
            'title' => 'Standar Keamanan Siber & Infrastruktur Jaringan',
            'edition' => 'Versi 2026',
            'file_type' => 'PDF',
            'sort_order' => 6,
            'is_active' => 1,
        ]);
    }

    public function test_admin_can_update_quality_document(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $doc = QualityDocument::factory()->create([
            'category' => 'manual',
            'code' => 'MNL-PPEPP-01',
            'title' => 'Manual Lama',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->put(route('admin.quality-documents.update', $doc), [
            'category' => 'manual',
            'code' => 'MNL-PPEPP-01',
            'title' => 'Manual Penetapan Standar Mutu (Terbaru)',
            'edition' => 'Revisi 2026',
            'file_type' => 'PDF',
            'file_size' => '2.2 MB',
            'file_path' => '#',
            'sort_order' => 1,
            'is_active' => '0',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('active_tab', 'dokumen');

        $this->assertDatabaseHas('quality_documents', [
            'id' => $doc->id,
            'code' => 'MNL-PPEPP-01',
            'title' => 'Manual Penetapan Standar Mutu (Terbaru)',
            'edition' => 'Revisi 2026',
            'file_size' => '2.2 MB',
            'is_active' => 0,
        ]);
    }

    public function test_admin_can_delete_quality_document(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $doc = QualityDocument::factory()->create();

        $response = $this->actingAs($admin)->delete(route('admin.quality-documents.destroy', $doc));

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('active_tab', 'dokumen');
        $this->assertDatabaseMissing('quality_documents', ['id' => $doc->id]);
    }
}
