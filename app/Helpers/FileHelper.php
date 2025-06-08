<?php

namespace App\Helpers;

class FileHelper
{
    static function checkFile($file)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file);
        finfo_close($finfo);

        return $mime;
    }

    static function formatting($text)
    {
        try {
            preg_match_all('/\b\d{2} \w{3} \d{4}\b/', $text, $matches);

            if (count($matches[0]) >= 2) {
                $dateFrom = \Carbon\Carbon::createFromFormat('d M Y', $matches[0][0]);
                $dateTo   = \Carbon\Carbon::createFromFormat('d M Y', $matches[0][1]);

                $fromFormatted = $dateFrom->format('d-m-Y');
                $toFormatted   = $dateTo->format('d-m-Y');

                return [
                    'from' => $fromFormatted,
                    'to'   => $toFormatted,
                ];
            }

            return [];
        } catch (\Throwable $th) {
            return [];
        }
    }

    static function normalizeNumericValue($value)
    {
        if (is_null($value)) return 0;
        // Buang spasi
        $value = trim($value);

        // Kalau ada koma sebagai desimal dan titik sebagai ribuan (format Eropa: 1.999,50)
        if (preg_match('/^\d{1,3}(\.\d{3})*(,\d{1,2})?$/', $value)) {
            $value = str_replace('.', '', $value); // hilangkan titik ribuan
            $value = str_replace(',', '.', $value); // ubah koma desimal ke titik
        } else if (preg_match('/^\d{1,3}(,\d{3})*(\.\d{1,2})?$/', $value)) { //(format Amerika: 1,999.50)
            $value = str_replace(',', '', $value); // Hapus koma ribuan
        }

        // Kalau formatnya 1,999.50 (ribuan koma, desimal titik — format Amerika, langsung saja)
        // Kalau format sudah berupa angka, langsung pakai

        return (float) $value;
    }

    static function normalizeNumericValueV2($value)
    {
        $value = trim((string)$value);

        // Jika angka bulat kecil, misalnya 1, 2, 3 — biarkan
        if (ctype_digit($value) && intval($value) < 100) {
            return $value;
        }

        // Format benar seperti 2612.28 → langsung return
        if (preg_match('/^\d+\.\d{1,2}$/', $value)) {
            return $value;
        }

        // Jika nilainya seperti 2.61228 (dan ada 5 digit pecahan), kemungkinan besar maksudnya 2612.28
        if (is_numeric($value) && preg_match('/^\d+\.\d{4,5}$/', $value)) {
            return number_format(floatval($value) * 1000, 2, '.', '');
        }

        // Format Indonesia 1.234,56
        if (preg_match('/^\d{1,3}(\.\d{3})*(,\d{2})$/', $value)) {
            return str_replace(['.', ','], ['', '.'], $value);
        }

        // Format Inggris 1,234.56
        if (preg_match('/^\d{1,3}(,\d{3})*(\.\d{2})$/', $value)) {
            return str_replace(',', '', $value);
        }

        // Jika angka bulat (misal 175645)
        if (preg_match('/^\d+$/', $value)) {
            return number_format(((int)$value) / 100, 2, '.', '');
        }

        return $value;
    }
}
