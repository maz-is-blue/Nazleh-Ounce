<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminContentController extends Controller
{
    public function update(Request $request, ContentService $contentService): RedirectResponse
    {
        $data = $request->validate([
            'content' => ['required', 'array'],
        ]);

        $content = $data['content'];
        $contentService->saveContent($content);

        return redirect()
            ->back()
            ->with('status', 'Content updated.');
    }
}
