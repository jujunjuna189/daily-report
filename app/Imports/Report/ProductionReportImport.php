<?php

namespace App\Imports\Report;

use App\Helpers\FileHelper;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ProductionReportImport implements ToCollection, WithCalculatedFormulas
{
    public array $data = [];

    public function collection(Collection $rows)
    {
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
        foreach ($rows->slice($headerRowIndex + 1) as $row) {
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

        $this->data = $dataBatch;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
