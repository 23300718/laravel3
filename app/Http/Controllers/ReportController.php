<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class ReportController extends Controller
{
public function index(Request $request)
{
    $sort = $request->input('sort');
    if($sort != 'asc' && $sort != 'desc'){
        $sort = 'desc';
    }

    $status = $request->input('status');
    $validate = $request->validate([
        'status' => "exists:statuses,id"
    ]);
    if($validate){
        $reports = Report::where('status_id', $status)
                 ->OrderBy('created_at', $sort)
                 ->paginate(3);
    } else {
        $reports = Report::orderBy('created_at', $sort)
                 ->paginate(3);
    }

    $statuses = Status::all();

    return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
}

public function create(){
    return view('report.create');
}
public function destroy(Report $report)
{
    $report->delete();
    return redirect()->back();
}
public function store(Request $request)
{
    $data = $request->validate([
        'number' => 'string',
        'description' => 'string',
    ]);

    \App\Models\Report::create($data);

    return redirect()->back();
}

public function show(Report $report)
{
    return view('report.show', compact('report'));
}

public function edit(Report $report){
    return view('report.edit', compact('report'));
}
public function update(Request $request, Report $report) 
{
    $data = $request->validate([
        'number' => 'string',
        'description' => 'string',
    ]);

    $report->update($data);
    return redirect()->back();
}
}