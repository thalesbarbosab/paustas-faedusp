<?php

namespace App\Reports\Ruling;

use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use App\Reports\BaseXlsxReport;

class RulingReport extends BaseXlsxReport
{
    /**
     * Generate a Spreadsheet\Xlsx login report of the all guards in the platform
     */
    public function voting(object $ruling): array
    {
        set_time_limit(0);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('assinaturas-da-pauta');
        $sheet->getStyle('A1:J1')->getBorders()->getOutline()->setBorderStyle(true);
        $sheet->setCellValue('A1', 'Título');
        $sheet->setCellValue('B1', 'CPF');
        $sheet->setCellValue('C1', 'Nome completo');
        $sheet->setCellValue('D1', 'E-mail');
        $sheet->setCellValue('E1', 'Cidade');
        $sheet->setCellValue('F1', 'Estado (UF)');
        $sheet->setCellValue('G1', 'Representa uma empresa?');
        $sheet->setCellValue('H1', 'CNPJ');
        $sheet->setCellValue('I1', 'Razão social');
        $sheet->setCellValue('J1', 'Data/hora da assinatura');
        $line = 2;
        foreach ($ruling->rulingVoting as $ruling_voting) {
            $sheet->setCellValue([1, $line], $ruling->title);
            $sheet->setCellValue([2, $line], $ruling_voting->cpf);
            $sheet->setCellValue([3, $line], $ruling_voting->name);
            $sheet->setCellValue([4, $line], $ruling_voting->email);
            $sheet->setCellValue([5, $line], $ruling_voting->city);
            $sheet->setCellValue([6, $line], $ruling_voting->state);
            $sheet->setCellValue([7, $line], $ruling_voting->cnpj ? 'Sim' : 'Não');
            $sheet->setCellValue([8, $line], $ruling_voting->cnpj);
            $sheet->setCellValue([9, $line], $ruling_voting->company_name);
            $sheet->setCellValue([10, $line], $ruling_voting->createdAtFormated());
            $line++;
        }
        foreach (range('B', 'J') as $column_id) {
            $sheet->getColumnDimension($column_id)->setAutoSize(true);
        }

        return $this->processWorksheet(
            $spreadsheet,
            'Relatorio-de-assinaturas-da-pauta-'.Str::limit($ruling->slug, 150),
            'Relatório de assinaturas da pauta');
    }
}
