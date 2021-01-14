<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
  use HasFactory;
  use SoftDeletes;

  /**
   * Get the role entity.
   */
  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
}
