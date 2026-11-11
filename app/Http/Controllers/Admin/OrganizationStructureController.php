<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationStructure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrganizationStructureController extends Controller
{
    /**
     * Menyimpan jabatan baru ke tabel organization_structures.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'position_title' => ['required', 'string', 'max:255'],
            'person_name' => ['nullable', 'string', 'max:255'],
            'role_description' => ['nullable', 'string', 'max:255'],
            'icon_class' => ['required', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        OrganizationStructure::create([
            'position_title' => $validated['position_title'],
            'person_name' => $validated['person_name'] ?? null,
            'role_description' => $validated['role_description'] ?? null,
            'icon_class' => $validated['icon_class'],
            'sort_order' => (int) ($validated['sort_order'] ?? (OrganizationStructure::max('sort_order') + 1)),
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Data struktur organisasi berhasil ditambahkan.')
            ->with('active_tab', 'struktur');
    }

    /**
     * Memperbarui data jabatan pada tabel organization_structures.
     */
    public function update(Request $request, OrganizationStructure $organizationStructure): RedirectResponse
    {
        $validated = $request->validate([
            'position_title' => ['required', 'string', 'max:255'],
            'person_name' => ['nullable', 'string', 'max:255'],
            'role_description' => ['nullable', 'string', 'max:255'],
            'icon_class' => ['required', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $organizationStructure->update([
            'position_title' => $validated['position_title'],
            'person_name' => $validated['person_name'] ?? null,
            'role_description' => $validated['role_description'] ?? null,
            'icon_class' => $validated['icon_class'],
            'sort_order' => (int) ($validated['sort_order'] ?? $organizationStructure->sort_order),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Data struktur organisasi berhasil diperbarui.')
            ->with('active_tab', 'struktur');
    }

    /**
     * Menghapus data jabatan dari tabel organization_structures.
     */
    public function destroy(OrganizationStructure $organizationStructure): RedirectResponse
    {
        $organizationStructure->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Data struktur organisasi berhasil dihapus.')
            ->with('active_tab', 'struktur');
    }
}
