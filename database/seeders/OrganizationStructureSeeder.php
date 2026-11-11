<?php

namespace Database\Seeders;

use App\Models\OrganizationStructure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OrganizationStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! Schema::hasTable('organization_structures')) {
            return;
        }

        foreach (OrganizationStructure::defaultItems() as $item) {
            OrganizationStructure::updateOrCreate(
                ['position_title' => $item['position_title']],
                $item
            );
        }
    }
}
