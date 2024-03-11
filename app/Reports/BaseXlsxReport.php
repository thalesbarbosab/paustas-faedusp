<?php

namespace App\Reports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

abstract class BaseXlsxReport
{
    /**
     *  Default path to save report files
     */
    protected string $report_path = 'reports';

    protected function processWorksheet(Spreadsheet $spreadsheet, ?string $report_file_name = 'Report-123', ?string $report_name = 'Report xyz') : array
    {
        $report_file_name = str_replace(' ', '-', $report_file_name) . '-' . time();
        $filename = $report_file_name . '.xlsx';
        $this->saveFileInLocalStorage($spreadsheet, $filename);
        $report_file_url = $this->getFileFromLocalStorage($filename);

        return $this->getNotificationArray($report_file_url, $report_name);
    }

    private function saveFileInLocalStorage(Spreadsheet $spreadsheet, string $filename) : void
    {
        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path("app/public/{$this->report_path}/". $filename));
    }

    private function getFileFromLocalStorage(string $filename)
    {
        return asset("storage/{$this->report_path}" . "/" . $filename);
    }

    private function getNotificationArray(string $report_file_url, $report_name)
    {
       return [
            'report' => true,
            'report_name' => $report_name,
            'report_link' => $report_file_url,
            'title' => __('validation.generic.Success'),
            'message' => __('validation.report.success'),
            'alert-type' => 'success',
        ];
    }

}
