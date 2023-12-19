<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\StoreSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;
use App\Models\Answer;
use App\Models\Input;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveys = Survey::paginate();

        return view("survey.index", ["surveys" => $surveys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('survey.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSurveyRequest $request)
    {
        $survey = Survey::create($request->validated());

        foreach ($request->validated("inputs") as $input) {
            if ($input) {
                $survey->inputs()->create(["name" => $input]);
            }
        }

        return redirect()->route("surveys.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        $survey->load("inputs");

        return view("survey.show", ["survey" => $survey]);
    }

    public function answer(StoreAnswerRequest $request, Survey $survey)
    {
        foreach ($request->get("answers") as $input_id => $answer) {
            Answer::create([
                "survey_id" => $survey->id,
                "input_id" => $input_id,
                "username" => $request->get("username"),
                "phone" => $request->get("phone"),
                "answer" => $answer
            ]);
        }

        $survey->update([
            "response_count" => $survey->response_count + 1
        ]);

        return redirect()->route("surveys.thankyou", $survey->uuid);
    }

    public function thankYou(Survey $survey)
    {
        return view('survey.thankyou', ["survey" => $survey]);
    }
}
