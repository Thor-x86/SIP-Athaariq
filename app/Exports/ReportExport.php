<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportExport implements WithMultipleSheets, ShouldAutoSize
{
  use Exportable;

  public function sheets(): array
  {
    return [
      new Sheets\NewsSheet(),
      new Sheets\UserSheet(),
    ];
  }
}
