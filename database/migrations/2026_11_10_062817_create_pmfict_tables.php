<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tambahkan kolom role pada tabel users jika belum ada
        if (Schema::hasTable('users') && ! Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role', 30)->default('admin')->after('email');
            });
        }

        // 1. Tabel Dokumen Mutu (Kebijakan, Standar, Manual, Formulir)
        Schema::create('quality_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['kebijakan', 'standar', 'manual', 'formulir'])->index();
            $table->string('code', 50)->unique(); // Contoh: KBJ-SPMI-01, STD-SPMI-01
            $table->string('title');
            $table->string('edition', 100)->nullable(); // Contoh: Versi 2026, SK Dekan 2026
            $table->string('file_path');
            $table->string('file_type', 30)->default('PDF'); // Contoh: PDF, DOCX, XLSX
            $table->string('file_size', 30)->nullable(); // Contoh: 2.4 MB
            $table->unsignedInteger('download_count')->default(0);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2. Tabel Berita & Agenda Mutu
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category_badge', 50)->default('SPMI'); // Contoh: SPMI, LAMINFOKOM, RTM
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('thumbnail')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
        });

        // 3. Tabel Galeri Rapat & Kegiatan Mutu
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('badge', 50)->default('SPMI'); // Contoh: SPMI, GKM, CPL, RTM, AMI
            $table->string('image_path');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        // 4. Tabel Akreditasi SPME (BAN-PT & LAMINFOKOM)
        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();
            $table->string('institution_or_prodi'); // Contoh: S1 Informatika, S1 Sistem Informasi
            $table->enum('agency', ['BAN-PT', 'LAMINFOKOM'])->index();
            $table->string('grade', 50); // Contoh: Unggul, Baik Sekali, Baik
            $table->string('sk_number')->nullable();
            $table->date('valid_until')->nullable();
            $table->string('certificate_file')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 5. Tabel Struktur Organisasi Penjaminan Mutu
        Schema::create('organization_structures', function (Blueprint $table) {
            $table->id();
            $table->string('position_title'); // Contoh: Dekan FICT, Ketua Gugus Mutu
            $table->string('person_name')->nullable();
            $table->string('role_description')->nullable();
            $table->string('icon_class', 100)->default('fas fa-user-tie');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 6. Tabel Hero Slider Halaman Utama
        Schema::create('hero_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('badge_text')->nullable();
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->string('primary_btn_text', 100)->nullable();
            $table->string('primary_btn_url')->nullable();
            $table->string('secondary_btn_text', 100)->nullable();
            $table->string('secondary_btn_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        // 7. Tabel Pengaturan Profil, Visi-Misi, & Kontak (Key-Value)
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key', 100)->unique(); // Contoh: visi, misi, address, phone, email, maps_url
            $table->longText('value')->nullable();
            $table->timestamps();
        });

        // 8. Tabel Pesan Masuk dari Halaman Kontak Kami
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('email', 150);
            $table->string('phone', 30)->nullable();
            $table->string('subject', 200);
            $table->text('message');
            $table->boolean('is_read')->default(false)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('site_settings');
        Schema::dropIfExists('hero_sliders');
        Schema::dropIfExists('organization_structures');
        Schema::dropIfExists('accreditations');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('news');
        Schema::dropIfExists('quality_documents');
    }
};
