<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function store(Request $request)
    {
        $field = $request->validate([
            'title' => 'required|string|max:255',
            'question' => 'required|string|max:1000',
            'tags' => 'required|string',
        ]);

        $request->user()->questions()->create([
            'title' => $field['title'],
            'question' => $field['question']
        ]);
        return response()->json(['hello' => 'ok']);
    }

    public function show(Request $request)
    {
        $question = Questions::find($request->id);
        $question->user;
        return response()->json($question);
    }

    public function update(Request $request)
    {
        $field = $request->validate([
            'title' => 'required|string|max:255',
            'question' => 'required|string|max:1000',
            'tags' => 'required|string',
        ]);

        $question = Questions::find($request->id);
        $question->title = $field['title'];
        $question->question = $field['question'];
        $question->tags = $field['tags'];
        $question->save();
        return response()->json(['hello' => 'ok']);
    }

    public function delete(Request $request)
    {
        $question = Questions::find($request->id);
        $question->delete();
        return response()->json(['hello' => 'ok']);
    }
}
