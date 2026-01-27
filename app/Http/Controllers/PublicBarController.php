<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PublicBarController extends Controller
{
    public function redirect(string $public_id): RedirectResponse
    {
        $bar = Bar::query()
            ->where('public_id', $public_id)
            ->firstOrFail();

        return redirect()->route('bar.show', ['public_id' => $bar->public_id]);
    }

    public function show(string $public_id): View
    {
        $bar = Bar::query()
            ->with('owner:id,name')
            ->where('public_id', $public_id)
            ->firstOrFail();

        return view('public.bar', [
            'bar' => $bar,
        ]);
    }
}
