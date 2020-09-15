<?php

namespace App\Http\Controllers;

use App\Highscore;
use App\Group;
use App\Groups;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class HighscoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group)
    {
        return view('highscores.create', compact('group'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Highscore  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Highscore $highscore)
    {
        return view('highscores.show', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Group $group)
    {
        $request->validate([
            'highscore' => 'required'
        ]);

        $user_id = request()->user()->id;

        $group = Groups::where('group_id', '=', $group->id)->get();

        $joined_group_id = $group[0]->id;

        $highscore = request('highscore');
        
        $created_at = Carbon::now()->toDateTimeString();
        $updated_at = Carbon::now()->toDateTimeString();
        
        $data = [$joined_group_id, $user_id, $highscore, $created_at, $updated_at];

        Validator::make($data, [
            'joined_group_id' => ['required', 'int', 'max:6'],
            'user_id' => ['required', 'int', 'max:6'],
            'highscore' => ['required', 'int', 'max:20'],
        ]);

        Highscore::create([
            'joined_group_id' => $data[0],
            'user_id' => $data[1],
            'highscore' => $data[2]
        ]);
        
        return redirect()->route('groups.index')
            ->with('success', 'Created highscore successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Highscore  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Highscore $group)
    {
        return view('highscores.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Highscore  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Highscore $group)
    {
        $request->validate([
            'group_name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $group->update($request->all());

        $group->save();

        return redirect()->route('groups.index')
            ->with('success', 'Highscore updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Highscore  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Highscore $group)
    {
        $group->delete();

        return redirect()->route('groups.index')
            ->with('success', 'Highscore deleted successfully');
    }
}
