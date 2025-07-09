<?php

namespace App\Http\Controllers\Preview;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PreviewController extends Controller
{
    public function index(Request $request)
    {
        $model = Report::when($request->date, function ($query) use ($request) {
            $query->where('date', $request->date);
        })->orderBy('id', 'desc')->first();

        $date = $model->date;

        $summary = $this->summary($date);

        $data = [
            "date" => Carbon::parse($date)->format('d-m-Y'),
            "production" => json_decode($model->production, true),
            "trans" => json_decode($model->mutation, true),
            "issue" => json_decode($model->issue, true),
            "do" => json_decode($model->do, true),
            "summary" => $summary,
        ];

        return view('preview.index', $data);
    }

    public function summary($date)
    {
        $month = Carbon::parse($date)->format('m');
        $year = Carbon::parse($date)->format('Y');

        $model = Report::whereMonth('date', $month)->whereYear('date', $year)->get();

        $data = [];
        foreach ($model as $val) {
            $production = json_decode($val->production, true);
            $trans = json_decode($val->mutation, true);
            $issue = json_decode($val->issue, true);
            $do = json_decode($val->do, true);

            $formulation['blow1'] = number_format(
                (float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0) +

                    (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0) +

                    (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0),
                2
            );

            $formulation['blow2'] = number_format(
                (float)str_replace(',', '', $production['1-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0) +

                    (float)str_replace(',', '', $production['2-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0) +

                    (float)str_replace(',', '', $production['3-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0),
                2
            );

            $formulation['fg'] = [
                'kg' => number_format(
                    (float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0),
                    2
                ),
                '%' => ($t = (
                    (float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0) +

                    (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0) +

                    (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0)
                )) > 0
                    ? number_format(((
                        (float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0)
                    ) / $t) * 100, 2)
                    : '0.00',
            ];

            $formulation['ta'] = [
                'kg' => number_format(
                    (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0),
                    2
                ),
                '%' => ($t = (
                    (float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0) +

                    (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0) +

                    (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0)
                )) > 0
                    ? number_format(((
                        (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0)
                    ) / $t) * 100, 2)
                    : '0.00',
            ];

            $formulation['waste'] = [
                'kg' => number_format(
                    (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0),
                    2
                ),
                '%' => ($t = (
                    (float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0) +

                    (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0) +

                    (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0)
                )) > 0
                    ? number_format(((
                        (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0)
                    ) / $t) * 100, 2)
                    : '0.00',
            ];

            $formulation['rewind'] = number_format(
                (float)str_replace(',', '', $production['1-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0) +

                    (float)str_replace(',', '', $production['2-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0) +

                    (float)str_replace(',', '', $production['3-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0),
                2
            );

            $formulation['wasterewind'] = [
                'kg' => number_format(
                    (float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0) +
                        (float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0) +
                        (float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0),
                    2
                ),
                '%' => ($t = (
                    (float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0) +

                    (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0) +

                    (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) +
                    (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0)
                )) > 0
                    ? number_format(((
                        (float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0) +
                        (float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0) +
                        (float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0)
                    ) / $t) * 100, 2)
                    : '0.00',
            ];


            $formulation['rmtrans'] = number_format(
                (float)str_replace(',', '', $trans['1-bm1']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bm2']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bm3']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bm5']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bma']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bmb']['mts.prod'] ?? 0) +
                    (float)str_replace(',', '', $trans['2-bm1']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bm2']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bm3']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bm5']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bma']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bmb']['mts.prod'] ?? 0) +
                    (float)str_replace(',', '', $trans['3-bm1']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bm2']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bm3']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bm5']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bma']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bmb']['mts.prod'] ?? 0),
                2
            );

            $formulation['rmconst'] = number_format(
                (float)str_replace(',', '', $issue['1']['bm01'] ?? 0) + (float)str_replace(',', '', $issue['1']['bm02'] ?? 0) + (float)str_replace(',', '', $issue['1']['bm03'] ?? 0) + (float)str_replace(',', '', $issue['1']['bm05'] ?? 0) + (float)str_replace(',', '', $issue['1']['bma'] ?? 0) + (float)str_replace(',', '', $issue['1']['bmb'] ?? 0) +
                    (float)str_replace(',', '', $issue['2']['bm01'] ?? 0) + (float)str_replace(',', '', $issue['2']['bm02'] ?? 0) + (float)str_replace(',', '', $issue['2']['bm03'] ?? 0) + (float)str_replace(',', '', $issue['2']['bm05'] ?? 0) + (float)str_replace(',', '', $issue['2']['bma'] ?? 0) + (float)str_replace(',', '', $issue['2']['bmb'] ?? 0) +
                    (float)str_replace(',', '', $issue['3']['bm01'] ?? 0) + (float)str_replace(',', '', $issue['3']['bm02'] ?? 0) + (float)str_replace(',', '', $issue['3']['bm03'] ?? 0) + (float)str_replace(',', '', $issue['3']['bm05'] ?? 0) + (float)str_replace(',', '', $issue['3']['bma'] ?? 0) + (float)str_replace(',', '', $issue['3']['bmb'] ?? 0),
                2
            );

            $formulation['ngr'] = number_format((float)str_replace(',', '', $production['1-total']['ngr'] ?? 0) + (float)str_replace(',', '', $production['2-total']['ngr'] ?? 0) + (float)str_replace(',', '', $production['3-total']['ngr'] ?? 0), 2);

            $formulation['audop'] = number_format((float)str_replace(',', '', $production['1-total']['audop1'] ?? 0) + (float)str_replace(',', '', $production['2-total']['audop1'] ?? 0) + (float)str_replace(',', '', $production['3-total']['audop1'] ?? 0), 2);

            $formulation['audop2'] = number_format((float)str_replace(',', '', $production['1-total']['audop2'] ?? 0) + (float)str_replace(',', '', $production['2-total']['audop2'] ?? 0) + (float)str_replace(',', '', $production['3-total']['audop2'] ?? 0), 2);

            $formulation['plasma'] = number_format((float)str_replace(',', '', $production['1-total']['plasma'] ?? 0) + (float)str_replace(',', '', $production['2-total']['plasma'] ?? 0) + (float)str_replace(',', '', $production['3-total']['plasma'] ?? 0), 2);

            $formulation['dofg'] = $do['fg']['line'] ?? '0.00';
            $formulation['doother'] = $do['other']['line'] ?? '0.00';
            $formulation['dofgr'] = $do['fgr']['line'] ?? '0.00';
            $formulation['dofgm'] = $do['fgm']['line'] ?? '0.00';
            $formulation['dorr'] = $do['rr']['line'] ?? '0.00';
            $formulation['dorm'] = number_format((float)str_replace(',', '', $do['rm']['line'] ?? 0) + (float)str_replace(',', '', $do['rmaddfilm']['line'] ?? 0) + (float)str_replace(',', '', $do['rmldpefilm']['line'] ?? 0) + (float)str_replace(',', '', $do['rmlldpefilm']['line'] ?? 0) + (float)str_replace(',', '', $do['supportingmaterial']['line'] ?? 0), 2);
            $formulation['dowaste'] = $do['waste']['line'] ?? '0.00';
            $formulation['doreturn'] = $do['return']['line'] ?? '0.00';

            $data[] = $formulation;
        }

        $summary = [];
        foreach ($data as $val) {
            $summary['blow1'] = number_format((float)str_replace(',', '', $val['blow1'] ?? 0) + (float)str_replace(',', '', $summary['blow1'] ?? 0), 2);

            $summary['blow2'] = number_format((float)str_replace(',', '', $val['blow2'] ?? 0) + (float)str_replace(',', '', $summary['blow2'] ?? 0), 2);

            $summary['fg']['kg'] = number_format((float)str_replace(',', '', $val['fg']['kg'] ?? 0) + (float)str_replace(',', '', $summary['fg']['kg'] ?? 0), 2);
            $summary['fg']['%'] = ($t = (float)str_replace(',', '', $summary['blow1'] ?? 0)) > 0 ? number_format(((float)str_replace(',', '', $summary['fg']['kg'] ?? 0) / $t ?? 0) * 100, 2) : '0.00';

            $summary['ta']['kg'] = number_format((float)str_replace(',', '', $val['ta']['kg'] ?? 0) + (float)str_replace(',', '', $summary['ta']['kg'] ?? 0), 2);
            $summary['ta']['%'] = ($t = (float)str_replace(',', '', $summary['blow1'] ?? 0)) > 0 ? number_format(((float)str_replace(',', '', $summary['ta']['kg'] ?? 0) / $t ?? 0) * 100, 2) : '0.00';

            $summary['waste']['kg'] = number_format((float)str_replace(',', '', $val['waste']['kg'] ?? 0) + (float)str_replace(',', '', $summary['waste']['kg'] ?? 0), 2);
            $summary['waste']['%'] = ($t = (float)str_replace(',', '', $summary['blow1'] ?? 0)) > 0 ? number_format(((float)str_replace(',', '', $summary['waste']['kg'] ?? 0) / $t ?? 0) * 100, 2) : '0.00';

            $summary['rewind'] = number_format((float)str_replace(',', '', $val['rewind'] ?? 0) + (float)str_replace(',', '', $summary['rewind'] ?? 0), 2);

            $summary['wasterewind']['kg'] = number_format((float)str_replace(',', '', $val['wasterewind']['kg'] ?? 0) + (float)str_replace(',', '', $summary['wasterewind']['kg'] ?? 0), 2);
            $summary['wasterewind']['%'] = ($t = (float)str_replace(',', '', $summary['blow1'] ?? 0)) > 0 ? number_format(((float)str_replace(',', '', $summary['wasterewind']['kg'] ?? 0) / $t ?? 0) * 100, 2) : '0.00';

            $summary['rmtrans'] = number_format((float)str_replace(',', '', $val['rmtrans'] ?? 0) + (float)str_replace(',', '', $summary['rmtrans'] ?? 0), 2);

            $summary['rmconst'] = number_format((float)str_replace(',', '', $val['rmconst'] ?? 0) + (float)str_replace(',', '', $summary['rmconst'] ?? 0), 2);

            $summary['nrg'] = number_format((float)str_replace(',', '', $val['nrg'] ?? 0) + (float)str_replace(',', '', $summary['ngr'] ?? 0), 2);

            $summary['audop'] = number_format((float)str_replace(',', '', $val['audop'] ?? 0) + (float)str_replace(',', '', $summary['audop'] ?? 0), 2);

            $summary['audop2'] = number_format((float)str_replace(',', '', $val['audop2'] ?? 0) + (float)str_replace(',', '', $summary['audop2'] ?? 0), 2);

            $summary['plasma'] = number_format((float)str_replace(',', '', $val['plasma'] ?? 0) + (float)str_replace(',', '', $summary['plasma'] ?? 0), 2);

            $summary['dofg'] = number_format((float)str_replace(',', '', $val['dofg'] ?? 0) + (float)str_replace(',', '', $summary['dofg'] ?? 0), 2);

            $summary['doother'] = number_format((float)str_replace(',', '', $val['doother'] ?? 0) + (float)str_replace(',', '', $summary['doother'] ?? 0), 2);

            $summary['dofgr'] = number_format((float)str_replace(',', '', $val['dofgr'] ?? 0) + (float)str_replace(',', '', $summary['dofgr'] ?? 0), 2);

            $summary['dofgm'] = number_format((float)str_replace(',', '', $val['dofgm'] ?? 0) + (float)str_replace(',', '', $summary['dofgm'] ?? 0), 2);

            $summary['dorr'] = number_format((float)str_replace(',', '', $val['dorr'] ?? 0) + (float)str_replace(',', '', $summary['dorr'] ?? 0), 2);

            $summary['dorm'] = number_format((float)str_replace(',', '', $val['dorm'] ?? 0) + (float)str_replace(',', '', $summary['dorm'] ?? 0), 2);

            $summary['dowaste'] = number_format((float)str_replace(',', '', $val['dowaste'] ?? 0) + (float)str_replace(',', '', $summary['dowaste'] ?? 0), 2);

            $summary['doreturn'] = number_format((float)str_replace(',', '', $val['doreturn'] ?? 0) + (float)str_replace(',', '', $summary['doreturn'] ?? 0), 2);
        }

        return $summary;
    }
}
