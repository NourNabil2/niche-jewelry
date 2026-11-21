<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charm;
use App\Models\CustomDesign;
use App\Models\Setting;

class StudioController extends Controller
{
    public function index()
    {
        $charms = Charm::where('is_active', true)->get();
        $enableLaserEngraving = Setting::get('enable_laser_engraving', true);
        return view('customizer', compact('charms', 'enableLaserEngraving'));
    }

    public function saveDesign(Request $request)
    {
        $validated = $request->validate([
            'metal_finish' => 'required|string',
            'wrist_size' => 'required|string',
            'front_track' => 'required|array',
            'back_track' => 'required|array',
            'engraving_text' => 'nullable|string|max:60',
            'engraving_font' => 'nullable|string|max:40',
            'total_price' => 'required|numeric',
            'thumbnail' => 'nullable|string',
        ]);

        $design = CustomDesign::create([
            'share_token' => bin2hex(random_bytes(16)),
            'metal_finish' => $validated['metal_finish'],
            'wrist_size' => $validated['wrist_size'],
            'front_track' => $validated['front_track'],
            'back_track' => $validated['back_track'],
            'engraving_text' => $validated['engraving_text'] ?? null,
            'engraving_font' => $validated['engraving_font'] ?? 'roman',
            'total_price' => $validated['total_price'],
            'thumbnail' => $validated['thumbnail'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'share_token' => $design->share_token,
            'design_id' => $design->id,
        ]);
    }
}
