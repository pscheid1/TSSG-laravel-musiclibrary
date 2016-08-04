<?php

namespace App\Http\Controllers;

use Gate;
use App;
use App\Http\Controllers\Controller;
use App\Style;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Laracasts\Flash;
use App\UserType;
use App\user;
use App\Policies;

class StylesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!(\policy(new Style)->index($request->user())))
        {
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }

        $styles = Style::all();
        //return compact('styles');
        return view('style.index', compact('styles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if (!(policy(new Style)->create($request->user())))
        {
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }

        return view('style.addStyle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(\policy(new Style)->store($request->user())))
        {
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }

        $style = new Style($request->all());

        $this->validate($request, $style::getRules());

        $style->save();

        flash()->success("Style '" . $style->DESCRIPTION . "' successfully added!");

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
        $style = Style::findOrFail($id);
        
        if ($style == NULL)
        {
            flash()->error("Unable to locate requested style in database.")->important();
        }

        if (!(policy($style)->show($request->user())))
        {
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }
;
        return view('style.editStyle', compact('style'));
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

    //$style = Style::where('id', $id)->first();
    //
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $style = Style::findOrFail($id);
        if (!(policy($style)->update($request->user())))
        {
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }

        $this->validate($request, $style->getUpdateRules());

        $style->update($request->all());

        flash()->success("Style '" . $style->DESCRIPTION . "' successfully updated!");

        //return $this->index();  // use this to return to the list styles page
        return redirect()->back(); // use this if you want to keep the update form displayed.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $style = Style::findOrFail($id);
        if ($style == NULL)
        {
            flash()->error("Unable to locate requested style in database.")->important();
        }

        if ($style->musiclibrary()->count() > 0)
        {
            flash()->error("Style '" . "$style->DESCRIPTION" . "' is in use and therefore cannot be deleted")->important();
            return redirect()->back();
        }

        if (!(policy($style)->delete($request->user())))
        {
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }

        $style->delete();

        flash()->success("Style '" . "$style->DESCRIPTION" . "' has been deleted from the database.");

        return redirect()->back();
        //return $this->index($request);
    }

}
