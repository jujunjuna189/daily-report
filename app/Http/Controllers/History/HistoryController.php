<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $history = Report::orderBy('date', 'desc')->paginate(10);

        $data['history'] = $history;

        return view('history.index', $data);
    }
}
