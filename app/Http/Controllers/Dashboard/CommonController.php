<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{

  public function slug($text)
  {
      return response()->json(str_slug($text));
  }

  
}
