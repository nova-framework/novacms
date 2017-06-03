<?php
namespace App\Helpers;

use Config;
use mPDF;
use Str;

class Export {

    /**
     * Generate CSV
     * @param  string $data      html data
     * @param  string $filename  path and filename without .pdf
     */
    public static function csv($data, $filename)
    {
        $filename = Str::slug($filename);
        $timestamp = date('Y-m-d-H-i-s');
        header("Content-Type: application/csv");
        header("Content-Disposition: attachment; filename={$filename}-{$timestamp}.csv");
        echo $data;
    }

    /**
     * Generate PDF
     * @param  string $data      html data
     * @param  string $filename  path and filename without .pdf
     * @param  string $outpuType sets the output type default to 'P' preview in the browser. Other options are 'D' = Download 'F' = Store
     */
    public static function pdf($data, $filename, $outputType = 'P')
    {
        $data = iconv("UTF-8","UTF-8//IGNORE",$data);
        $timestamp = date('Y-m-d-H-i-s');

        $mpdf = new mPDF('utf-8', 'A4', '', '', 5, 5, 5, 5, 0, 0);
        $mpdf->setAutoTopMargin = 'stretch'; // Set pdf top margin to stretch to avoid content overlapping
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->SetHTMLHeader('<p><img class="left" src="'.theme_url('img/logo.png', 'CRM').'"/></p>');
        $mpdf->SetHTMLFooter('<p>&copy; - '.Config::get('app.name').' '.date('Y').' - Private & Confidential. Page {PAGENO} of {nb}</p>');
        $mpdf->WriteHTML($data);

        if ($outputType == 'P') {
            $mpdf->Output();
        } else {
            $mpdf->Output($filename.'-'.$timestamp.'.pdf', $outputType);
        }
    }
}
