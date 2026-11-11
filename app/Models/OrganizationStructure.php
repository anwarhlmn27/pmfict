<?php

namespace App\Models;

use Database\Factories\OrganizationStructureFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'position_title',
    'person_name',
    'role_description',
    'icon_class',
    'sort_order',
    'is_active',
])]
class OrganizationStructure extends Model
{
    /** @use HasFactory<OrganizationStructureFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Data default struktur organisasi Penjaminan Mutu FICT.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function defaultItems(): array
    {
        return [
            [
                'position_title' => 'Dekan FICT',
                'person_name' => null,
                'role_description' => 'Pengarah & Penanggung Jawab SPMI Fakultas',
                'icon_class' => 'fas fa-user-tie',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'position_title' => 'Ketua Gugus Mutu',
                'person_name' => null,
                'role_description' => 'Koordinator Penjaminan Mutu & Standarisasi',
                'icon_class' => 'fas fa-award',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'position_title' => 'Tim Auditor AMI',
                'person_name' => null,
                'role_description' => 'Pelaksana Audit Kepatuhan Perkuliahan',
                'icon_class' => 'fas fa-clipboard-check',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'position_title' => 'GKM Prodi Informatika & SI',
                'person_name' => null,
                'role_description' => 'Gugus Kendali Mutu di tingkat Program Studi',
                'icon_class' => 'fas fa-laptop-code',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];
    }
}
