<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Tempo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Laracasts\Flash;

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
        $tempos = Tempo::all();
        //return compact('tempos');
        return view('tempo.index', compact('tempos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function show($id)
    {
        $tempo = App\Tempo::where('id', $id)->first();
        //return $tempo->toArray();
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
    public function destroy($id)
    {
        $tempo = App\Tempo::where('id', $id)->first();
        if ($tempo == NULL)
        {
            flash()->error("Unable to locate requested tempo in database.")->important();
        }
        else
        {
            try
            {
                $tempo->delete();
            }
            catch (\Exception $e)
            {
                //flash()->error($e->getMessage());
                flash()->error("Tempo '" . "$tempo->DESCRIPTION" . "' is in use and therefore cannot be deleted")->important();
                
                return redirect()->back();
            }

            flash()->success("Tempo '" . "$tempo->DESCRIPTION" . "' has been deleted from the database.");
        }

        return $this->index();
    }

}
