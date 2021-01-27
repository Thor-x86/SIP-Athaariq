<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserSheet implements FromCollection, WithTitle, ShouldAutoSize, WithHeadingRow
{
  public function title(): string
  {
    return "Registered Users";
  }

  public function collection()
  {
    return User::select('created_at', 'updated_at', 'email_verified_at', 'name', 'email')
      ->where('role_id','=','1')
      ->orderBy('created_at', 'DESC')
      ->get();
  }
}
