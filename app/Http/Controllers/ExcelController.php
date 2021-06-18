<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    // public function index(){
    //     $doc = DB::table('question_reports')->orderBy('type','desc')->get();
    //     return view('import.excel',compact('doc'));
    // }
    public function export() 
    {
        return Excel::download(new UsersExport(), 'Question.xlsx');
    }
    public function storeExcel() 
    {
    return Excel::store(new UsersExport, 'users.xlsx', 's3');
    }
}
