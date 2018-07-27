<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Http\Request;

class DatatablesController extends Controller
{
    public function index()
    {
        return view('admin.view-users');
    }



    public function anyData()
        {
        	$query = DB::table('users')->get();
            return Datatables::of($query)->make(true);
            
        }


}
