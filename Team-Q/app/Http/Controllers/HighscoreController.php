<?php

namespace App\Http\Controllers;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::latest()->paginate(5);
        
        $user_id = request()->user()->id;
        $groups_list = Groups::get()->all();

        $joined = $this->filter_joined_groups($groups, $groups_list, $user_id);

        return view('groups.index', compact('groups', 'groups_list', 'user_id', 'joined'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function filter_joined_groups($groups, $groups_list, $user_id) {

        $min = 0;
        $array_length = count($groups);
        $j = array_fill($min, ($array_length + 1), "false");
        $max = count($groups_list);

        foreach ($groups as $group) {
            
            if ($max > 0) {
                for ($i = 0; $i < $max; $i++) { 
                    if (($group->id == $groups_list[$i]->group_id) && ($user_id == $groups_list[$i]->user_id)) {
                        $j[(($group->id) - 1)] = "true";
                    }
                }
            }
        }

        return $j;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('highscores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'group_name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        return redirect()->route('groups.index')
            ->with('success', 'Created highscore successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('highscores.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'group_name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $group->update($request->all());

        $group->save();

        return redirect()->route('groups.index')
            ->with('success', 'Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')
            ->with('success', 'Group deleted successfully');
    }
}
