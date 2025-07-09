@extends('layouts.app', ['nav_bar' => true])

@section('content')
<div class="flex justify-center">
    <div>
        <div class="text-center py-10">
            <span class="text-slate-800 text-4xl font-bold">pick your report</span>
        </div>
        <div class="mt-5">
            <div class="bg-white shadow rounded-lg border border-stone-200">
                <div class="py-3 text-center text-sm border-b border-b-slate-200">
                    <span>Collect your files and upload them</span>
                </div>
                <div class="flex gap-5 mt-5 px-5 pb-5">
                    <label for="drag&dropInput" id="dropZone" class="flex justify-center items-center border border-dashed border-slate-400 bg-slate-100 grow rounded-md py-10 px-10 cursor-pointer">
                        <div class="flex flex-col items-center justify-center">
                            <input type="file" class="hidden" id="dragDropInput" multiple onchange="onChangeDragDrop(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-700" width="35" height="35" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-library-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18.333 2a3.667 3.667 0 0 1 3.667 3.667v8.666a3.667 3.667 0 0 1 -3.667 3.667h-8.666a3.667 3.667 0 0 1 -3.667 -3.667v-8.666a3.667 3.667 0 0 1 3.667 -3.667zm-4.333 4a1 1 0 0 0 -1 1v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0 -2h-2v-2a1 1 0 0 0 -1 -1" />
                                <path d="M3.517 6.391a1 1 0 0 1 .99 1.738c-.313 .178 -.506 .51 -.507 .868v10c0 .548 .452 1 1 1h10c.284 0 .405 -.088 .626 -.486a1 1 0 0 1 1.748 .972c-.546 .98 -1.28 1.514 -2.374 1.514h-10c-1.652 0 -3 -1.348 -3 -3v-10.002a3 3 0 0 1 1.517 -2.605" />
                            </svg>
                            <span class="text-slate-500 text-sm mt-3">drag & drop files in this area</span>
                        </div>
                    </label>
                    <form action="{{ route('generate-report') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="pt-1">
                            <div class="flex gap-1 items-center">
                                <div class="grow flex gap-1 items-center pr-32">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <path d="M8 11h8v7h-8z" />
                                        <path d="M8 15h8" />
                                        <path d="M11 11v7" />
                                    </svg>
                                    <span class="text-sm" id="label-production">Upload File XLS Production Reports</span>
                                </div>
                                <div>
                                    <label for="file-production" class="cursor-pointer inline-flex items-center gap-2 text-sm hover:text-slate-400">
                                        <!-- ICON -->
                                        <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-upload">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                                            <path d="M9 15l3 -3l3 3" />
                                            <path d="M12 12l0 9" />
                                        </svg>
                                    </label>
                                    <input id="file-production" name="file-production" type="file" class="hidden" />
                                </div>
                            </div>

                            <div class="flex gap-1 items-center mt-5">
                                <div class="grow flex gap-1 items-center pr-32">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <path d="M8 11h8v7h-8z" />
                                        <path d="M8 15h8" />
                                        <path d="M11 11v7" />
                                    </svg>
                                    <span class="text-sm" id="label-trans">Upload File XLS Product Transfer Report</span>
                                </div>
                                <div>
                                    <label for="file-trans" class="cursor-pointer inline-flex items-center gap-2 text-sm hover:text-slate-400">
                                        <!-- ICON -->
                                        <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-upload">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                                            <path d="M9 15l3 -3l3 3" />
                                            <path d="M12 12l0 9" />
                                        </svg>
                                    </label>
                                    <input id="file-trans" name="file-trans" type="file" class="hidden" />
                                </div>
                            </div>

                            <div class="flex gap-1 items-center mt-5">
                                <div class="grow flex gap-1 items-center pr-32">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <path d="M8 11h8v7h-8z" />
                                        <path d="M8 15h8" />
                                        <path d="M11 11v7" />
                                    </svg>
                                    <span class="text-sm" id="label-issue">Upload File XLS Material Issue Report</span>
                                </div>
                                <div>
                                    <label for="file-issue" class="cursor-pointer inline-flex items-center gap-2 text-sm hover:text-slate-400">
                                        <!-- ICON -->
                                        <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-upload">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                                            <path d="M9 15l3 -3l3 3" />
                                            <path d="M12 12l0 9" />
                                        </svg>
                                    </label>
                                    <input id="file-issue" name="file-issue" type="file" class="hidden" />
                                </div>
                            </div>

                            <div class="flex gap-1 items-center mt-5">
                                <div class="grow flex gap-1 items-center pr-32">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <path d="M8 11h8v7h-8z" />
                                        <path d="M8 15h8" />
                                        <path d="M11 11v7" />
                                    </svg>
                                    <span class="text-sm" id="label-do">Upload File XLS DO Report</span>
                                </div>
                                <div>
                                    <label for="file-do" class="cursor-pointer inline-flex items-center gap-2 text-sm hover:text-slate-400">
                                        <!-- ICON -->
                                        <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-upload">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                                            <path d="M9 15l3 -3l3 3" />
                                            <path d="M12 12l0 9" />
                                        </svg>
                                    </label>
                                    <input id="file-do" name="file-do" type="file" class="hidden" />
                                </div>
                            </div>

                            <button type="submit" class="bg-slate-700 text-white w-full rounded-sm py-2 px-2 font-medium cursor-pointer mt-10">
                                Generate Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @if ($errors->any())
            <div class="mt-5 bg-white shadow rounded-lg border border-stone-200">
                <div class="py-3 text-center text-sm border-b border-b-slate-200">
                    <span>Oops! Something did't go as planned</span>
                </div>
                <div class="py-3 px-3 text-sm">
                    <ul class="list-disc list-inside text-gray-700 space-y-1 space-x-0">
                        @foreach ($errors->all() as $msg)
                        <li class="flex items-center gap-1 text-sm text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-200">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M12 9v4" />
                                <path d="M12 16v.01" />
                            </svg>
                            {{ $msg }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    getName({
        inputId: 'file-do',
        outputId: 'label-do'
    });
    getName({
        inputId: 'file-trans',
        outputId: 'label-trans'
    });
    getName({
        inputId: 'file-production',
        outputId: 'label-production'
    });
    getName({
        inputId: 'file-issue',
        outputId: 'label-issue'
    });

    function getName({
        inputId = '',
        outputId = ''
    }) {
        const input = document.getElementById(inputId);
        const output = document.getElementById(outputId);

        input.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                output.textContent = `Selected: ${this.files[0].name}`;
            } else {
                output.textContent = '';
            }
        });
    }

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const dropzone = document.getElementById('dropZone');
    const dragDropInput = document.getElementById('dragDropInput');
    // Drag & drop behavior
    ['dragenter', 'dragover'].forEach(event => {
        dropzone.addEventListener(event, e => {
            e.preventDefault();
            console.log('dragter');
        });
    });

    ['dragleave', 'drop'].forEach(event => {
        dropzone.addEventListener(event, e => {
            e.preventDefault();
            console.log('drag leave');
        });
    });

    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        const files = e.dataTransfer.files;

        dragDropInput.files = files;

        const formData = new FormData();
        [...files].forEach(file => {
            console.log('Dropped file:', file.name);
            formData.append('files[]', file);
        });

        fetch('<?= route('generate-report-v2') ?>', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            body: formData
        }).then((res) => {
            if (res.status == 200) {
                location.href = '<?= route('preview') ?>';
            } else {
                location.reload();
            }
        });
    });
</script>
@endsection