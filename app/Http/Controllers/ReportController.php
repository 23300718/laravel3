<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        if ($sort != 'asc' && $sort != 'desc') {
            $sort = 'desc';
        }

        $status = $request->input('status');
        
        $validate = $request->validate([
            'status' => "nullable|exists:statuses,id"
        ]);

        if ($status && $validate) {
            $reports = Report::where('status_id', $status)
                ->where('user_id', Auth::user()->id) 
                ->orderBy('created_at', $sort)
                ->paginate(8); 
        } else {
            $reports = Report::where('user_id', Auth::user()->id) 
                ->orderBy('created_at', $sort)
                ->paginate(8); 
        }

        $statuses = Status::all();

        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
    }

    public function create()
    {
        return view('report.create');
    }

    public function destroy(Report $report)
    {
        if (Auth::user()->id !== $report->user_id) {
            abort(403);
        }

        $report->delete();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|string',
            'description' => 'required|string',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['status_id'] = 1;

        Report::create($data);

        return redirect()->route('report.index');
    }

    public function show(Report $report)
    {
        return view('report.show', compact('report'));
    }

    public function edit(Report $report)
    {
        if (Auth::user()->id === $report->user_id) {
            return view('report.edit', compact('report'));
        } else {
            abort(403, 'У вас нет прав на редактирование этой записи'); 
        }
    }

    public function update(Request $request, Report $report) 
    {
        if (Auth::user()->id !== $report->user_id) {
            abort(403);
        }

        $data = $request->validate([
            'number' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $report->update($data);
        return redirect()->route('report.index');
    }

    public function statusUpdate(Request $request, Report $report)
    {
        if ($report->status_id !== 1) {
            return redirect()->back()->with('error', 'Статус этого заявления уже нельзя изменить');
        }

        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);

        $report->update($request->only(['status_id']));
        return redirect()->back();
    }
}
