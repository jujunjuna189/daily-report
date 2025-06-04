<?php

namespace App\Imports\Report;

use App\Helpers\FileHelper;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class TransReportImport implements ToCollection, WithCalculatedFormulas
{
    public array $data = [];

    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
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
        foreach ($rows->slice($headerRowIndex + 1) as $row) {
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

        $this->data = $dataBatch;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
