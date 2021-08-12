<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class DateRangeController extends Controller
{
  public function index()
    {
    $users= User::paginate(1);
     return view('users',compact('users'));
    }

    public function Search_by_date(Request $request){
        $users= User::where('created_at', '>=','$request->from')->where('created_at', '<=','$request->to')->get();
        return view('users',compact('users'));
    }


    
}

?>