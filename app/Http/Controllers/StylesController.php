<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Style;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Laracasts\Flash;

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
        ;
        $styles = Style::all();
        //return compact('styles');
        return view('style.index', compact('styles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function show($id)
    {
        $style = App\Style::where('id', $id)->first();
        //return $style->toArray();
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
        $this->validate($request, $style->getUpdateRules());

        $style->update($request->all());

        flash()->success("Style '" . $style->DESCRIPTION . "' successfully updated!");

        //return $this->index();
        return redirect()->back(); // if you want to keep the update form displayed.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $style = App\Style::where('id', $id)->first();
        if ($style == NULL)
        {
            flash()->error("Unable to locate requested style in database.")->important();
        }
        else
        {
            try
            {
                $style->delete();
            }
            catch (\Exception $e)
            {
                //flash()->error($e->getMessage());
                flash()->error("Style '" . "$style->DESCRIPTION" . "' is in use and therefore cannot be deleted")->important();
                return redirect()->back();
            }

            flash()->success("Style '" . "$style->DESCRIPTION" . "' has been deleted from the database.");
        }

        return $this->index();
    }

}
