<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Member;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use validator;

class UserController extends Controller
{
    public function index(){
        $all_quiz = DB::table('quizzes')->orderBy('id', 'desc')->get();
        return view('users.index' , compact('all_quiz'));
    }
    public function home(){
        $current_id = Auth('member')->user()->id;
        $get_quiz = DB::table('quizzes')->where('creator_id', '!=', $current_id);
        return view('users.home' , compact('get_quiz'));
    }
    public function add_quiz(){
        return view('users.add_quiz');
    }
    public function quiz_create(Request $Req){
        $validate = $Req->validate([
            'question' => 'Required|min:3|unique:quizzes',
            'option_1' => 'Required|min:3',
            'option_2' => 'Required|min:3',
            'option_3' => 'Required|min:3',
            'option_4' => 'Required|min:3',
            'time' => 'nullable',
            'answer' => 'Required',
        ]);
        $time = $Req->input('time');
        if (is_null($time)) {
            $time = 2;
        }
        $addQuiz = new Quiz();
        $addQuiz->question = $Req->input('question');
        $addQuiz->option_1 = $Req->input('option_1');
        $addQuiz->option_2 = $Req->input('option_2');
        $addQuiz->option_3 = $Req->input('option_3');
        $addQuiz->option_4 = $Req->input('option_4');
        $addQuiz->time = $time;
        $addQuiz->answer = $Req->input('answer');
        $addQuiz->creator_id = Auth('member')->user()->id;
        $addQuiz->save();
        return redirect()->route('user.home')->with('error','Quiz added Successfully');
    }

    public function quiz_result(){
        $current_id = Auth('member')->user()->id;
        $QuizCount = DB::table('quizzes')->where('creator_id', '!=', $current_id)->count();
        $success_num = Auth('member')->user()->success;
        $quizzes = DB::table('quizzes')->where('creator_id', '!=', $current_id);
        return view('users.result', compact('success_num' , 'QuizCount' , 'quizzes'));
    }

    public function show_quiz(){
        $current_id = Auth('member')->user()->id;
        $all_quiz = DB::table('quizzes')->where('creator_id', '!=', $current_id)->orderBy('id', 'desc')->get();
        $QuizCount = DB::table('quizzes')->where('creator_id', '!=', $current_id)->count();
        
        return view('users.show_quiz', compact('all_quiz' , 'QuizCount' ));
    }

    public function quiz_result_create(Request $request) {
        $success = 0;
    
        $submittedAnswers = $request->input('answer'); 
        $answerIds = $request->input('answer_id'); 
    
        $correctAnswers = DB::table('quizzes')->select('id', 'answer')->get();
        $correctAnswersMap = $correctAnswers->pluck('answer', 'id')->toArray();
    
        foreach ($answerIds as $answerId) {
            if (isset($submittedAnswers[$answerId])) {
                $userAnswers = $submittedAnswers[$answerId]; 
                $correctAnswer = $correctAnswersMap[$answerId] ?? null;
                if ($correctAnswer !== null) {
                    if (in_array($correctAnswer, $userAnswers)) {
                        $success++;
                    }
                }
            }
        }
        $user = Auth('member')->user();
        $user->success = $success;
        $user->save();
        return redirect()->route('user.result');
    }    
    
}
