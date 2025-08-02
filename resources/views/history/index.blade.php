@extends('layouts.app', ['nav_bar' => true])

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-4xl mx-auto mt-10 bg-white shadow rounded-lg border border-stone-200">
        <!-- Search bar and filters -->
        <div class="flex items-center justify-between p-4 border-b border-slate-200">
            <!-- <input type="text" placeholder="Search..." class="w-full max-w-md border border-slate-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-0" readonly /> -->
            <div class="flex gap-2">
                <select id="month" value="{{ $filter['month'] }}" class="border border-slate-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-0" onchange="window.location.href = '<?= url('history') ?><?= $filter['year'] != 'all' ? '?year=' . $filter['year'] . '&' : '?' ?>' + (this.value ? 'month=' + this.value : '')">
                    <option value="">-- Month --</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                        </option>
                        @endfor
                </select>
                <select id="year" value="{{ $filter['year'] }}" class="border border-slate-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-0" onchange="window.location.href = '<?= url('history') ?><?= $filter['month'] != 'all' ? '?month=' . $filter['month'] . '&' : '?' ?>' + (this.value ? 'year=' + this.value : '')">
                    <option value="">-- Year --</option>
                    @for ($year = now()->year; $year >= 2015; $year--)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                    @endfor
                </select>
            </div>
            <div class="flex items-center gap-2 ml-4">
                <!-- <button class="text-sm px-2 py-1 border border-slate-200 cursor-pointer rounded bg-gray-100 hover:bg-gray-200">Labels</button>
                <button class="text-sm px-2 py-1 border border-slate-200 cursor-pointer rounded bg-gray-100 hover:bg-gray-200">Milestones</button> -->
                <button class="text-sm px-3 py-1 bg-slate-700 text-white rounded cursor-pointer" onclick="location.href='<?= route('home') ?>'">New Generate</button>
            </div>
        </div>

        <!-- Tabs (Open, Closed) -->
        <div class="flex items-center gap-4 px-4 py-2 border-b border-slate-200 text-sm font-medium">
            <!-- <button class="border-b-2 border-blue-600 text-blue-600 pb-1">Today <span class="text-xs text-gray-500">(0)</span></button> -->
            <button class="text-gray-600">All <span class="text-xs text-gray-500">({{$history->total()}})</span></button>
        </div>

        <!-- Filters -->
        <!-- <div class="flex items-center justify-between px-4 py-2 text-sm text-gray-700">
            <div class="flex items-center gap-4">
                <select class="border rounded px-2 py-1">
                    <option>Author</option>
                </select>
                <select class="border rounded px-2 py-1">
                    <option>Labels</option>
                </select>
                <select class="border rounded px-2 py-1">
                    <option>Projects</option>
                </select>
                <select class="border rounded px-2 py-1">
                    <option>Milestones</option>
                </select>
                <select class="border rounded px-2 py-1">
                    <option>Assignees</option>
                </select>
            </div>
            <div>
                <select class="border rounded px-2 py-1">
                    <option>Newest</option>
                </select>
            </div>
        </div> -->

        <!-- No results -->
        @if(count($history) == 0)
        <div class="flex flex-col items-center justify-center p-10 text-gray-600">
            <p class="text-lg font-medium">No results</p>
            <p class="text-sm">Try adjusting your search filters.</p>
        </div>
        @else
        <div class="pt-1 pb-5">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-sm text-gray-600 font-semibold w-20 bg-gray-200 py-2 px-2">#</th>
                        <th class="text-sm text-gray-600 font-semibold w-50 bg-gray-200 py-2 px-2">From Date</th>
                        <th class="text-sm text-gray-600 font-semibold w-50 bg-gray-200 py-2 px-2">To Date</th>
                        <th class="text-sm text-gray-600 font-semibold w-50 bg-gray-200 py-2 px-2"></th>
                        <th class="text-sm text-gray-600 font-semibold bg-gray-200 py-2 px-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $key => $val)
                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                        <td class="text-center text-sm py-2 px-2 text-slate-900">{{ ($history->currentPage() - 1) * $history->perPage() + $loop->iteration }}</td>
                        <td class="text-center text-sm py-2 px-2 text-slate-900 font-medium">
                            <span class="font-bold">{{ Carbon\Carbon::parse($val->date)->format('Y-m-d') }}</span>
                        </td>
                        <td class="text-center text-sm py-2 px-2 text-slate-900 font-medium">
                            <span class="font-bold">{{ $val->end_date != null ? Carbon\Carbon::parse($val->end_date)->format('Y-m-d') : '-' }}</span>
                        </td>
                        <td class="text-center text-sm py-2 px-2 text-slate-900 font-medium">
                            {{ $val->end_date ? \Carbon\Carbon::parse($val->date)->diffInDays(\Carbon\Carbon::parse($val->end_date)) + 1 : '-' }} <small>Day</small>
                        </td>
                        <td class="py-2 px-2 text-slate-900">
                            <div class="flex justify-end gap-1">
                                <a href="{{ route('preview', ['id' => $val->id]) }}" class="text-sm px-3 py-1 bg-green-700 text-white rounded cursor-pointer">Preview</a>
                                <form action="{{ route('delete-report') }}" method="post">
                                    @csrf
                                    <input type="text" name="id" id="id" value="{{$val->id}}" hidden>
                                    <input type="text" name="page" id="page" value="{{(count($history) == 1 && $history->currentPage() > 1) ? ($history->currentPage() - 1) : $history->currentPage()}}" hidden>
                                    <button type="submit" class="text-sm px-3 py-1 bg-red-900 text-white rounded cursor-pointer">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-4 px-5">
                {{ $history->links("vendor.pagination.tailwind") }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection