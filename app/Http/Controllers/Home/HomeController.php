<?php

namespace App\Http\Controllers\Home;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Imports\Report\DOReportImport;
use App\Imports\Report\IssueReportImport;
use App\Imports\Report\ProductionReportImport;
use App\Imports\Report\TransReportImport;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class HomeController extends Controller
{
    public function index()
    {
        $data['controller'] = $this;
        return view('home.index', $data);
    }

    public function generateReport(Request $request)
    {
        $requiredFiles = [
            'file-production' => 'No Production files uploaded',
            'file-trans'      => 'No Product Transfer files uploaded',
            'file-issue'      => 'No Material Issue files uploaded',
            'file-do'         => 'No DO files uploaded',
        ];

        $errors = [];

        foreach ($requiredFiles as $field => $message) {
            if (!$request->hasFile($field)) {
                $errors[] = $message;
            }
        }

        if (!empty($errors)) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }

        try {
            $production = null;
            $trans = null;
            $issue = null;
            $do = null;

            if (FileHelper::checkFile($request->file('file-production')) == 'text/xml') {
                $production = $this->openXmlFormatProduction($request);
            } else if (FileHelper::checkFile($request->file('file-production')) == 'text/html') {
                $production = $this->openHtmlFormatProduction($request);
            } else {
                $production = $this->openExcelFormatProduction($request);
            }

            if (FileHelper::checkFile($request->file('file-trans')) == 'text/xml') {
                $trans = $this->openXmlFormatTrans($request);
            } else if (FileHelper::checkFile($request->file('file-trans')) == 'text/html') {
                $trans = $this->openHtmlFormatTrans($request);
            } else {
                $trans = $this->openExcelFormatTrans($request);
            }

            if (FileHelper::checkFile($request->file('file-issue')) == 'text/xml') {
                $issue = $this->openXmlFormatIssue($request);
            } else if (FileHelper::checkFile($request->file('file-issue')) == 'text/html') {
                $issue = $this->openHtmlFormatIssue($request);
            } else {
                $issue = $this->openExcelFormatIssue($request);
            }

            if (FileHelper::checkFile($request->file('file-do')) == 'text/xml') {
                $do = $this->openXmlFormatDo($request);
            } else if (FileHelper::checkFile($request->file('file-do')) == 'text/html') {
                $do = $this->openHtmlFormatDo($request);
            } else {
                $do = $this->openExcelFormatDo($request);
            }

            Report::where('date', Carbon::parse($production['date'])->format("Y-m-d"))->delete();

            $model = new Report();
            $model->date = Carbon::parse($production['date'])->format("Y-m-d");
            $model->end_date = Carbon::parse($production['end_date'])->format("Y-m-d");
            $model->production = json_encode($production['report']);
            $model->mutation = json_encode($trans['report']);
            $model->issue = json_encode($issue['report']);
            $model->do = json_encode($do['report']);
            $model->save();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors([$th->getMessage()])
                ->withInput();
        }

        return redirect()->route('preview');
    }

    public function generateReportV2(Request $request)
    {
        try {
            $filesData = $request->file('files');
            // Detec title from file
            $files = [];
            foreach ($filesData as $val) {
                if (FileHelper::checkFile($val) == 'text/xml') {
                    $file = $this->extractXmlToArray($val);
                    $files[] = (object)[
                        'title' => $file[2][0],
                        'file' => $val,
                    ];
                } else if (FileHelper::checkFile($val) == 'text/html') {
                    $file = $this->extractHtmlToArray($val);
                    $files[] = (object)[
                        'title' => $file[3][0],
                        'file' => $val,
                    ];
                } else {
                    $file = Excel::toArray([], $val);
                    $files[] = (object)[
                        'title' => $file[0][2][0],
                        'file' => $val,
                    ];
                }
            }

            $newRequest = new Request();
            foreach ($files as $val) {
                if (strtolower($val->title) == 'laporan harian produksi') {
                    $newRequest->files->add(['file-production' => $val->file]);
                } else if (strtolower($val->title) == 'mutasi per barang per gudang') {
                    $newRequest->files->add(['file-trans' => $val->file]);
                } else if (strtolower($val->title) == 'rincian daftar pengeluaran bahan baku') {
                    $newRequest->files->add(['file-issue' => $val->file]);
                } else if (strtolower($val->title) == 'laporan do fg detail') {
                    $newRequest->files->add(['file-do' => $val->file]);
                }
            }

            $generateReport = $this->generateReport($newRequest);

            if (count($newRequest->all()) == 4) {
                return response()->json(['status' => 'success', 'data' => $generateReport]);
            } else {
                return response()->json(['status' => "error", 'errors' => "Upload all required files"], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => "error", 'errors' => $th->getMessage()], 500);
        }
    }

    public function openXmlFormat(Request $request)
    {
        $production = $this->extractXmlToArray($request->file('file-production'));
        $trans = $this->extractXmlToArray($request->file('file-trans'));
        $issue = $this->extractXmlToArray($request->file('file-issue'));
        $do = $this->extractXmlToArray($request->file('file-do'));

        if (!isset(FileHelper::formatting($production[4][0])['from'])) throw new \Exception("Date is not in the correct format in the production file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");
        if (!isset(FileHelper::formatting($trans[4][0])['from'])) throw new \Exception("Date is not in the correct format in the product transfer file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");
        if (!isset(FileHelper::formatting($issue[4][0])['from'])) throw new \Exception("Date is not in the correct format in the material issue file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");
        if (!isset(FileHelper::formatting($do[4][0])['from'])) throw new \Exception("Date is not in the correct format in the do file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $data = [
            'production' => FileHelper::formatting($production[4][0])['from'],
            'trans' => FileHelper::formatting($trans[4][0] ?? '')['from'],
            'issue' => FileHelper::formatting($issue[4][0] ?? '')['from'],
            'do' => FileHelper::formatting($do[4][0] ?? '')['from'],
        ];

        $production = $this->extractXmlProductionReport($request->file('file-production'));
        $trans = $this->extractXmlTransReport($request->file('file-trans'));
        $issue = $this->extractXmlIssueReport($request->file('file-issue'));
        $do = $this->extractXmlDoReport($request->file('file-do'));

        $model = new Report();
        $model->date = Carbon::parse($data['production'])->format("Y-m-d");
        $model->production = json_encode($production);
        $model->mutation = json_encode($trans);
        $model->issue = json_encode($issue);
        $model->do = json_encode($do);
        $model->save();
    }

    public function openXmlFormatProduction(Request $request)
    {
        $productionData = $this->extractXmlToArray($request->file('file-production'));

        if (!isset(FileHelper::formatting($productionData[4][0])['from'])) throw new \Exception("Date is not in the correct format in the production file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $production = $this->extractXmlProductionReport($request->file('file-production'));

        $data = [
            'date' => FileHelper::formatting($productionData[4][0])['from'],
            'end_date' => FileHelper::formatting($productionData[4][0])['to'],
            'report' => $production,
        ];

        return $data;
    }

    public function openXmlFormatTrans(Request $request)
    {
        $transData = $this->extractXmlToArray($request->file('file-trans'));

        if (!isset(FileHelper::formatting($transData[4][0])['from'])) throw new \Exception("Date is not in the correct format in the product transfer file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $trans = $this->extractXmlTransReport($request->file('file-trans'));

        $data = [
            'date' => FileHelper::formatting($transData[4][0])['from'],
            'end_date' => FileHelper::formatting($transData[4][0])['to'],
            'report' => $trans,
        ];

        return $data;
    }

    public function openXmlFormatIssue(Request $request)
    {
        $issueData = $this->extractXmlToArray($request->file('file-issue'));

        if (!isset(FileHelper::formatting($issueData[4][0])['from'])) throw new \Exception("Date is not in the correct format in the material issue file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $issue = $this->extractXmlIssueReport($request->file('file-issue'));

        $data = [
            'date' => FileHelper::formatting($issueData[4][0])['from'],
            'end_date' => FileHelper::formatting($issueData[4][0])['to'],
            'report' => $issue,
        ];

        return $data;
    }

    public function openXmlFormatDo(Request $request)
    {
        $doData = $this->extractXmlToArray($request->file('file-do'));

        if (!isset(FileHelper::formatting($doData[4][0])['from'])) throw new \Exception("Date is not in the correct format in the do file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $do = $this->extractXmlDoReport($request->file('file-do'));

        $data = [
            'date' => FileHelper::formatting($doData[4][0])['from'],
            'end_date' => FileHelper::formatting($doData[4][0])['to'],
            'report' => $do,
        ];

        return $data;
    }


    // Html
    public function openHtmlFormatProduction(Request $request)
    {
        $productionData = $this->extractHtmlToArray($request->file('file-production'));

        if (!isset(FileHelper::formatting($productionData[5][0])['from'])) throw new \Exception("Date is not in the correct format in the production file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $production = $this->extractHtmlProductionReport($request->file('file-production'));

        $data = [
            'date' => FileHelper::formatting($productionData[5][0])['from'],
            'end_date' => FileHelper::formatting($productionData[5][0])['to'],
            'report' => $production,
        ];

        return $data;
    }

    public function openHtmlFormatTrans(Request $request)
    {
        $transData = $this->extractHtmlToArray($request->file('file-trans'));

        if (!isset(FileHelper::formatting($transData[5][0])['from'])) throw new \Exception("Date is not in the correct format in the product transfer file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $trans = $this->extractHtmlTransReport($request->file('file-trans'));

        $data = [
            'date' => FileHelper::formatting($transData[5][0])['from'],
            'end_date' => FileHelper::formatting($transData[5][0])['to'],
            'report' => $trans,
        ];

        return $data;
    }

    public function openHtmlFormatIssue(Request $request)
    {
        $issueData = $this->extractHtmlToArray($request->file('file-issue'));

        if (!isset(FileHelper::formatting($issueData[5][0])['from'])) throw new \Exception("Date is not in the correct format in the material issue file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $issue = $this->extractHtmlIssueReport($request->file('file-issue'));

        $data = [
            'date' => FileHelper::formatting($issueData[5][0])['from'],
            'end_date' => FileHelper::formatting($issueData[5][0])['to'],
            'report' => $issue,
        ];

        return $data;
    }

    public function openHtmlFormatDo(Request $request)
    {
        $doData = $this->extractHtmlToArray($request->file('file-do'));

        if (!isset(FileHelper::formatting($doData[5][0])['from'])) throw new \Exception("Date is not in the correct format in the do file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $do = $this->extractHtmlDoReport($request->file('file-do'));

        $data = [
            'date' => FileHelper::formatting($doData[5][0])['from'],
            'end_date' => FileHelper::formatting($doData[5][0])['to'],
            'report' => $do,
        ];

        return $data;
    }

    // Excel
    public function openExcelFormat(Request $request)
    {
        $production = Excel::toArray([], $request->file('file-production'));
        $trans = Excel::toArray([], $request->file('file-trans'));
        $issue = Excel::toArray([], $request->file('file-issue'));
        $do = Excel::toArray([], $request->file('file-do'));

        if (!isset(FileHelper::formatting($production[0][4][0])['from'])) throw new \Exception("Date is not in the correct format in the production file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");
        if (!isset(FileHelper::formatting($trans[0][4][0])['from'])) throw new \Exception("Date is not in the correct format in the product transfer file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");
        if (!isset(FileHelper::formatting($issue[0][4][0])['from'])) throw new \Exception("Date is not in the correct format in the material issue file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");
        if (!isset(FileHelper::formatting($do[0][4][0])['from'])) throw new \Exception("Date is not in the correct format in the do file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $data = [
            'production' => FileHelper::formatting($production[0][4][0])['from'],
            'trans' => FileHelper::formatting($trans[0][4][0] ?? '')['from'],
            'issue' => FileHelper::formatting($issue[0][4][0] ?? '')['from'],
            'do' => FileHelper::formatting($do[0][4][0] ?? '')['from'],
        ];

        $production = $this->extractProductionReport($request->file('file-production'));
        $trans = $this->extractTransReport($request->file('file-trans'));
        $issue = $this->extractIssueReport($request->file('file-issue'));
        $do =  $this->extractDOReport($request->file('file-do'));

        $model = new Report();
        $model->date = Carbon::parse($data['production'])->format("Y-m-d");
        $model->production = json_encode($production);
        $model->mutation = json_encode($trans);
        $model->issue = json_encode($issue);
        $model->do = json_encode($do);
        $model->save();
    }

    public function openExcelFormatProduction(Request $request)
    {
        $productionData = Excel::toArray([], $request->file('file-production'));

        if (!isset(FileHelper::formatting($productionData[0][4][0])['from'])) throw new \Exception("Date is not in the correct format in the production file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $production = $this->extractProductionReport($request->file('file-production'));

        $data = [
            'date' => FileHelper::formatting($productionData[0][4][0] ?? '')['from'],
            'end_date' => FileHelper::formatting($productionData[0][4][0] ?? '')['to'],
            'report' => $production,
        ];

        return $data;
    }

    public function openExcelFormatTrans(Request $request)
    {
        $transData = Excel::toArray([], $request->file('file-trans'));

        if (!isset(FileHelper::formatting($transData[0][4][0])['from'])) throw new \Exception("Date is not in the correct format in the product transfer file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $trans = $this->extractTransReport($request->file('file-trans'));

        $data = [
            'date' => FileHelper::formatting($transData[0][4][0] ?? '')['from'],
            'end_date' => FileHelper::formatting($transData[0][4][0] ?? '')['to'],
            'report' => $trans,
        ];

        return $data;
    }

    public function openExcelFormatIssue(Request $request)
    {
        $issueData = Excel::toArray([], $request->file('file-issue'));

        if (!isset(FileHelper::formatting($issueData[0][4][0])['from'])) throw new \Exception("Date is not in the correct format in the material issue file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $issue = $this->extractIssueReport($request->file('file-issue'));

        $data = [
            'date' => FileHelper::formatting($issueData[0][4][0] ?? '')['from'],
            'end_date' => FileHelper::formatting($issueData[0][4][0] ?? '')['to'],
            'report' => $issue,
        ];

        return $data;
    }

    public function openExcelFormatDo(Request $request)
    {
        $doData = Excel::toArray([], $request->file('file-do'));

        if (!isset(FileHelper::formatting($doData[0][4][0])['from'])) throw new \Exception("Date is not in the correct format in the do file. Example: 'Dari 1 Jan 2025 ke 5 Jan 2025'");

        $do =  $this->extractDOReport($request->file('file-do'));

        $data = [
            'date' => FileHelper::formatting($doData[0][4][0] ?? '')['from'],
            'end_date' => FileHelper::formatting($doData[0][4][0] ?? '')['to'],
            'report' => $do,
        ];

        return $data;
    }

    public function extractProductionReport($file)
    {
        $import = new ProductionReportImport();
        Excel::import($import, $file);

        return $import->getData();
    }

    public function extractTransReport($file)
    {
        $import = new TransReportImport();
        Excel::import($import, $file);

        return $import->getData();
    }

    public function extractIssueReport($file)
    {
        $import = new IssueReportImport();
        Excel::import($import, $file);

        return $import->getData();
    }

    public function extractDOReport($file)
    {
        $import = new DOReportImport();
        Excel::import($import, $file);

        return $import->getData();
    }

    // Xml
    public function extractXmlToArray($fileData)
    {
        try {
            $xml = simplexml_load_file($fileData);

            $rawRows = [];
            $maxColumnCount = 0;

            // Pertama: baca semua baris & hitung max kolom
            foreach ($xml->Worksheet->Table->Row as $row) {
                $cells = [];
                $cellIndex = 0;

                foreach ($row->Cell as $cell) {
                    // ss:Index (jika ada loncatan kolom)
                    $indexAttr = $cell->attributes('ss', true)->Index;
                    if ($indexAttr) {
                        $cellIndex = (int)$indexAttr - 1;
                    }

                    $value = isset($cell->Data) ? (string)$cell->Data : '';
                    $value = FileHelper::normalizeNumericValueV2($value);
                    $cells[$cellIndex] = $value;

                    $cellIndex++;
                }

                $maxColumnCount = max($maxColumnCount, count($cells));
                $rawRows[] = $cells;
            }

            // Kedua: normalisasi tiap baris jadi panjang yang sama
            $rows = [];
            foreach ($rawRows as $rowIndex => $row) {
                $normalizedRow = [];

                for ($i = 0; $i < $maxColumnCount; $i++) {
                    if (
                        (!isset($row[$i])) &&
                        isset($rows[$rowIndex - 1][$i])
                    ) {
                        // isi dari baris atas (jika kosong)
                        $normalizedRow[$i] = $rows[$rowIndex - 1][$i];
                    } else {
                        $normalizedRow[$i] = $row[$i] ?? '';
                    }
                }

                $rows[] = $normalizedRow;
            }

            return $rows;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function extractXmlProductionReport($fileData)
    {
        $rows = $this->extractXmlToArray($fileData);

        $requiredKeys = ['shift', 'status', 'bm1', 'bm2', 'bm3', 'bm5', 'bma', 'bmb', 'bmm', 'bmp', 'bmr', 'rw1', 'rw2', 'rw3', 'rw5', 'rwm', 'ngr', 'audop1', 'audop2', 'plasma'];
        $headerRowIndex = null;
        $normalizedRow = [];

        foreach ($rows as $rowIndex => $row) {
            $matchCount = 0;
            $normalized = [];

            foreach ($row as $cell) {
                $normalized[] = strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $cell)));
            }

            // Cek apakah baris ini mengandung kolom yang dibutuhkan
            foreach ($requiredKeys as $key) {
                if (in_array($key, $normalized)) {
                    $matchCount++;
                }
            }

            if ($matchCount >= 2) { // misalnya, cocok minimal 2 kolom
                $headerRowIndex = $rowIndex;
                $normalizedRow = $normalized;
                break;
            }
        }

        if (is_null($headerRowIndex)) {
            return []; // error header not fount
        }

        // Lanjut proses: simpan kolom index
        $columnIndexes = [];
        foreach ($requiredKeys as $key) {
            $columnIndexes[$key] = array_search($key, $normalizedRow);
        }

        // Ambil data setelah header
        $data = [];
        $shif = "";
        foreach (array_slice($rows, $headerRowIndex + 1) as $row) {
            $shif = $row[$columnIndexes['shift']] != null ? $row[$columnIndexes['shift']] : $shif;
            $data[] = [
                'shift' => $shif ?? null,
                'status' => $row[$columnIndexes['status']] ?? null,
                'bm01' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm1']] ?? null), 2),
                'bm02' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm2']] ?? null), 2),
                'bm03' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm3']] ?? null), 2),
                'bm05' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm5']] ?? null), 2),
                'bma'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bma']] ?? null), 2),
                'bmb'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmb']] ?? null), 2),
                'bmm'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmm']] ?? null), 2),
                'bmp'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmp']] ?? null), 2),
                'bmr'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmr']] ?? null), 2),
                'rw1'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw1']] ?? null), 2),
                'rw2'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw2']] ?? null), 2),
                'rw3'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw3']] ?? null), 2),
                'rw5'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw5']] ?? null), 2),
                'rwm'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rwm']] ?? null), 2),
                'ngr'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['ngr']] ?? null), 2),
                'audop1' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['audop1']] ?? null), 2),
                'audop2' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['audop2']] ?? null), 2),
                'plasma' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['plasma']] ?? null), 2),
            ];
        }

        $dataBatch = [];
        foreach ($data as $val) {
            $dataBatch[strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['shift']))) . '-' . strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['status'])))] = $val;
        }

        return $dataBatch;
    }

    public function extractXmlTransReport($fileData)
    {
        $rows = $this->extractXmlToArray($fileData);

        $requiredKeys = ['shift', 'mesin', 'mts.prod'];
        $headerRowIndex = null;
        $normalizedRow = [];

        foreach ($rows as $rowIndex => $row) {
            $matchCount = 0;
            $normalized = [];

            foreach ($row as $cell) {
                $normalized[] = strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $cell)));
            }

            // Cek apakah baris ini mengandung kolom yang dibutuhkan
            foreach ($requiredKeys as $key) {
                if (in_array($key, $normalized)) {
                    $matchCount++;
                }
            }

            if ($matchCount >= 2) { // misalnya, cocok minimal 2 kolom
                $headerRowIndex = $rowIndex;
                $normalizedRow = $normalized;
                break;
            }
        }

        if (is_null($headerRowIndex)) {
            return []; // error header not fount
        }

        // Lanjut proses: simpan kolom index
        $columnIndexes = [];
        foreach ($requiredKeys as $key) {
            $columnIndexes[$key] = array_search($key, $normalizedRow);
        }

        // Ambil data setelah header
        $data = [];
        $shif = "";
        foreach (array_slice($rows, $headerRowIndex + 1) as $row) {
            $shif = $row[$columnIndexes['shift']] != null ? $row[$columnIndexes['shift']] : $shif;
            $data[] = [
                'shift' => $shif ?? null,
                'mesin' => $row[$columnIndexes['mesin']] ?? null,
                'mts.prod' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['mts.prod']] ?? null), 2),
            ];
        }

        $dataBatch = [];
        foreach ($data as $val) {
            $dataBatch[strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['shift']))) . '-' . strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['mesin'])))] = $val;
        }

        return $dataBatch;
    }

    public function extractXmlIssueReport($fileData)
    {
        $rows = $this->extractXmlToArray($fileData);

        $requiredKeys = ['shift', 'bm1', 'bm2', 'bm3', 'bm5', 'bma', 'bmb', 'bmm', 'bmp', 'bmr', 'rw1', 'rw2', 'rw3', 'rw5', 'rwm', 'ngr', 'audop1', 'audop2', 'plasma'];
        $headerRowIndex = null;
        $normalizedRow = [];

        foreach ($rows as $rowIndex => $row) {
            $matchCount = 0;
            $normalized = [];

            foreach ($row as $cell) {
                $normalized[] = strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $cell)));
            }

            // Cek apakah baris ini mengandung kolom yang dibutuhkan
            foreach ($requiredKeys as $key) {
                if (in_array($key, $normalized)) {
                    $matchCount++;
                }
            }

            if ($matchCount >= 2) { // misalnya, cocok minimal 2 kolom
                $headerRowIndex = $rowIndex;
                $normalizedRow = $normalized;
                break;
            }
        }

        if (is_null($headerRowIndex)) {
            return []; // error header not fount
        }

        // Lanjut proses: simpan kolom index
        $columnIndexes = [];
        foreach ($requiredKeys as $key) {
            $columnIndexes[$key] = array_search($key, $normalizedRow);
        }

        // Ambil data setelah header
        $data = [];
        $shif = "";
        foreach (array_slice($rows, $headerRowIndex + 1) as $row) {
            $shif = $row[$columnIndexes['shift']] != null ? $row[$columnIndexes['shift']] : $shif;
            $data[] = [
                'shift' => $shif ?? null,
                'bm01' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm1']]) ?? null, 2) ?? null,
                'bm02' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm2']]) ?? null, 2) ?? null,
                'bm03' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm3']]) ?? null, 2) ?? null,
                'bm05' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm5']]) ?? null, 2) ?? null,
                'bma' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bma']]) ?? null, 2) ?? null,
                'bmb' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmb']]) ?? null, 2) ?? null,
                'bmm' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmm']]) ?? null, 2) ?? null,
                'bmp' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmp']]) ?? null, 2) ?? null,
                'bmr' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmr']]) ?? null, 2) ?? null,
                'rw1' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw1']]) ?? null, 2) ?? null,
                'rw2' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw2']]) ?? null, 2) ?? null,
                'rw3' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw3']]) ?? null, 2) ?? null,
                'rw5' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw5']]) ?? null, 2) ?? null,
                'rwm' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rwm']]) ?? null, 2) ?? null,
                'ngr' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['ngr']]) ?? null, 2) ?? null,
                'audop1' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['audop1']]) ?? null, 2) ?? null,
                'audop2' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['audop2']]) ?? null, 2) ?? null,
                'plasma' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['plasma']]) ?? null, 2) ?? null,
            ];
        }

        $dataBatch = [];
        foreach ($data as $val) {
            $dataBatch[strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['shift'])))] = $val;
        }

        return $dataBatch;
    }

    public function extractXmlDoReport($fileData)
    {
        $rows = $this->extractXmlToArray($fileData);

        $requiredKeys = ['namakategoribarangbarang', 'line'];
        $headerRowIndex = null;
        $normalizedRow = [];

        foreach ($rows as $rowIndex => $row) {
            $matchCount = 0;
            $normalized = [];

            foreach ($row as $cell) {
                $normalized[] = strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $cell)));
            }

            // Cek apakah baris ini mengandung kolom yang dibutuhkan
            foreach ($requiredKeys as $key) {
                if (in_array($key, $normalized)) {
                    $matchCount++;
                }
            }

            if ($matchCount >= 2) { // misalnya, cocok minimal 2 kolom
                $headerRowIndex = $rowIndex;
                $normalizedRow = $normalized;
                break;
            }
        }

        if (is_null($headerRowIndex)) {
            return []; // error header not fount
        }

        // Lanjut proses: simpan kolom index
        $columnIndexes = [];
        foreach ($requiredKeys as $key) {
            $columnIndexes[$key] = array_search($key, $normalizedRow);
        }

        // maping data
        $categoryMap = [
            'FINISHED GOOD' => 'FG',
            'LAIN-LAIN' => 'OTHER',
            'RECYCLE' => 'RR',
        ];

        // Ambil data setelah header
        $data = [];
        $shif = "";
        foreach (array_slice($rows, $headerRowIndex + 1) as $row) {
            $originalCategory = $row[$columnIndexes['namakategoribarangbarang']] ?? null;

            $mappedCategory = $categoryMap[$originalCategory] ?? $originalCategory;

            $data[] = [
                'namakategoribarangbarang' => $mappedCategory,
                'line' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['line']]) ?? null, 2) ?? null,
            ];
        }

        $dataBatch = [];
        foreach ($data as $val) {
            $dataBatch[strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['namakategoribarangbarang'])))] = $val;
        }

        return $dataBatch;
    }


    // Extract HTML
    public function extractHtmlToArray($fileData)
    {
        try {
            $html = file_get_contents($fileData);

            libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            $dom->loadHTML($html);

            // Ambil semua baris tabel
            $rows = $dom->getElementsByTagName('tr');

            $rawRows = [];
            $maxColumnCount = 0;
            $rowspanBuffer = []; // key: rowIndex, value: array of [colIndex => value]

            foreach ($rows as $rowIndex => $row) {
                $cells = [];
                $cellIndex = 0;

                // Ambil dari buffer rowspan jika ada
                if (isset($rowspanBuffer[$rowIndex])) {
                    foreach ($rowspanBuffer[$rowIndex] as $colIndex => $val) {
                        $cells[$colIndex] = $val;
                    }
                }

                $tds = $row->getElementsByTagName('td');

                foreach ($tds as $cell) {
                    // Lompat ke cell kosong berikutnya jika sudah diisi oleh rowspan
                    while (isset($cells[$cellIndex])) {
                        $cellIndex++;
                    }

                    $value = trim($cell->nodeValue ?? '');

                    if ($value === "\xC2\xA0" || ord($value) === 160) {
                        $value = '0,00';
                    }

                    // Simpan nilai di posisi saat ini
                    $cells[$cellIndex] = $value;

                    // Cek apakah ada rowspan
                    $rowspan = $cell->getAttribute('rowspan');
                    if ($rowspan && is_numeric($rowspan) && (int)$rowspan > 1) {
                        for ($r = 1; $r < (int)$rowspan; $r++) {
                            $targetRow = $rowIndex + $r;
                            $rowspanBuffer[$targetRow][$cellIndex] = $value;
                        }
                    }

                    $cellIndex++;
                }

                $maxColumnCount = max($maxColumnCount, count($cells));
                $rawRows[] = $cells;
            }

            // Tahap 2: normalisasi
            $normalizedRows = [];
            foreach ($rawRows as $rowIndex => $row) {
                $normalizedRow = [];

                for ($i = 0; $i < $maxColumnCount; $i++) {
                    if (
                        (!isset($row[$i])) &&
                        isset($normalizedRows[$rowIndex - 1][$i])
                    ) {
                        $normalizedRow[$i] = $normalizedRows[$rowIndex - 1][$i];
                    } else {
                        $normalizedRow[$i] = $row[$i] ?? '0,00';
                    }
                }

                $normalizedRows[] = $normalizedRow;
            }

            return $normalizedRows;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function extractHtmlProductionReport($fileData)
    {
        $rows = $this->extractHtmlToArray($fileData);

        $requiredKeys = ['shift', 'status', 'bm1', 'bm2', 'bm3', 'bm5', 'bma', 'bmb', 'bmm', 'bmp', 'bmr', 'rw1', 'rw2', 'rw3', 'rw5', 'rwm', 'ngr', 'audop1', 'audop2', 'plasma'];
        $headerRowIndex = null;
        $normalizedRow = [];

        foreach ($rows as $rowIndex => $row) {
            $matchCount = 0;
            $normalized = [];

            foreach ($row as $cell) {
                $normalized[] = strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $cell)));
            }

            // Cek apakah baris ini mengandung kolom yang dibutuhkan
            foreach ($requiredKeys as $key) {
                if (in_array($key, $normalized)) {
                    $matchCount++;
                }
            }

            if ($matchCount >= 2) { // misalnya, cocok minimal 2 kolom
                $headerRowIndex = $rowIndex;
                $normalizedRow = $normalized;
                break;
            }
        }

        if (is_null($headerRowIndex)) {
            return []; // error header not fount
        }

        // Lanjut proses: simpan kolom index
        $columnIndexes = [];
        foreach ($requiredKeys as $key) {
            $columnIndexes[$key] = array_search($key, $normalizedRow);
        }

        // Ambil data setelah header
        $data = [];
        $shif = "";
        foreach (array_slice($rows, $headerRowIndex + 1) as $row) {
            $shif = $row[$columnIndexes['shift']] != null ? $row[$columnIndexes['shift']] : $shif;
            $data[] = [
                'shift' => $shif ?? null,
                'status' => $row[$columnIndexes['status']] ?? null,
                'bm01' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm1']] ?? null), 2),
                'bm02' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm2']] ?? null), 2),
                'bm03' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm3']] ?? null), 2),
                'bm05' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm5']] ?? null), 2),
                'bma'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bma']] ?? null), 2),
                'bmb'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmb']] ?? null), 2),
                'bmm'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmm']] ?? null), 2),
                'bmp'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmp']] ?? null), 2),
                'bmr'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmr']] ?? null), 2),
                'rw1'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw1']] ?? null), 2),
                'rw2'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw2']] ?? null), 2),
                'rw3'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw3']] ?? null), 2),
                'rw5'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw5']] ?? null), 2),
                'rwm'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rwm']] ?? null), 2),
                'ngr'  => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['ngr']] ?? null), 2),
                'audop1' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['audop1']] ?? null), 2),
                'audop2' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['audop2']] ?? null), 2),
                'plasma' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['plasma']] ?? null), 2),
            ];
        }

        $dataBatch = [];
        foreach ($data as $val) {
            $dataBatch[strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['shift']))) . '-' . strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['status'])))] = $val;
        }

        return $dataBatch;
    }

    public function extractHtmlTransReport($fileData)
    {
        $rows = $this->extractHtmlToArray($fileData);

        $requiredKeys = ['shift', 'mesin', 'mts.prod'];
        $headerRowIndex = null;
        $normalizedRow = [];

        foreach ($rows as $rowIndex => $row) {
            $matchCount = 0;
            $normalized = [];

            foreach ($row as $cell) {
                $normalized[] = strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $cell)));
            }

            // Cek apakah baris ini mengandung kolom yang dibutuhkan
            foreach ($requiredKeys as $key) {
                if (in_array($key, $normalized)) {
                    $matchCount++;
                }
            }

            if ($matchCount >= 2) { // misalnya, cocok minimal 2 kolom
                $headerRowIndex = $rowIndex;
                $normalizedRow = $normalized;
                break;
            }
        }

        if (is_null($headerRowIndex)) {
            return []; // error header not fount
        }

        // Lanjut proses: simpan kolom index
        $columnIndexes = [];
        foreach ($requiredKeys as $key) {
            $columnIndexes[$key] = array_search($key, $normalizedRow);
        }

        // Ambil data setelah header
        $data = [];
        $shif = "";
        foreach (array_slice($rows, $headerRowIndex + 1) as $row) {
            $shif = $row[$columnIndexes['shift']] != null ? $row[$columnIndexes['shift']] : $shif;
            $data[] = [
                'shift' => $shif ?? null,
                'mesin' => $row[$columnIndexes['mesin']] ?? null,
                'mts.prod' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['mts.prod']] ?? null), 2),
            ];
        }

        $dataBatch = [];
        foreach ($data as $val) {
            $dataBatch[strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['shift']))) . '-' . strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['mesin'])))] = $val;
        }

        return $dataBatch;
    }

    public function extractHtmlIssueReport($fileData)
    {
        $rows = $this->extractHtmlToArray($fileData);

        $requiredKeys = ['shift', 'bm1', 'bm2', 'bm3', 'bm5', 'bma', 'bmb', 'bmm', 'bmp', 'bmr', 'rw1', 'rw2', 'rw3', 'rw5', 'rwm', 'ngr', 'audop1', 'audop2', 'plasma'];
        $headerRowIndex = null;
        $normalizedRow = [];

        foreach ($rows as $rowIndex => $row) {
            $matchCount = 0;
            $normalized = [];

            foreach ($row as $cell) {
                $normalized[] = strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $cell)));
            }

            // Cek apakah baris ini mengandung kolom yang dibutuhkan
            foreach ($requiredKeys as $key) {
                if (in_array($key, $normalized)) {
                    $matchCount++;
                }
            }

            if ($matchCount >= 2) { // misalnya, cocok minimal 2 kolom
                $headerRowIndex = $rowIndex;
                $normalizedRow = $normalized;
                break;
            }
        }

        if (is_null($headerRowIndex)) {
            return []; // error header not fount
        }

        // Lanjut proses: simpan kolom index
        $columnIndexes = [];
        foreach ($requiredKeys as $key) {
            $columnIndexes[$key] = array_search($key, $normalizedRow);
        }

        // Ambil data setelah header
        $data = [];
        $shif = "";
        foreach (array_slice($rows, $headerRowIndex + 1) as $row) {
            $shif = $row[$columnIndexes['shift']] != null ? $row[$columnIndexes['shift']] : $shif;
            $data[] = [
                'shift' => $shif ?? null,
                'bm01' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm1']]) ?? null, 2) ?? null,
                'bm02' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm2']]) ?? null, 2) ?? null,
                'bm03' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm3']]) ?? null, 2) ?? null,
                'bm05' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bm5']]) ?? null, 2) ?? null,
                'bma' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bma']]) ?? null, 2) ?? null,
                'bmb' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmb']]) ?? null, 2) ?? null,
                'bmm' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmm']]) ?? null, 2) ?? null,
                'bmp' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmp']]) ?? null, 2) ?? null,
                'bmr' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['bmr']]) ?? null, 2) ?? null,
                'rw1' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw1']]) ?? null, 2) ?? null,
                'rw2' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw2']]) ?? null, 2) ?? null,
                'rw3' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw3']]) ?? null, 2) ?? null,
                'rw5' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rw5']]) ?? null, 2) ?? null,
                'rwm' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['rwm']]) ?? null, 2) ?? null,
                'ngr' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['ngr']]) ?? null, 2) ?? null,
                'audop1' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['audop1']]) ?? null, 2) ?? null,
                'audop2' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['audop2']]) ?? null, 2) ?? null,
                'plasma' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['plasma']]) ?? null, 2) ?? null,
            ];
        }

        $dataBatch = [];
        foreach ($data as $val) {
            $dataBatch[strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['shift'])))] = $val;
        }

        return $dataBatch;
    }

    public function extractHtmlDoReport($fileData)
    {
        $rows = $this->extractHtmlToArray($fileData);

        $requiredKeys = ['namakategoribarangbarang', 'line'];
        $headerRowIndex = null;
        $normalizedRow = [];

        foreach ($rows as $rowIndex => $row) {
            $matchCount = 0;
            $normalized = [];

            foreach ($row as $cell) {
                $normalized[] = strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $cell)));
            }

            // Cek apakah baris ini mengandung kolom yang dibutuhkan
            foreach ($requiredKeys as $key) {
                if (in_array($key, $normalized)) {
                    $matchCount++;
                }
            }

            if ($matchCount >= 2) { // misalnya, cocok minimal 2 kolom
                $headerRowIndex = $rowIndex;
                $normalizedRow = $normalized;
                break;
            }
        }

        if (is_null($headerRowIndex)) {
            return []; // error header not fount
        }

        // Lanjut proses: simpan kolom index
        $columnIndexes = [];
        foreach ($requiredKeys as $key) {
            $columnIndexes[$key] = array_search($key, $normalizedRow);
        }

        // maping data
        $categoryMap = [
            'FINISHED GOOD' => 'FG',
            'LAIN-LAIN' => 'OTHER',
            'RECYCLE' => 'RR',
        ];

        // Ambil data setelah header
        $data = [];
        $shif = "";
        foreach (array_slice($rows, $headerRowIndex + 1) as $row) {
            $originalCategory = $row[$columnIndexes['namakategoribarangbarang']] ?? null;

            $mappedCategory = $categoryMap[$originalCategory] ?? $originalCategory;

            $data[] = [
                'namakategoribarangbarang' => $mappedCategory,
                'line' => number_format(FileHelper::normalizeNumericValue($row[$columnIndexes['line']]) ?? null, 2) ?? null,
            ];
        }

        $dataBatch = [];
        foreach ($data as $val) {
            $dataBatch[strtolower(preg_replace('/^([a-zA-Z]+)0*([0-9]+)$/', '$1$2', preg_replace('/\s+/', '', $val['namakategoribarangbarang'])))] = $val;
        }

        return $dataBatch;
    }
}
