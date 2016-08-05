<?php

namespace App\Http\Controllers;

use Gate;
use App;
use App\Http\Controllers\Controller;
use App\Tempo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Laracasts\Flash;
use App\UserType;
use App\User;
use App\Policies;

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
    public function index(Request $request)
    {
        if (!(\policy(new Tempo)->index($request->user())))
        {
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }

        $tempos = Tempo::all();
        return view('tempo.index', compact('tempos'));
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
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
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
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }

        $tempo = new Tempo($request->all());

        $this->validate($request, $tempo::getRules());

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
        $tempo = Tempo::findOrFail($id);

        if ($tempo == NULL)
        {
            flash()->error("Unable to locate requested tempo in database.")->important();
        }

        if (!(policy($tempo)->show($request->user())))
        {
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }

        return view('tempo.editTempo', compact('tempo'));
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
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }

        $this->validate($request, $tempo->getUpdateRules());

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
        $tempo = Tempo::findOrFail($id);
        if ($tempo == NULL)
        {
            flash()->error("Unable to locate requested tempo in database.")->important();
        }

        if ($tempo->musiclibrary()->count() > 0)
        {
            flash()->error("Tempo '" . "$tempo->DESCRIPTION" . "' is in use and therefore cannot be deleted")->important();
            return redirect()->back();
        }

        if (!(policy($tempo)->delete($request->user())))
        {
            flash()->error("User '" . request()->user()->username . "' does not have sufficient  access level for the requested function")->important();
            return redirect()->back();
        }

        $tempo->delete();

        flash()->success("Tempo '" . "$tempo->DESCRIPTION" . "' has been deleted from the database.");


        return redirect()->back();
        //return $this->index($request);
    }

}
