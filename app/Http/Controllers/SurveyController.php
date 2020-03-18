<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug)
    {
        if (function_exists('newrelic_record_custom_event')) {
            newrelic_record_custom_event("SurveyQS", array("color"=>"red", "weight"=>12.5));
        }
        return view('survey.show', compact('questionnaire'));
    }
    public function store(Questionnaire $questionnaire)
    {
        //dd(request()->all());
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email',
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        return view('survey.thanks');
    }
}
