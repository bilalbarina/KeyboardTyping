<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ScoreController extends Controller
{
    protected function update(Request $request)
    {
        $validation =  Validator::make($request->input(), [
            'username' => ['required', 'string', 'exists:scores,username'],
            'words_per_minute' => ['required', 'integer', 'max:200']
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validation->messages()->first()
            ], 406);
        }

        $score = Score::where('username', Str::lower($request->get('username')));
        $score->update([
            'words_per_minute' => $request->get('words_per_minute')
        ]);

        return response()->json(['success' => true]);
    }

    protected function create(Request $request)
    {
        $validation = Validator::make($request->input(), [
            'username' => ['required', 'string']
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validation->messages()->first()
            ], 406);
        }

        Score::create([
            'username' => Str::lower($request->get('username'))
        ]);

        return response()->json(['success' => true]);
    }
}
