<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuestionsController extends Controller
{
    public function index() {

        $questions = Question::all()->toArray();
        return response(['data' => $questions, 'message' => 'Returned All Questions'], 200);
    }

    public function answerQuestion(Request $request) {
        $id = $request->get('id');
        $question = Question::find($id);
        $user = $request->user();
        $user_answer = UserAnswer::create([
            'user_id' => $user->id,
            'question_id' => $question->id,
        ]);
        $user_answer->save();

        return response(['data' => $user_answer, 'message' => 'Question answer saved successfully'],200);

    }

    public function unAnsweredQuestions(Request $request) {
        Log::info('Hit Endpoint unAnsweredQuestions');
        $user = $request->user();
        $answered = UserAnswer::where('user_id','=',$user->id)->get();
        Log::info($answered);
        //dd($answered);
        $questions = Question::where('id','!=',[$answered])->get();
        return response(['data' => $questions , 'message' =>'Not Answered Questions'],200);
    }

    public function answeredQuestions(Request $request) {
        Log::info('Hit Endpoint answeredQuestions');
        $user = $request->user();
        //dd($user);
        $answered = UserAnswer::query()->where('user_id','=',$user->id);

        return response(['data' => $answered , 'message' =>'Answered Questions'],200);
    }

    public function questionsByCategory(Request $request) {
        $category_id = $request->get('category_id');
        Log::info('Category ID: '.$category_id);
        $questions = Question::where('category_id','=',$category_id)->get();


        return response(['data' => $questions , 'message' =>'Questions By Category'],200);
    }

    public function createNewQuestionnaire(Request $request) {

        $difficulties = $request->get('difficulties');
        $categories = $request->get('categories');
        //todo make a field for number of questions so that it can also be dynamic

        //todo make a field for answered or not answered or both so that it can also be dynamic

        $questions = Question::whereIn('difficulty',$difficulties)->whereIn('category_id',$categories)->get();

        return response(['data' => $questions , 'message' =>'Serving A New Questionnaire'],200);
    }


}
