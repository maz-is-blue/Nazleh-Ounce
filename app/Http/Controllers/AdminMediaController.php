<?php

namespace App\Http\Controllers;

use App\Models\MediaImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    public function update(Request $request, MediaImage $mediaImage): RedirectResponse
    {
        $data = $request->validate([
            'url' => ['required', 'url'],
        ]);

        $mediaImage->update([
            'url' => $data['url'],
        ]);

        return redirect()
            ->back()
            ->with('status', 'Media updated.');
    }
}
