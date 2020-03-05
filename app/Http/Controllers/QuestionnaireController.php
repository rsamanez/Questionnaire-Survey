<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store()
    {
        $questionnaire = auth()->user()->questionnaires()->create($this->validatedData());
        return redirect('/questionnaires/' . $questionnaire->id);
    }

    public function  show(Questionnaire $questionnaire)
    {
        //$questionnaire->load('questions.answers');

        return view('questionnaire.show', compact('questionnaire'));
    }


    private function validatedData()
    {
        return request()->validate([
            'title' => 'required',
            'purpose' => 'required'
        ]);
    }

}
