<?php

// namespace App\Exports;

// use App\Models\User;
// use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class UsersExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return DB::table('question_reports')->select('topic', 'type')->get();
//     }
    

// }
namespace App\Exports;

use App\Models\question_reports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    public function view(): View
    {
        return view('Question.Questiontable', [
            'Question' => question_reports::all()
        ]);
    }
}
