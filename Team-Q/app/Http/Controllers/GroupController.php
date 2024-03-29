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

class GroupController extends Controller
{
    use UploadTrait;

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
        return view('groups.create');
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

        $group = Group::create($request->all());

        // Check if an image has been uploaded
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on group name and current timestamp
            $group_name = Str::slug($request->input('group_name')) . '_' . time();
            // Define folder path
            $folder = '/images/groups/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $group_name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $group_name);
            // Set group image path in database to filePath
            $group->image = $filePath;
        }
        $group->save();
        
        return redirect()->route('groups.index')
            ->with('success', 'Group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
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
        unlink("../public$group->image");
        $request->validate([
            'group_name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $group->update($request->all());

        // Check if an image has been uploaded
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on group name and current timestamp
            $group_name = Str::slug($request->input('group_name')) . '_' . time();
            // Define folder path
            $folder = '/images/groups/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $group_name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $group_name);
            // Set group image path in database to filePath
            $group->image = $filePath;
        }
        $group->save();

        return redirect()->route('groups.index')
            ->with('success', 'Group updated successfully');
    }

    public function join(Group $group) {

        $user_id = request()->user()->id;
        $group_id = $group->id;        
        $created_at = Carbon::now()->toDateTimeString();
        $updated_at = Carbon::now()->toDateTimeString();

        $data = [ $group_id, $user_id, $created_at, $updated_at];

        Validator::make($data, [
            'group_id' => ['required', 'int', 'max:6'],
            'user_id' => ['required', 'int', 'max:6']
        ]);

        Groups::create([
            'group_id' => $data[0],
            'user_id' => $data[1]
        ]);

        return redirect()->route('groups.index')
        ->with('success', 'You have been added to the group successfully');
    }

    public function leave(Group $group) {

        Groups::where('group_id', '=', $group->id)->delete();

        return redirect()->route('groups.index')
        ->with('success', 'You have been removed to the group successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        unlink("../public$group->image");
        $group->delete();

        return redirect()->route('groups.index')
            ->with('success', 'Group deleted successfully');
    }
}
