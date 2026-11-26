<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

#[Fillable([
    'key',
    'value',
])]
class SiteSetting extends Model
{
    /**
     * Mengambil nilai pengaturan berdasarkan key.
     */
    public static function getValue(string $key, ?string $default = null): ?string
    {
        if (! Schema::hasTable('site_settings')) {
            return $default;
        }

        $value = static::where('key', $key)->value('value');

        return $value !== null && $value !== '' ? (string) $value : $default;
    }

    /**
     * Menyimpan atau memperbarui nilai pengaturan berdasarkan key.
     */
    public static function setValue(string $key, ?string $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    /**
     * Menghasilkan URL gambar publik dari path pengaturan yang tersimpan.
     */
    public static function resolveImageUrl(?string $path): ?string
    {
        $trimmed = trim((string) ($path ?? ''));

        if ($trimmed === '') {
            return null;
        }

        if (str_starts_with($trimmed, 'http://') || str_starts_with($trimmed, 'https://')) {
            return $trimmed;
        }

        $normalized = ltrim($trimmed, '/');

        if (str_starts_with($normalized, 'storage/')) {
            $relativeStoragePath = substr($normalized, strlen('storage/'));
            $sourceFile = storage_path('app/public/'.$relativeStoragePath);
            $publicFile = public_path($normalized);

            if (is_file($sourceFile) && ! is_file($publicFile)) {
                $targetDir = dirname($publicFile);
                if (! is_dir($targetDir)) {
                    @mkdir($targetDir, 0755, true);
                }
                @copy($sourceFile, $publicFile);
            }
        }

        return asset($normalized);
    }
}
