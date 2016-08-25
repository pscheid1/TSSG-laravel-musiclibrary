<?php

namespace App\Http\Controllers;

use Gate;
use App;
use App\Http\Controllers\Controller;
use App\Style;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Laracasts\Flash;
use App\User;
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
    public function index()
    {
        if (!(\policy(new Style)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $styles = Style::all();
        
        return view('style.indexStyles', compact('styles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(policy(new User)->create()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
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
        if (!(\policy(new Style)->store()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
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
        if (!(policy(new Style)->show($request->user())))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        ;
        $style = Style::findOrFail($id);

        if ($style == NULL)
        {
            flash()->error("Unable to locate requested style in database.")->important();
        }

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
        if (!(policy(new Style)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $style = Style::findOrFail($id);
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
        if (!(policy(new Style)->delete($request->user())))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

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

        $style->delete();

        flash()->success("Style '" . "$style->DESCRIPTION" . "' has been deleted from the database.");

        return redirect()->back();
        //return $this->index($request);
    }

}
