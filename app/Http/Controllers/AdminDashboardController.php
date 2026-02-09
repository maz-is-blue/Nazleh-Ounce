<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use App\Models\BarOwnershipEvent;
use App\Models\MediaImage;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function show(): View
    {
        $stats = [
            'total_users' => User::count(),
            'total_bars' => Bar::count(),
            'sold_bars' => Bar::where('status', 'sold')->count(),
            'ownership_events' => BarOwnershipEvent::count(),
        ];

        $recentUsers = User::query()
            ->orderByDesc('created_at')
            ->limit(5)
            ->get(['id', 'name', 'email', 'created_at']);

        $recentBars = Bar::query()
            ->with('owner:id,name')
            ->orderByDesc('created_at')
            ->limit(8)
            ->get();

        $recentPurchases = Bar::query()
            ->with('owner:id,name,email')
            ->where('status', 'sold')
            ->orderByDesc('sold_at')
            ->limit(8)
            ->get();

        $recentVerifications = Bar::query()
            ->with('owner:id,name,email')
            ->orderByDesc('updated_at')
            ->limit(8)
            ->get();

        $recentAssignments = BarOwnershipEvent::query()
            ->with(['bar:id,public_id,metal_type,weight', 'toUser:id,name,email'])
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'recentUsers' => $recentUsers,
            'recentBars' => $recentBars,
            'recentPurchases' => $recentPurchases,
            'recentVerifications' => $recentVerifications,
            'recentAssignments' => $recentAssignments,
            'mediaImages' => MediaImage::orderBy('name')->get(),
        ]);
    }
}
