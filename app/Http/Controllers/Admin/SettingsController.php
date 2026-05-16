<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::firstOrCreate([]);
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::firstOrCreate([]);

        $data = $request->validate([
            'site_name'             => 'nullable|string|max:255',
            'site_email'            => 'nullable|email|max:150',
            'support_email'         => 'nullable|email|max:150',
            'support_phone'         => 'nullable|string|max:50',
            'whatsapp_number'       => 'nullable|string|max:50',
            'alternative_phone'     => 'nullable|string|max:50',
            'business_location'     => 'nullable|string|max:255',
            'facebook'              => 'nullable|string|max:255',
            'instagram'             => 'nullable|string|max:255',
            'linkedin'              => 'nullable|string|max:255',
            'tiktok'                => 'nullable|string|max:255',
            'youtube'               => 'nullable|string|max:255',
            'twitter'               => 'nullable|string|max:255',
            'hero_title'            => 'nullable|string|max:255',
            'hero_subtitle'         => 'nullable|string',
            'about_short'           => 'nullable|string',
            'mpesa_paybill'         => 'nullable|string|max:50',
            'mpesa_account_name'    => 'nullable|string|max:100',
            'whatsapp_order_number' => 'nullable|string|max:50',
            'meta_description'      => 'nullable|string|max:500',
            'logo'                  => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:1024',
            'favicon'               => 'nullable|image|mimes:ico,png|max:512',
            'hero_image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        foreach (['logo', 'favicon', 'hero_image'] as $field) {
            if ($request->hasFile($field)) {
                $file     = $request->file($field);
                $clean    = preg_replace('/[^A-Za-z0-9.\-_]/', '_', $file->getClientOriginalName());
                $filename = time() . '_' . $clean;
                $dest     = public_path('uploads/settings');
                File::ensureDirectoryExists($dest, 0755, true);
                $file->move($dest, $filename);
                $data[$field] = $filename;
            }
        }

        $settings->update($data);

        return redirect()->back()->with('success', 'Settings saved.');
    }
}
