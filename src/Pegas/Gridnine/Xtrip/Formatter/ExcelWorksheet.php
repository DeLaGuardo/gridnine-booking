<?php

namespace Pegas\Gridnine\Xtrip\Formatter;

use PHPExcel_Worksheet;

class ExcelWorksheet implements Formatter
{
    private $worksheet;

    public function __construct(PHPExcel_Worksheet $sheet)
    {
        $this->worksheet = $sheet;
    }

    public function addHeaders(array $headers)
    {
        // @todo
    }

    public function addRow(array $grabbed)
    {
        // @todo
    }
}
