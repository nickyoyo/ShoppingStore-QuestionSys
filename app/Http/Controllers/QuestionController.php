<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\question_reports;

class QuestionController extends Controller
{
   
    public function Upload(){

        question_reports::create([
            'topic' => request('topic'),
            'users_level' => request('users_level'),
            'type' => request('type'),
            'status' => "waiting",
            'description' => request('description'),
        ]); 
 
         return redirect('/')->with('mssg' , 'Thanks for record.');
      }
    
    public function create(){
        return view('Question.createQ');
    }
    public function Question(){
        $All = request('all');
        $doc = DB::table('question_reports')->orderBy('type','desc')->get();
        $docTA = DB::table('question_reports')->where('type','A')->get();
        $docTB = DB::table('question_reports')->where('type','B')->get();
        $docTC = DB::table('question_reports')->where('type','C')->get();
        
        return view('Question.Question',['test' => $doc, 'Qtype' => 'A', 'docTA' => $docTA, 'docTB' => $docTB, 'docTC' => $docTC , 'allcheck' => $All]);
    }
    public function deletedata($id){
        $doc = question_reports::findorFail($id);
        $doc -> delete();
        return redirect('Question');
    }
    public function showQ($id){
        $doc = DB::table('question_reports')->where('id',$id)->get();
        return view('Question.changeQ',['test' => $doc]);
    }
    public function changeQ($id){
        $data = DB::table('question_reports')
              ->where('id',$id)
              ->update([
                'topic' => request('topic'),
                'users_level' => request('users_level'),
                'type' => request('type'),
                'status' => request('status'),
                'description' => request('description'),
            ]); 
       // $data->save();
         return redirect('/Question');
      }
    public function search(){
        $n = request('Qtype');
        $All = request('all');
        $docTA = DB::table('question_reports')->where('type','A')->get();
        $docTB = DB::table('question_reports')->where('type','B')->get();
        $docTC = DB::table('question_reports')->where('type','C')->get();
        $doc = DB::table('question_reports')->where('type','LIKE','%'.$n.'%')->get();
        return view('Question.Question',['test' => $doc , 'Qtype' => $n , 'docTA' => $docTA, 'docTB' => $docTB, 'docTC' => $docTC , 'allcheck' => $All]);
    }
}
