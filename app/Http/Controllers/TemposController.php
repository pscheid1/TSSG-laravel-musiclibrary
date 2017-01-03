<?php

namespace App\Http\Controllers;

//use Gate;
//use App;
use App\Http\Controllers\Controller;
use App\Tempo;
//use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
//use Laracasts\Flash;
//use App\Role;
use App\User;
//use App\Policies;

class TemposController extends Controller
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
        if (!(\policy(new Tempo)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $tempos = Tempo::all();
        $updaters = array();
        foreach ($tempos as $tempo)
        {
            //$updaters[$tempo->id] = User::find($tempo->UPDATEUSERID)->username;
            $updaters[$tempo->id] = User::find($tempo->UPDATEUSERID)->firstname . ' ' . User::find($tempo->UPDATEUSERID)->lastname;               
        }
        
        return view('tempo.indexTempos', compact('tempos', 'updaters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!(policy(new Tempo)->create($request->user())))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        return view('tempo.addTempo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(\policy(new Tempo)->store($request->user())))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $tempo = new Tempo($request->all());

        $this->validate($request, $tempo::getRules());

        $tempo->updateuserid = \Auth::user()->id;        
        $tempo->save();

        flash()->success("Tempo '" . $tempo->DESCRIPTION . "' successfully added!");

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
        if (!(policy(new Tempo)->show()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $tempo = Tempo::find($id);

        if ($tempo == NULL)
        {
            flash()->error("Unable to locate requested tempo in database.")->important();
        }

        //$updateusername = User::find($tempo->UPDATEUSERID)->username;
        $updateusername = User::find($tempo->UPDATEUSERID)->firstname . ' ' . User::find($tempo->UPDATEUSERID)->lastname;        
        return view('tempo.editTempo', compact('tempo', 'updateusername'));
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
        $tempo = Tempo::findOrFail($id);
        if (!(policy($tempo)->update($request->user())))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $this->validate($request, $tempo->getUpdateRules());

        $tempo->updateuserid = \Auth::user()->id;        
        $tempo->update($request->all());

        flash()->success("Tempo '" . $tempo->DESCRIPTION . "' successfully updated!");

        //return $this->index();
        return redirect()->back(); // if you want to keep the update form displayed.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!(policy(new Tempo)->delete($request->user())))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }


        $tempo = Tempo::find($id);
        if ($tempo == NULL)
        {
            flash()->error("Unable to locate requested tempo in database.")->important();
        }

        if ($tempo->musiclibrary()->count() > 0)
        {
            flash()->error("Tempo '" . "$tempo->DESCRIPTION" . "' is in use and therefore cannot be deleted")->important();
            return redirect()->back();
        }

        $tempo->delete();

        flash()->success("Tempo '" . "$tempo->DESCRIPTION" . "' has been deleted from the database.");


        return redirect()->back();
        //return $this->index($request);
    }

}
