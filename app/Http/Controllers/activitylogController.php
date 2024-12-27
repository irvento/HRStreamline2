<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Carbon\Carbon;

class activitylogController extends Controller
{
    public function index(Request $request)
    {
        // Capture the search input
        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query activity logs with ordering and optional search filters
        $activitylog = ActivityLog::query()
            ->when($search, function ($query, $search) {
                $query->where('id', 'like', "%{$search}%")
                    ->orWhere('user_id', 'like', "%{$search}%")
                    ->orWhere('table_name', 'like', "%{$search}%");
            })
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [Carbon::parse($startDate), Carbon::parse($endDate)]);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        // Return the view with the activity logs
        return view('activitylogs', compact('activitylog', 'search', 'startDate', 'endDate'));
    }
}