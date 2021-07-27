<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ConsumeController extends Controller
{
    //
    public function fetch()
    {
        $client = new Client(['base_uri' => 'https://quizapi.io/api/v1/',
            'headers' => ['X-Api-Key' => getenv('QUIZ_API_TOKEN')]]);
        $request = $client->request('GET', 'questions');
        //dd($request);
        $results = json_decode($request->getBody());

        //dd($results);

        foreach ($results as $result) {
            $id = $result->id;
            //dd($id);

            $category = Category::firstOrCreate([
                'name' => $result->category
            ]);
            //dd($category->id);

            $question = Question::firstOrCreate([
                'original_id' => $result->id
            ],
                ['question' => $result->question,
                    'multiple_answer_question' => $result->multiple_correct_answers,
                    'description' => $result->description,
                    'tip' => $result->tip,
                    'explanation' => $result->explanation,
                    'difficulty' => $result->difficulty,
                    'category' => $result->category,
                    'category_id' => $category->id,
                    'tags' => json_encode($result->tags),
                    'answers' => json_encode([
                        'answer_a' => $result->answers->answer_a,
                        'answer_b' => $result->answers->answer_b,
                        'answer_c' => $result->answers->answer_c,
                        'answer_d' => $result->answers->answer_d,
                        'answer_e' => $result->answers->answer_e,
                        'answer_f' => $result->answers->answer_f,
                    ]),
                    'correct_answers' => json_encode([
                        'answer_a_correct' => $result->correct_answers->answer_a_correct,
                        'answer_b_correct' => $result->correct_answers->answer_b_correct,
                        'answer_c_correct' => $result->correct_answers->answer_c_correct,
                        'answer_d_correct' => $result->correct_answers->answer_d_correct,
                        'answer_e_correct' => $result->correct_answers->answer_e_correct,
                        'answer_f_correct' => $result->correct_answers->answer_f_correct,
                    ])
                ]);
        }
        return response(['data' => $results, 'message' => 'Stored Questions Successfully'], 200);
    }
}
