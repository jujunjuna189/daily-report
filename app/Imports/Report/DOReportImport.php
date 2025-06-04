<?php

namespace App\Imports\Report;

use App\Helpers\FileHelper;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class DOReportImport implements ToCollection, WithCalculatedFormulas
{
    public array $data = [];

    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
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
        foreach ($rows->slice($headerRowIndex + 1) as $row) {
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

        $this->data = $dataBatch;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
