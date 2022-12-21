<?php

namespace App\Http\Controllers\Issue;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\IssueType;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  //
  function __invoke()
  {
    $data = Issue::with(
      [
        'issue_type:id,title',

      ]
    )->get();
    return response()->json($data);
  }
}
