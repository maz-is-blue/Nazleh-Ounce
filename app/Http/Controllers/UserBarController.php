<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserBarController extends Controller
{
    public function index(Request $request): View
    {
        $bars = Bar::query()
            ->where('owner_user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('account.bars.index', [
            'bars' => $bars,
        ]);
    }

    public function show(Request $request, Bar $bar): View
    {
        $this->authorize('view', $bar);

        return view('account.bars.show', [
            'bar' => $bar,
        ]);
    }
}
