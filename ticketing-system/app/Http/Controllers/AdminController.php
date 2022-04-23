<?php

namespace App\Http\Controllers;
use App\Models\Questions;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->role === 0) {
            return response()->json([
                "message" => "unauthorized."
            ]);
        } else {
            return Questions::paginate(8);
        }
    } 

    public function _delete(Request $request)
    {
        if ($request->user()->role === 0) {
            return response()->json([
                "message" => "unauthorized."
            ]);
        } else {
            return Questions::destroy($request['id']);
        }
    }
}

