<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Instrument;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Helpers\PageSizeHelper;

class InstrumentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!(\policy(new Instrument)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }


        // get this users page size for this list
        $pgSizeHelper = new PageSizeHelper();
        $pgSzIndx = $pgSizeHelper->getPgSzIndx('instruments', $request->pageSize);

        $instruments = Instrument::paginate(PAGESIZES[$pgSzIndx]);


        $updaters = array();
        foreach ($instruments as $instrument)
        {
            //$updaters[$instrument->id] = User::find($instrument->updateuserid)->username;
            $updaters[$instrument->id] = User::find($instrument->updateuserid)->firstname . ' ' . User::find($instrument->updateuserid)->lastname;
        }

        return view('instrument.indexInstruments', compact('instruments', 'updaters', 'availablePgSizes', 'pgSzIndx'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(policy(new Instrument)->create()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        return view('instrument.addInstrument');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(\policy(new Instrument)->store()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $instrument = new Instrument($request->all());

        $this->validate($request, $instrument::getRules());

        $instrument->updateuserid = \Auth::user()->id;
        $instrument->save();

        flash()->success("Instrument '" . $instrument->name . "' successfully added!");

        //return $this->index(); // if you want to return to the list instruments view
        return redirect()->back(); // if you want return to a new add instrument  view
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!(policy(new Instrument)->show($request->user())))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        ;
        $instrument = Instrument::find($id);
        if ($instrument == NULL)
        {
            flash()->error("Unable to locate requested instrument in database.")->important();
        }

        //$updateusername = User::find($instrument->updateuserid)->username;
        $updateusername = User::find($instrument->updateuserid)->firstname . ' ' . User::find($instrument->updateuserid)->lastname;
        return view('instrument.editInstrument', compact('instrument', 'updateusername'));
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
        if (!(policy(new Instrument)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $instrument = Instrument::findOrFail($id);
        $this->validate($request, $instrument->getUpdateRules());

        $instrument->updateuserid = \Auth::user()->id;
        $instrument->update($request->all());

        flash()->success("Instrument '" . $instrument->name . "' successfully updated!");

        //return $this->index();  // use this to return to the list styles page
        return redirect()->back(); // use this if you want to keep the update form displayed.
    }

    /**
     * Remove the specified instrument from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!(policy(new Instrument)->delete()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $instrument = Instrument::find($id);
        if ($instrument == NULL)
        {
            flash()->error("Unable to locate requested style in database.")->important();
        }

        if ($instrument->resources()->count() > 0)
        {
            flash()->error("Instrument '" . "$instrument->name" . "' is in use and therefore cannot be deleted")->important();
            return redirect()->back();
        }

        $instrument->delete();

        flash()->success("Instrument '" . "$instrument->name" . "' has been deleted from the database.");

        return redirect()->back();
        //return $this->index($request);
    }

}
