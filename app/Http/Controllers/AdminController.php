<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Status;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Report::with('user')->orderBy('created_at', 'desc')->paginate(10);
        $statuses = Status::all();
       
        return view('admin.index', compact('reports', 'statuses'));
    }
    public function updateStatus(Request $request, Report $report)
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id'
        ]);
       
        $report->update(['status_id' => $request->status_id]);
       
        return redirect()->back()->with('success', 'Статус обновлён');
    }
}
