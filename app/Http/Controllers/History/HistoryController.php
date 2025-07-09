<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $history = Report::when($request->month, function ($query) use ($request) {
            $query->whereMonth('date', $request->month);
        })->when($request->year, function ($query) use ($request) {
            $query->whereYear('date', $request->year);
        })->orderBy('date', 'desc')->paginate(10)->appends([
            'month' => $request->month,
            'year' => $request->year,
        ]);;

        $data['filter'] = [
            'year' => $request->year,
            'month' => $request->month,
        ];
        $data['history'] = $history;

        return view('history.index', $data);
    }
}
