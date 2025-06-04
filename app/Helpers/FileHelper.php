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
        }else if (preg_match('/^\d{1,3}(,\d{3})*(\.\d{1,2})?$/', $value)) {
            $value = str_replace(',', '', $value); // Hapus koma ribuan
        }

        // Kalau formatnya 1,999.50 (ribuan koma, desimal titik — format Amerika, langsung saja)
        // Kalau format sudah berupa angka, langsung pakai

        return (float) $value;
    }
}
