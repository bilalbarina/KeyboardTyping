<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Leaderboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LeaderboardController extends Controller
{
    protected function update(Request $request)
    {
        // Make new custom validation
        $validation =  Validator::make($request->input(), [
            'username' => ['required', 'string', 'exists:leaderboard,username'],
            'words_per_minute' => ['required', 'integer', 'max:200']
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validation->messages()->first()
            ], 406);
        }

        $leaderboard = Leaderboard::where('username', Str::lower($request->get('username')));

        // Update score only if score greater than current one
        if ($request->get('words_per_minute') > $leaderboard->first()->words_per_minute) {
            $leaderboard->update([
                'words_per_minute' => $request->get('words_per_minute')
            ]);
        }
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

        if (Leaderboard::where('username', $request->get('username'))->get()->count() == 0) {
            Leaderboard::create([
                'username' => Str::lower($request->get('username'))
            ]);
        }
        return response()->json(['success' => true]);
    }

    protected function leaderboard()
    {
        $scores = Leaderboard::orderBy('words_per_minute', 'desc')->get()->take(5);
        return response()->json([
            'scores' => $scores
        ]);
    }
}
