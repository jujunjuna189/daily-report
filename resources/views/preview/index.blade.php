@extends('layouts.app', ['nav_bar' => false])

@section('content')
<div class="">
    <div class="bg-white mb-10">
        <div class="flex items-center justify-between pt-4 px-4 print:px-0 pb-2">
            <div>
                <div class="px-3">
                    <img src="{{ asset('assets/logo/logo.png') }}" alt="Logo" class="h-15">
                </div>
                <div class="flex items-center gap-4 mt-2 text-xs">
                    <div class="bg-slate-300 px-3 py-1">
                        <span class="font-medium">Effective Date</span>
                    </div>
                    <span>{{$date}}</span>
                </div>
            </div>
            <h1 class="text-3xl font-bold">DAILY REPORT</h1>
            <div class="">
                <div class="print:hidden">
                    <button type="button" class="bg-slate-700 text-white rounded-sm py-1 px-8 font-medium cursor-pointer" onclick="window.print()">
                        Print
                    </button>
                </div>
            </div>
        </div>
        <div class="overflow-auto text-xs mx-4 print:mx-0">
            <table class="table-auto border-collapse border border-black min-w-[100%] text-center">
                <thead>
                    <tr class="bg-[#FFD800] font-bold">
                        <th class="border border-black px-2 py-1" rowspan="2">SHIFT</th>
                        <th class="border border-black px-2 py-1" rowspan="2">STATUS</th>
                        <th class="border border-black px-2 py-1" rowspan="2">BM01</th>
                        <th class="border border-black px-2 py-1" rowspan="2">BM02</th>
                        <th class="border border-black px-2 py-1" rowspan="2">BM03</th>
                        <th class="border border-black px-2 py-1" rowspan="2">BM05</th>
                        <th class="border border-black px-2 py-1" rowspan="2">BM0A</th>
                        <th class="border border-black px-2 py-1" rowspan="2">BM0B</th>
                        <th class="border border-black px-2 py-1" rowspan="2">SUM BLOW 1</th>

                        <th class="border border-black px-2 py-1" rowspan="2">BM0M</th>
                        <th class="border border-black px-2 py-1" rowspan="2">BM0P</th>
                        <th class="border border-black px-2 py-1" rowspan="2">BM0R</th>
                        <th class="border border-black px-2 py-1" rowspan="2">SUM BLOW 2</th>
                        <th class="border border-black px-2 py-1" rowspan="2">RW01</th>
                        <th class="border border-black px-2 py-1" rowspan="2">RW02</th>
                        <th class="border border-black px-2 py-1" rowspan="2">RW03</th>
                        <th class="border border-black px-2 py-1" rowspan="2">RW05</th>
                        <th class="border border-black px-2 py-1" rowspan="2">SUM REWIND</th>

                        <th class="border border-black px-2 py-1" rowspan="2">RW0M</th>
                        <th class="border border-black px-2 py-1" rowspan="2">NGR</th>
                        <th class="border border-black px-2 py-1" rowspan="2">AUDOP</th>
                        <th class="border border-black px-2 py-1" rowspan="2">AUDOP 2</th>
                        <th class="border border-black px-2 py-1" rowspan="2">PLASMA</th>
                        <th class="border border-black px-2 py-1" colspan="8">DELIVERY</th>
                    </tr>
                    <tr class="bg-[#FFD800] font-bold">
                        <th class="border border-black px-2 py-1">FG</th>
                        <th class="border border-black px-2 py-1">OTHER</th>
                        <th class="border border-black px-2 py-1">FGR</th>
                        <th class="border border-black px-2 py-1">FGM</th>
                        <th class="border border-black px-2 py-1">RR</th>
                        <th class="border border-black px-2 py-1">RM</th>
                        <th class="border border-black px-2 py-1">WASTE</th>
                        <th class="border border-black px-2 py-1">RETURN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1" rowspan="9">1</th>
                        <th class="border border-black px-2 py-1 text-nowrap">NO STATUS</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['1-total']['ngr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['1-total']['audop1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['1-total']['audop2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['1-total']['plasma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="27"></th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="27"></th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="27"></th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="27"></th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="27"></th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="27"></th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="27"></th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="27"></th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">FG</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ok']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">REJECT</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['1-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['1-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-reject']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">TA</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['1-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['1-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-ta']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">WASTE</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['1-waste']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">SUB TOTAL</th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format(
                            (float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format(
                            (float)str_replace(',', '', $production['1-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['1-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['1-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['1-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['1-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format(
                            (float)str_replace(',', '', $production['1-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['1-ok']['rwm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rwm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rwm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rwm'] ?? 0), 2) }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">% WASTE</th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ ($t = (
                            (float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) +

                            (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) +

                            (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) +

                            (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) +

                            (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) +

                            (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0)
                        )) > 0
                            ? number_format((
                                (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) +
                                (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) +
                                (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) +
                                (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) +
                                (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) +
                                (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0)
                            ) / $t, 2)
                            : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ ($t = (
                            (float)str_replace(',', '', $production['1-ok']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0) +

                            (float)str_replace(',', '', $production['1-ok']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0) +

                            (float)str_replace(',', '', $production['1-ok']['bmr'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['bmr'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['bmr'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0)
                        )) > 0
                            ? number_format((
                                (float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0) +
                                (float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0) +
                                (float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0)
                            ) / $t, 2)
                            : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ ($t = (
                            (float)str_replace(',', '', $production['1-ok']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0) +

                            (float)str_replace(',', '', $production['1-ok']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0) +

                            (float)str_replace(',', '', $production['1-ok']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0) +

                            (float)str_replace(',', '', $production['1-ok']['rw5'] ?? 0) +
                            (float)str_replace(',', '', $production['1-reject']['rw5'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ta']['rw5'] ?? 0) +
                            (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0)
                        )) > 0
                            ? number_format(((
                                (float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0) +
                                (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0) +
                                (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0) +
                                (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0)
                            ) / $t) * 100, 2)
                            : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['1-ok']['rwm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rwm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rwm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rwm'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['1-waste']['rwm'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">RM TRANS</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['1-bm1']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['1-bm2']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['1-bm3']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['1-bm5']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['1-bma']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['1-bmb']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">
                            {{ number_format((float)str_replace(',', '', $trans['1-bm1']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bm2']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bm3']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bm5']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bma']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bmb']['mts.prod'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['1-bmm']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['1-bmp']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['1-bmr']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">
                            {{ number_format((float)str_replace(',', '', $trans['1-bmm']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bmp']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bmr']['mts.prod'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1" rowspan="2"></th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">RM CONST</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['1']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['1']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['1']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['1']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['1']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['1']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ number_format((float)str_replace(',', '', $issue['1']['bm01'] ?? 0) + (float)str_replace(',', '', $issue['1']['bm02'] ?? 0) + (float)str_replace(',', '', $issue['1']['bm03'] ?? 0) + (float)str_replace(',', '', $issue['1']['bm05'] ?? 0) + (float)str_replace(',', '', $issue['1']['bma'] ?? 0) + (float)str_replace(',', '', $issue['1']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['1']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['1']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['1']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ number_format((float)str_replace(',', '', $issue['1']['bmm'] ?? 0) + (float)str_replace(',', '', $issue['1']['bmp'] ?? 0) + (float)str_replace(',', '', $issue['1']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['1']['rw1'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['1']['rw2'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['1']['rw3'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['1']['rw5'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $issue['1']['rw1'] ?? 0) + (float)str_replace(',', '', $issue['1']['rw2'] ?? 0) + (float)str_replace(',', '', $issue['1']['rw3'] ?? 0) + (float)str_replace(',', '', $issue['1']['rw5'] ?? 0), 2) }}
                        </th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1" rowspan="9">2</th>
                        <th class="border border-black px-2 py-1">NO STATUS</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['2-total']['ngr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['2-total']['audop1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['2-total']['audop2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['2-total']['plasma'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">FG</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ok']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">REJECT</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['2-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['2-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-reject']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">TA</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['2-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['2-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-ta']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">WASTE</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['2-waste']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">SUB TOTAL</th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format(
                            (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['2-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format(
                            (float)str_replace(',', '', $production['2-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['2-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['2-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['2-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['2-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format(
                            (float)str_replace(',', '', $production['2-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['2-ok']['rwm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rwm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rwm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rwm'] ?? 0), 2) }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">% WASTE</th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ ($t = (
                            (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0)
                        )) > 0
                            ? number_format(((
                                (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) +
                                (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) +
                                (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) +
                                (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) +
                                (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) +
                                (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0)
                            ) / $t) * 100, 2)
                            : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ ($t = (
                            (float)str_replace(',', '', $production['2-ok']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['bmr'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['bmr'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['bmr'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0)
                        )) > 0
                            ? number_format(((
                                (float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0) +
                                (float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0) +
                                (float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0)
                            ) / $t) * 100, 2)
                            : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ ($t = (
                            (float)str_replace(',', '', $production['2-ok']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['rw5'] ?? 0) +
                            (float)str_replace(',', '', $production['2-reject']['rw5'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ta']['rw5'] ?? 0) +
                            (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0)
                        )) > 0
                            ? number_format(((
                                (float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0) +
                                (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0) +
                                (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0) +
                                (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0)
                            ) / $t) * 100, 2)
                            : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['2-ok']['rwm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rwm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rwm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rwm'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['2-waste']['rwm'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">RM TRANS</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['2-bm1']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['2-bm2']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['2-bm3']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['2-bm5']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['2-bma']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['2-bmb']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">
                            {{ number_format((float)str_replace(',', '', $trans['2-bm1']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bm2']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bm3']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bm5']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bma']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bmb']['mts.prod'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['2-bmm']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['2-bmp']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['2-bmr']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">
                            {{ number_format((float)str_replace(',', '', $trans['2-bmm']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bmp']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bmr']['mts.prod'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1" rowspan="2"></th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">RM CONST</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['2']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['2']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['2']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['2']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['2']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['2']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ number_format((float)str_replace(',', '', $issue['2']['bm01'] ?? 0) + (float)str_replace(',', '', $issue['2']['bm02'] ?? 0) + (float)str_replace(',', '', $issue['2']['bm03'] ?? 0) + (float)str_replace(',', '', $issue['2']['bm05'] ?? 0) + (float)str_replace(',', '', $issue['2']['bma'] ?? 0) + (float)str_replace(',', '', $issue['2']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['2']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['2']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['2']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ number_format((float)str_replace(',', '', $issue['2']['bmm'] ?? 0) + (float)str_replace(',', '', $issue['2']['bmp'] ?? 0) + (float)str_replace(',', '', $issue['2']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['2']['rw1'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['2']['rw2'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['2']['rw3'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['2']['rw5'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $issue['2']['rw1'] ?? 0) + (float)str_replace(',', '', $issue['2']['rw2'] ?? 0) + (float)str_replace(',', '', $issue['2']['rw3'] ?? 0) + (float)str_replace(',', '', $issue['2']['rw5'] ?? 0), 2) }}
                        </th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1" rowspan="9">3</th>
                        <th class="border border-black px-2 py-1">NO STATUS</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal">0.00</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['3-total']['ngr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['3-total']['audop1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['3-total']['audop2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal" rowspan="9">{{ $production['3-total']['plasma'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">FG</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ok']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">REJECT</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['3-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['3-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-reject']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">TA</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['3-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['3-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-ta']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">WASTE</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format((float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format((float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['rw1'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['rw2'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['rw3'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['rw5'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ $production['3-waste']['rwm'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">SUB TOTAL</th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ number_format(
                            (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ number_format(
                            (float)str_replace(',', '', $production['3-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['3-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['3-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['3-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal">{{ number_format((float)str_replace(',', '', $production['3-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ number_format(
                            (float)str_replace(',', '', $production['3-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ number_format((float)str_replace(',', '', $production['3-ok']['rwm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rwm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rwm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rwm'] ?? 0), 2) }}
                        </th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">% WASTE</th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#BDB86A]">
                            {{ ($t = (
                            (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0)
                        )) > 0
                            ? number_format(((
                                (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) +
                                (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) +
                                (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) +
                                (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) +
                                (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) +
                                (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0)
                            ) / $t) * 100, 2)
                            : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#F0E68D]">
                            {{ ($t = (
                            (float)str_replace(',', '', $production['3-ok']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['bmr'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['bmr'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['bmr'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0)
                        )) > 0
                            ? number_format(((
                                (float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0) +
                                (float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0) +
                                (float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0)
                            ) / $t) * 100, 2)
                            : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal bg-[#808000]">
                            {{ ($t = (
                            (float)str_replace(',', '', $production['3-ok']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['rw1'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['rw2'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['rw3'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['rw5'] ?? 0) +
                            (float)str_replace(',', '', $production['3-reject']['rw5'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ta']['rw5'] ?? 0) +
                            (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0)
                        )) > 0
                            ? number_format(((
                                (float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0) +
                                (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0) +
                                (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0) +
                                (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0)
                            ) / $t) * 100, 2)
                            : '0.00' }}%
                        </th>
                        <th class="border border-black px-2 py-1 font-normal">
                            {{ ($t = ((float)str_replace(',', '', $production['3-ok']['rwm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rwm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rwm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rwm'] ?? 0))) > 0 ? number_format(((float)str_replace(',', '', $production['3-waste']['rwm'] ?? 0) / $t) * 100, 2) : '0.00' }}%
                        </th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">RM TRANS</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['3-bm1']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['3-bm2']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['3-bm3']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['3-bm5']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['3-bma']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['3-bmb']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">
                            {{ number_format((float)str_replace(',', '', $trans['3-bm1']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bm2']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bm3']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bm5']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bma']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bmb']['mts.prod'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['3-bmm']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['3-bmp']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $trans['3-bmr']['mts.prod'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#5F9FA0]">
                            {{ number_format((float)str_replace(',', '', $trans['3-bmm']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bmp']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bmr']['mts.prod'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1"></th>
                        <th class="border border-black px-2 py-1" rowspan="2"></th>
                    </tr>
                    <tr class="font-bold">
                        <th class="border border-black px-2 py-1">RM CONST</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['3']['bm01'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['3']['bm02'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['3']['bm03'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['3']['bm05'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['3']['bma'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['3']['bmb'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ number_format((float)str_replace(',', '', $issue['3']['bm01'] ?? 0) + (float)str_replace(',', '', $issue['3']['bm02'] ?? 0) + (float)str_replace(',', '', $issue['3']['bm03'] ?? 0) + (float)str_replace(',', '', $issue['3']['bm05'] ?? 0) + (float)str_replace(',', '', $issue['3']['bma'] ?? 0) + (float)str_replace(',', '', $issue['3']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['3']['bmm'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['3']['bmp'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $issue['3']['bmr'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ number_format((float)str_replace(',', '', $issue['3']['bmm'] ?? 0) + (float)str_replace(',', '', $issue['3']['bmp'] ?? 0) + (float)str_replace(',', '', $issue['3']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['3']['rw1'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['3']['rw2'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['3']['rw3'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#B0E0E6]">
                            {{ $issue['3']['rw5'] ?? '0.00' }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#808000]">
                            {{ number_format((float)str_replace(',', '', $issue['3']['rw1'] ?? 0) + (float)str_replace(',', '', $issue['3']['rw2'] ?? 0) + (float)str_replace(',', '', $issue['3']['rw3'] ?? 0) + (float)str_replace(',', '', $issue['3']['rw5'] ?? 0), 2) }}
                        </th>
                    </tr>
                    <tr class="font-bold bg-[#F3A55F]">
                        <th class="border border-black px-2 py-1" colspan="2">TOTAL</th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format(
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
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format(
                            (float)str_replace(',', '', $production['1-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['1-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0) +

                            (float)str_replace(',', '', $production['2-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['2-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0) +

                            (float)str_replace(',', '', $production['3-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0) +
                            (float)str_replace(',', '', $production['3-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format(
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
                            (float)str_replace(',', '', $production['3-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0)
                        , 2) }}
                        </th>
                        <th class="border border-black px-2 py-1">
                            {{ number_format((float)str_replace(',', '', $production['1-ok']['rwm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['rwm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['rwm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rwm'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['rwm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['rwm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['rwm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rwm'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['rwm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rwm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rwm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rwm'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#87CEEB]">
                            {{ number_format((float)str_replace(',', '', $production['1-total']['ngr'] ?? 0) + (float)str_replace(',', '', $production['2-total']['ngr'] ?? 0) + (float)str_replace(',', '', $production['3-total']['ngr'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#87CEEB]">
                            {{ number_format((float)str_replace(',', '', $production['1-total']['audop1'] ?? 0) + (float)str_replace(',', '', $production['2-total']['audop1'] ?? 0) + (float)str_replace(',', '', $production['3-total']['audop1'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#87CEEB]">
                            {{ number_format((float)str_replace(',', '', $production['1-total']['audop2'] ?? 0) + (float)str_replace(',', '', $production['2-total']['audop2'] ?? 0) + (float)str_replace(',', '', $production['3-total']['audop2'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#87CEEB]">
                            {{ number_format((float)str_replace(',', '', $production['1-total']['plasma'] ?? 0) + (float)str_replace(',', '', $production['2-total']['plasma'] ?? 0) + (float)str_replace(',', '', $production['3-total']['plasma'] ?? 0), 2) }}
                        </th>
                        <th class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['fg']['line'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['other']['line'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['fgr']['line'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['fgm']['line'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['rr']['line'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#90EE91]">{{ number_format((float)str_replace(',', '', $do['rm']['line'] ?? 0) + (float)str_replace(',', '', $do['rmaddfilm']['line'] ?? 0) + (float)str_replace(',', '', $do['rmldpefilm']['line'] ?? 0) + (float)str_replace(',', '', $do['rmlldpefilm']['line'] ?? 0) + (float)str_replace(',', '', $do['supportingmaterial']['line'] ?? 0), 2) }}</th>
                        <th class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['waste']['line'] ?? '0.00' }}</th>
                        <th class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['return']['line'] ?? '0.00' }}</th>
                    </tr>
                    <tr class="font-bold bg-[#F3A55F]">
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]" colspan="2">OEE</th>
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]">0.00</th>
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]">0.00</th>
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]">0.00</th>
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]">0.00</th>
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]">0.00</th>
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]">0.00</th>
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]" colspan="11"></th>
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]">0.00</th>
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]">0.00</th>
                        <th class="border border-black px-2 py-1 bg-[#40E0D0]">0.00</th>
                    </tr>
                </tbody>
            </table>
            <!-- Sum Harian -->
            <table class="table-auto border-collapse border border-black min-w-[100%] text-center mt-3">
                <thead>
                    <tr class="bg-[#FFD800] font-bold">
                        <th class="border border-black px-2 py-1" rowspan="2">BLOW 1 HARIAN</th>
                        <th class="border border-black px-2 py-1" rowspan="2">BLOW 2 HARIAN</th>
                        <th class="border border-black px-2 py-1" colspan="2">FG HARIAN (a)</th>
                        <th class="border border-black px-2 py-1" colspan="2">TA/HOLD HARIAN (b)</th>
                        <th class="border border-black px-2 py-1" colspan="2">WASTE/REJECT HARIAN (c)</th>
                        <th class="border border-black px-2 py-1" colspan="2">NO STATUS HARIAN (d)</th>
                        <th class="border border-black px-2 py-1" rowspan="2">REWIND HARIAN (e)</th>
                        <th class="border border-black px-2 py-1" colspan="2">WASTE REWIND HARIAN (f)</th>
                        <th class="border border-black px-2 py-1" rowspan="2">RM TRANSFER HARIAN</th>
                        <th class="border border-black px-2 py-1" rowspan="2">RM CONST. HARIAN</th>
                        <th class="border border-black px-2 py-1" rowspan="2">NGR HARIAN</th>
                        <th class="border border-black px-2 py-1" rowspan="2">AUDOP HARIAN</th>
                        <th class="border border-black px-2 py-1" rowspan="2">AUDOP 2 HARIAN</th>
                        <th class="border border-black px-2 py-1" rowspan="2">PLASMA HARIAN</th>
                        <th class="border border-black px-2 py-1" colspan="8">DELIVERY HARIAN</th>
                    </tr>
                    <tr class="bg-[#FFD800] font-bold">
                        <th class="border border-black px-2 py-1">kg</th>
                        <th class="border border-black px-2 py-1">%</th>
                        <th class="border border-black px-2 py-1">kg</th>
                        <th class="border border-black px-2 py-1">%</th>
                        <th class="border border-black px-2 py-1">kg</th>
                        <th class="border border-black px-2 py-1">%</th>
                        <th class="border border-black px-2 py-1">kg</th>
                        <th class="border border-black px-2 py-1">%</th>
                        <th class="border border-black px-2 py-1">kg</th>
                        <th class="border border-black px-2 py-1">%</th>
                        <th class="border border-black px-2 py-1">FG</th>
                        <th class="border border-black px-2 py-1">OTHER</th>
                        <th class="border border-black px-2 py-1">FGR</th>
                        <th class="border border-black px-2 py-1">FGM</th>
                        <th class="border border-black px-2 py-1">RR</th>
                        <th class="border border-black px-2 py-1">RM</th>
                        <th class="border border-black px-2 py-1">WASTE</th>
                        <th class="border border-black px-2 py-1">RETURN</th>
                    </tr>
                </thead>
                <tbody>
                    <td class="border border-black px-2 py-1 bg-[#BDB86A]">
                        {{ number_format(
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
                        , 2) }}
                    </td>
                    <td class="border border-black px-2 py-1 bg-[#F0E68D]">
                        {{ number_format(
                        (float)str_replace(',', '', $production['1-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmm'] ?? 0) +
                        (float)str_replace(',', '', $production['1-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmp'] ?? 0) +
                        (float)str_replace(',', '', $production['1-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmr'] ?? 0) +

                        (float)str_replace(',', '', $production['2-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmm'] ?? 0) +
                        (float)str_replace(',', '', $production['2-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmp'] ?? 0) +
                        (float)str_replace(',', '', $production['2-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmr'] ?? 0) +

                        (float)str_replace(',', '', $production['3-ok']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmm'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmm'] ?? 0) +
                        (float)str_replace(',', '', $production['3-ok']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmp'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmp'] ?? 0) +
                        (float)str_replace(',', '', $production['3-ok']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmr'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmr'] ?? 0)
                    , 2) }}
                    </td>
                    <td class="border border-black px-2 py-1">
                        {{ number_format(
                        (float)str_replace(',', '', $production['1-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ok']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['2-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ok']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['3-ok']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ok']['bmb'] ?? 0)
                    , 2) }}
                    </td>
                    <td class="border border-black px-2 py-1">
                        {{ ($t = (
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
                        : '0.00' }}%
                    </td>
                    <td class="border border-black px-2 py-1">
                        {{ number_format(
                        (float)str_replace(',', '', $production['1-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-ta']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['2-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-ta']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['3-ta']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['bmb'] ?? 0)
                    , 2) }}
                    </td>
                    <td class="border border-black px-2 py-1">
                        {{ ($t = (
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
                        : '0.00' }}%
                    </td>
                    <td class="border border-black px-2 py-1">
                        {{ number_format(
                        (float)str_replace(',', '', $production['1-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['2-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $production['3-waste']['bm01'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm02'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm03'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bm05'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bma'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['bmb'] ?? 0)
                    , 2) }}
                    </td>
                    <td class="border border-black px-2 py-1">
                        {{ ($t = (
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
                        : '0.00' }}%
                    </td>
                    <td class="border border-black px-2 py-1">0.00</td>
                    <td class="border border-black px-2 py-1">0.00</td>
                    <td class="border border-black px-2 py-1">
                        {{ number_format(
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
                        (float)str_replace(',', '', $production['3-ok']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-reject']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-ta']['rw5'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0)
                    , 2) }}
                    </td>
                    <td class="border border-black px-2 py-1">
                        {{ number_format(
                        (float)str_replace(',', '', $production['1-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['1-waste']['rw5'] ?? 0) +
                        (float)str_replace(',', '', $production['2-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['2-waste']['rw5'] ?? 0) +
                        (float)str_replace(',', '', $production['3-waste']['rw1'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw2'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw3'] ?? 0) + (float)str_replace(',', '', $production['3-waste']['rw5'] ?? 0)
                    , 2) }}
                    </td>
                    <td class="border border-black px-2 py-1">
                        {{ ($t = (
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
                        : '0.00' }}%
                    </td>
                    <td class="border border-black px-2 py-1 bg-[#5F9FA0]">
                        {{ number_format(
                    (float)str_replace(',', '', $trans['1-bm1']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bm2']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bm3']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bm5']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bma']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['1-bmb']['mts.prod'] ?? 0) +
                    (float)str_replace(',', '', $trans['2-bm1']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bm2']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bm3']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bm5']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bma']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['2-bmb']['mts.prod'] ?? 0) +
                    (float)str_replace(',', '', $trans['3-bm1']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bm2']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bm3']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bm5']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bma']['mts.prod'] ?? 0) + (float)str_replace(',', '', $trans['3-bmb']['mts.prod'] ?? 0)
                , 2) }}
                    </td>
                    <td class="border border-black px-2 py-1 bg-[#B0E0E6]">
                        {{ number_format(
                        (float)str_replace(',', '', $issue['1']['bm01'] ?? 0) + (float)str_replace(',', '', $issue['1']['bm02'] ?? 0) + (float)str_replace(',', '', $issue['1']['bm03'] ?? 0) + (float)str_replace(',', '', $issue['1']['bm05'] ?? 0) + (float)str_replace(',', '', $issue['1']['bma'] ?? 0) + (float)str_replace(',', '', $issue['1']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $issue['2']['bm01'] ?? 0) + (float)str_replace(',', '', $issue['2']['bm02'] ?? 0) + (float)str_replace(',', '', $issue['2']['bm03'] ?? 0) + (float)str_replace(',', '', $issue['2']['bm05'] ?? 0) + (float)str_replace(',', '', $issue['2']['bma'] ?? 0) + (float)str_replace(',', '', $issue['2']['bmb'] ?? 0) +
                        (float)str_replace(',', '', $issue['3']['bm01'] ?? 0) + (float)str_replace(',', '', $issue['3']['bm02'] ?? 0) + (float)str_replace(',', '', $issue['3']['bm03'] ?? 0) + (float)str_replace(',', '', $issue['3']['bm05'] ?? 0) + (float)str_replace(',', '', $issue['3']['bma'] ?? 0) + (float)str_replace(',', '', $issue['3']['bmb'] ?? 0)
                    , 2) }}
                    </td>
                    <td class="border border-black px-2 py-1 bg-[#87CEEB]">
                        {{ number_format((float)str_replace(',', '', $production['1-total']['ngr'] ?? 0) + (float)str_replace(',', '', $production['2-total']['ngr'] ?? 0) + (float)str_replace(',', '', $production['3-total']['ngr'] ?? 0), 2) }}
                    </td>
                    <td class="border border-black px-2 py-1 bg-[#87CEEB]">
                        {{ number_format((float)str_replace(',', '', $production['1-total']['audop1'] ?? 0) + (float)str_replace(',', '', $production['2-total']['audop1'] ?? 0) + (float)str_replace(',', '', $production['3-total']['audop1'] ?? 0), 2) }}
                    </td>
                    <td class="border border-black px-2 py-1 bg-[#87CEEB]">
                        {{ number_format((float)str_replace(',', '', $production['1-total']['audop2'] ?? 0) + (float)str_replace(',', '', $production['2-total']['audop2'] ?? 0) + (float)str_replace(',', '', $production['3-total']['audop2'] ?? 0), 2) }}
                    </td>
                    <td class="border border-black px-2 py-1 bg-[#87CEEB]">
                        {{ number_format((float)str_replace(',', '', $production['1-total']['plasma'] ?? 0) + (float)str_replace(',', '', $production['2-total']['plasma'] ?? 0) + (float)str_replace(',', '', $production['3-total']['plasma'] ?? 0), 2) }}
                    </td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['fg']['line'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['other']['line'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['fgr']['line'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['fgm']['line'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['rr']['line'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ number_format((float)str_replace(',', '', $do['rm']['line'] ?? 0) + (float)str_replace(',', '', $do['rmaddfilm']['line'] ?? 0) + (float)str_replace(',', '', $do['rmldpefilm']['line'] ?? 0) + (float)str_replace(',', '', $do['rmlldpefilm']['line'] ?? 0) + (float)str_replace(',', '', $do['supportingmaterial']['line'] ?? 0), 2) }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['waste']['line'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $do['return']['line'] ?? '0.00' }}</td>
                </tbody>
            </table>
            <!-- Sum Month -->
            <table class="table-auto border-collapse border border-black min-w-[100%] text-center mt-3">
                <thead>
                    <tr class="bg-[#FFD800] font-bold">
                        <th class="border border-black px-2 py-1" rowspan="2">BLOW 1 MTD</th>
                        <th class="border border-black px-2 py-1" rowspan="2">BLOW 2 MTD</th>
                        <th class="border border-black px-2 py-1" colspan="2">FG MTD (a)</th>
                        <th class="border border-black px-2 py-1" colspan="2">TA/HOLD MTD (b)</th>
                        <th class="border border-black px-2 py-1" colspan="2">WASTE/REJECT MTD (c)</th>
                        <th class="border border-black px-2 py-1" colspan="2">NO STATUS MTD (d)</th>
                        <th class="border border-black px-2 py-1" rowspan="2">REWIND MTD (e)</th>
                        <th class="border border-black px-2 py-1" colspan="2">WASTE REWIND MTD (f)</th>
                        <th class="border border-black px-2 py-1" rowspan="2">RM TRANSFER MTD</th>
                        <th class="border border-black px-2 py-1" rowspan="2">RM CONST. MTD</th>
                        <th class="border border-black px-2 py-1" rowspan="2">NGR MTD</th>
                        <th class="border border-black px-2 py-1" rowspan="2">AUDOP MTD</th>
                        <th class="border border-black px-2 py-1" rowspan="2">AUDOP 2 MTD</th>
                        <th class="border border-black px-2 py-1" rowspan="2">PLASMA MTD</th>
                        <th class="border border-black px-2 py-1" colspan="8">DELIVERY MTD</th>
                    </tr>
                    <tr class="bg-[#FFD800] font-bold">
                        <th class="border border-black px-2 py-1">kg</th>
                        <th class="border border-black px-2 py-1">%</th>
                        <th class="border border-black px-2 py-1">kg</th>
                        <th class="border border-black px-2 py-1">%</th>
                        <th class="border border-black px-2 py-1">kg</th>
                        <th class="border border-black px-2 py-1">%</th>
                        <th class="border border-black px-2 py-1">kg</th>
                        <th class="border border-black px-2 py-1">%</th>
                        <th class="border border-black px-2 py-1">kg</th>
                        <th class="border border-black px-2 py-1">%</th>
                        <th class="border border-black px-2 py-1">FG</th>
                        <th class="border border-black px-2 py-1">OTHER</th>
                        <th class="border border-black px-2 py-1">FGR</th>
                        <th class="border border-black px-2 py-1">FGM</th>
                        <th class="border border-black px-2 py-1">RR</th>
                        <th class="border border-black px-2 py-1">RM</th>
                        <th class="border border-black px-2 py-1">WASTE</th>
                        <th class="border border-black px-2 py-1">RETURN</th>
                    </tr>
                </thead>
                <tbody>
                    <td class="border border-black px-2 py-1 bg-[#BDB86A]">{{ $summary['blow1'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#F0E68D]">{{ $summary['blow2'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1">{{ $summary['fg']['kg'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1">{{ $summary['fg']['%'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1">{{ $summary['ta']['kg'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1">{{ $summary['ta']['%'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1">{{ $summary['waste']['kg'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1">{{ $summary['waste']['%'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1">0.00</td>
                    <td class="border border-black px-2 py-1">0.00</td>
                    <td class="border border-black px-2 py-1">{{ $summary['rewind'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1">{{ $summary['wasterewind']['kg'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1">{{ $summary['wasterewind']['%'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#5F9FA0]">{{ $summary['rmtrans'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#B0E0E6]">{{ $summary['rmconst'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#87CEEB]">{{ $summary['ngr'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#87CEEB]">{{ $summary['audop'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#87CEEB]">{{ $summary['audop2'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#87CEEB]">{{ $summary['plasma'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $summary['dofg'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $summary['doother'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $summary['dofgr'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $summary['dofgm'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $summary['dorr'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $summary['dorm'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $summary['dowaste'] ?? '0.00' }}</td>
                    <td class="border border-black px-2 py-1 bg-[#90EE91]">{{ $summary['doreturn'] ?? '0.00' }}</td>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection