<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Musiclibrary;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use laracasts\flash;

class MusiclibrariesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }
    
    public function index()
    {
        $musiclibrary = Musiclibrary::all();

        return view('musiclibrary.indexSongs', compact('musiclibrary'));
    }

    // public function store(CreateAddSongRequest $request)
    //{
    public function store(Request $request)
    {
        $musicLibrary = new Musiclibrary($request->all());

        if ($request->STYLEID === '0')
        {
            flash()->error('A Style selection is required')->important();
            return redirect()->back()->withInput();
 
        }

        if ($request->TEMPOID === '0')
        {
            flash()->error('A Tempo selection is required')->important();
            return redirect()->back()->withInput();
        }

        $this->validate($request, $musicLibrary::getRules());

        $musicLibrary->save();

        flash()->success("Song '" .$musicLibrary->TITLE ."' successfully added!");

        //return $this->index(); // if you want to return to the list songs view
        return redirect()->back(); // if you want return to a new add song view
    }

    public function create()
    {
        $stylesAdd =  array('--- Select one ---') + App\Style::pluck('DESCRIPTION', 'id')->toArray();
        //return $stylesAdd;
        $temposAdd =  array('--- Select one ---') + App\Tempo::pluck('DESCRIPTION', 'id')->toArray();
        //return $temposAdd;
        return view('musiclibrary.addSong', compact('song', 'stylesAdd', 'temposAdd'));
    }

    public function destroy($musiclibrary)
    {

        $song = App\Musiclibrary::where('id', $musiclibrary)->first();
        if ($song == NULL)
        {
            flash()->error("Unable to locate requested song in database.")->important();
        }
        else
        {
            $song->delete();
            flash()->success("Song '" . "$song->TITLE" . "' has been deleted from the database.");
        }
        
        return $this->index();
    }

    public function update(Request $request, $id)
    {
        $song = Musiclibrary::findOrFail($id);

        $this->validate($request, $song->getUpdateRules());

        $song->update($request->all());
        flash()->success("Song '" .$song->TITLE ."' successfully updated!");

        //return $this->index();
        return redirect()->back(); // if you want to keep the updated form displayed.
    }

    public function show($id)
    {
        $song = App\Musiclibrary::where('id', $id)->first();
        $styles = App\Style::pluck('DESCRIPTION', 'id');
        $tempos = App\Tempo::pluck('DESCRIPTION', 'id');
        //return $song;
        return view('musiclibrary.editSong', compact('song', 'styles', 'tempos'));
    }

    public function edit(Musiclibrary $song)
    {
        return view('musiclibrary.editSong', $song);
    }

}
