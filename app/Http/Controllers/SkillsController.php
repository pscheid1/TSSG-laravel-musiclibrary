<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill;;
use App\User;
use App\Http\Controllers\Helpers\PageSizeHelper;

class SkillsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!(\policy(new Skill)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // get this users page size for this list
        $pgSizeHelper = new PageSizeHelper();
        $pgSzIndx = $pgSizeHelper->getPgSzIndx('skills', $request->pageSize);

        $skills = Skill::paginate(PAGESIZES[$pgSzIndx]);

        $updaters = array();
        foreach ($skills as $skill)
        {
            $updaters[$skill->id] = User::find($skill->updateuserid)->firstname . ' ' . User::find($skill->updateuserid)->lastname;
        }

        return view('skill.indexSkills', compact('skills', 'updaters', 'pgSzIndx'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(policy(new Skill)->create()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        return view('skill.addSkill');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(\policy(new Skill)->store()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $skill = new Skill($request->all());

        $this->validate($request, $skill::getRules());

        $skill->updateuserid = \Auth::user()->id;
        $skill->save();

        flash()->success("Proficiency '" . $skill->name . "' successfully added!");

        //return $this->index(); // if you want to return to the list styles view
        return redirect()->back(); // if you want return to a new add style  view
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!(policy(new Skill)->show($request->user())))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        ;
        $skill = Skill::find($id);
        if ($skill == NULL)
        {
            flash()->error("Unable to locate requested proviciency in database.")->important();
        }

        $updateusername = User::find($skill->updateuserid)->firstname . ' ' . User::find($skill->updateuserid)->lastname;
        return view('skill.editSkill', compact('skill', 'updateusername'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!(policy(new Skill)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $skill = Skill::find($id);
        if ($skill == NULL)
        {
            flash()->error("Unable to locate requested proficiency in database.")->important();
        }

        $this->validate($request, $skill->getUpdateRules());

        $skill->updateuserid = \Auth::user()->id;
        $skill->update($request->all());

        flash()->success("Proviciency '" . $skill->name . "' successfully updated!");

        return $this->index();  // use this to return to the list skills page
        //return redirect()->back(); // use this if you want to keep the update form displayed.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!(policy(new Skill)->delete()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $skill = Skill::find($id);
        if ($skill == NULL)
        {
            flash()->error("Unable to locate requested proficiency in database.")->important();
        }

        if ($skill->resmgrskill()->count() > 0 || $skill->resusrskill()->count() > 0)
        {
            flash()->error("Skill '" . "$skill->name" . "' is in use and therefore cannot be deleted")->important();
            return redirect()->back();
        }

        $skill->delete();

        flash()->success("Skill '" . "$skill->name" . "' has been deleted from the database.");

        return redirect()->back();
        //return $this->index($request);
    }

}
