<?php

namespace Database\Seeders;

use App\Models\QualityDocument;
use Illuminate\Database\Seeder;

class QualityDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (QualityDocument::defaultDocuments() as $doc) {
            QualityDocument::updateOrCreate(
                ['code' => $doc['code']],
                $doc
            );
        }
    }
}
