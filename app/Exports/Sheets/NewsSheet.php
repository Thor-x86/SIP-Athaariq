<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\News;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NewsSheet implements FromCollection, WithTitle, ShouldAutoSize, WithHeadingRow
{
  public function title(): string
  {
    return "Posted News";
  }

  public function collection()
  {
    return News::join('users', 'users.id', '=', 'news.user_id')
      ->select('news.created_at as Created', 'news.updated_at as Updated', 'title', 'users.name as Publisher')
      ->orderBy('news.created_at', 'DESC')
      ->get();
  }
}
