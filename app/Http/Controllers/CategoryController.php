<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return response(['data' => $categories, 'message' => 'Returning all categories']);
    }

    public function categoriesForUser() {

        $id = auth()->user()->id;
        Log::info($id);

        $categories = Category::withCount('questions')->get();
        $user_answers_category_read = UserAnswer::where('user_id',$id)->orderBy('total','desc')->selectRaw('category_id,count(*) as total')->groupBy('category_id')->pluck('total','category_id')->all();
        Log::info('user_answers_category_read: ',[$user_answers_category_read]);
        $user_answers_category_answered = UserAnswer::where('user_id',$id)->where('answered' , 1)->orderBy('total','desc')->selectRaw('category_id,count(*) as total')->groupBy('category_id')->pluck('total','category_id')->all();
        Log::info('$user_answers_category_answered: ',[$user_answers_category_answered]);
        foreach ($categories as $category){
            foreach ($user_answers_category_read as $key =>$item) {

                if ($category->id === $key) {
                    Log::info('Equals!');
                    Log::info('category: ', [$category]);
                    Log::info('$user_answers_category_read key: '. $key. ' $user_answers_category_read item '. $item);
                    $category->read_questions = $item;
                    break;
                }

            }
            if (empty($category->read_questions)) {
                $category->read_questions = 0;
            }
        }

        foreach ($categories as $category){
            foreach ($user_answers_category_answered as $key =>$item) {

                if ($category->id === $key) {
                    Log::info('Equals!');
                    Log::info('category: ', [$category]);
                    Log::info('$user_answers_category_answered key: '. $key. ' $user_answers_category_answered item '. $item);
                    $category->answered_questions = $item;
                    break;
                }
            }
            if (empty($category->answered_questions)) {
                $category->answered_questions = 0;
            }
        }

        return response(['data' => $categories,'message' => 'Returning Categories with extended details']);

    }
}
