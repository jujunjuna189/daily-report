@extends('layouts.app', ['nav_bar' => true])

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-4xl mx-auto mt-10 bg-white shadow rounded-lg border border-stone-200">
        <!-- Search bar and filters -->
        <div class="flex items-center justify-between p-4 border-b border-slate-200">
            <input type="text" placeholder="Search..." class="w-full max-w-md border border-slate-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-0" readonly />
            <div class="flex items-center gap-2 ml-4">
                <!-- <button class="text-sm px-2 py-1 border border-slate-200 cursor-pointer rounded bg-gray-100 hover:bg-gray-200">Labels</button>
                <button class="text-sm px-2 py-1 border border-slate-200 cursor-pointer rounded bg-gray-100 hover:bg-gray-200">Milestones</button> -->
                <button class="text-sm px-3 py-1 bg-slate-700 text-white rounded cursor-pointer">New Generate</button>
            </div>
        </div>

        <!-- Tabs (Open, Closed) -->
        <div class="flex items-center gap-4 px-4 py-2 border-b border-slate-200 text-sm font-medium">
            <!-- <button class="border-b-2 border-blue-600 text-blue-600 pb-1">Today <span class="text-xs text-gray-500">(0)</span></button> -->
            <button class="text-gray-600">All <span class="text-xs text-gray-500">(0)</span></button>
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
        <div class="flex flex-col items-center justify-center p-10 text-gray-600">
            <p class="text-lg font-medium">No results</p>
            <p class="text-sm">Try adjusting your search filters.</p>
        </div>
    </div>
</div>
@endsection