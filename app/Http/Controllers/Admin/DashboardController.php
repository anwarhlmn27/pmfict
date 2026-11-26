<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\HeroSlider;
use App\Models\News;
use App\Models\OrganizationStructure;
use App\Models\QualityDocument;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard admin beserta ringkasan modul CMS PM FICT.
     */
    public function index(Request $request): View
    {
        $stats = [
            'documents' => Schema::hasTable('quality_documents') ? DB::table('quality_documents')->count() : 20,
            'news' => Schema::hasTable('news') ? DB::table('news')->count() : 3,
            'galleries' => Schema::hasTable('galleries') ? DB::table('galleries')->count() : 10,
            'messages' => Schema::hasTable('contact_messages') ? DB::table('contact_messages')->count() : 0,
            'unread_messages' => Schema::hasTable('contact_messages') ? DB::table('contact_messages')->where('is_read', false)->count() : 0,
            'accreditations' => Schema::hasTable('accreditations') ? DB::table('accreditations')->count() : 2,
        ];

        $documents = Schema::hasTable('quality_documents')
            ? QualityDocument::orderByRaw("CASE category WHEN 'kebijakan' THEN 1 WHEN 'standar' THEN 2 WHEN 'manual' THEN 3 WHEN 'formulir' THEN 4 ELSE 5 END")
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get()
            : collect();

        $newsList = Schema::hasTable('news')
            ? News::orderByDesc('published_at')->orderByDesc('id')->get()
            : collect();

        $messages = Schema::hasTable('contact_messages')
            ? DB::table('contact_messages')->latest('id')->limit(5)->get()
            : collect();

        $users = Schema::hasTable('users')
            ? DB::table('users')->latest('id')->get()
            : collect();

        $heroSliders = Schema::hasTable('hero_sliders')
            ? HeroSlider::orderBy('sort_order')->orderBy('id')->get()
            : collect();

        $galleries = Schema::hasTable('galleries')
            ? Gallery::orderBy('sort_order')->orderBy('id')->get()
            : collect();

        $organizationStructures = Schema::hasTable('organization_structures')
            ? OrganizationStructure::orderBy('sort_order')->orderBy('id')->get()
            : collect();

        $siteSettings = [
            'site_email' => SiteSetting::getValue('site_email', 'pm.fict@horizon.ac.id'),
            'site_phone' => SiteSetting::getValue('site_phone', '(0267) 845-8888'),
            'site_address' => SiteSetting::getValue('site_address', 'Gedung FICT, Kampus Horizon University Indonesia, Jl. Pangkal Perjuangan By Pass KM. 1, Karawang'),
            'site_maps_url' => SiteSetting::getValue('site_maps_url', 'https://maps.app.goo.gl/DDstLPTdgou3sE1q7'),
            'site_visi' => SiteSetting::getValue('site_visi', 'Menjadi unit penjaminan mutu fakultas yang unggul, profesional, dan berintegritas tinggi dalam mengawal perwujudan budaya mutu Tridharma Perguruan Tinggi di bidang teknologi informasi dan komputasi yang berdaya saing nasional maupun internasional.'),
            'ppepp_image_path' => SiteSetting::getValue('ppepp_image_path'),
            'ppepp_image_url' => SiteSetting::resolveImageUrl(SiteSetting::getValue('ppepp_image_path')),
        ];

        return view('admin.dashboard', [
            'user' => $request->user(),
            'stats' => $stats,
            'documents' => $documents,
            'newsList' => $newsList,
            'messages' => $messages,
            'users' => $users,
            'heroSliders' => $heroSliders,
            'galleries' => $galleries,
            'organizationStructures' => $organizationStructures,
            'siteSettings' => $siteSettings,
        ]);
    }
}
