<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class PublicOwnerController extends Controller
{
    public function show(User $user): View
    {
        $bars = $user->bars()
            ->orderByDesc('sold_at')
            ->orderByDesc('created_at')
            ->get();

        return view('public.owner', [
            'owner' => $user,
            'bars' => $bars,
        ]);
    }
}
