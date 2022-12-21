<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
  use HasFactory;

  function issue_type()
  {
    return $this->belongsTo(IssueType::class);
  }
}
