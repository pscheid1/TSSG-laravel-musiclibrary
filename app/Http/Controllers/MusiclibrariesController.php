<?php

namespace App\Http\Controllers;

//use Gate;
use App;
use App\Http\Controllers\Controller;
use App\Musiclibrary;
//use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use laracasts\flash;
//use App\Policies;
use App\User;
//use Hash;

class MusiclibrariesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index()
    {
        if (!(\policy(new Musiclibrary)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $musiclibrary = Musiclibrary::all();

        return view('musiclibrary.indexSongs', compact('musiclibrary'));
    }

    public function create()
    {
        if (!(\policy(new Musiclibrary)->create()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $stylesAdd = App\Style::pluck('DESCRIPTION', 'id')->toArray();
        //return $stylesAdd;
        $temposAdd = App\Tempo::pluck('DESCRIPTION', 'id')->toArray();
        //return $temposAdd;
        return view('musiclibrary.addSong', compact('song', 'stylesAdd', 'temposAdd'));
    }

    // public function store(CreateAddSongRequest $request)
    //{
    public function store(Request $request)
    {
        if (!(\policy(new Musiclibrary)->store()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $musicLibrary = new Musiclibrary($request->all());

        $this->validate($request, $musicLibrary::getRules());

        $musicLibrary->save();

        flash()->success("Song '" . $musicLibrary->TITLE . "' successfully added!");

        //return $this->index(); // if you want to return to the list songs view
        return redirect()->back(); // if you want return to a new add song view
    }

    public function show($id)
    {
        if (!(\policy(new Musiclibrary)->show()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $song = App\Musiclibrary::where('id', $id)->first();
        $styles = App\Style::pluck('DESCRIPTION', 'id');
        $tempos = App\Tempo::pluck('DESCRIPTION', 'id');
        $lastupdatedby = User::find($song->UPDATEUSERID)->firstname . ' ' . User::find($song->UPDATEUSERID)->lastname;
        //return $song;
        return view('musiclibrary.editSong', compact('song', 'styles', 'tempos', 'lastupdatedby'));
    }

    public function update(Request $request, $id)
    {
        if (!(\policy(new Musiclibrary)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        $song = Musiclibrary::findOrFail($id);

        $this->validate($request, $song->getUpdateRules());

        // if a form checkbox is not set (= 0) it is not returned in $request.
        // therefore, we don't know if user reset it or if the database value was already reset.
        // if a checkbox is set (=1), it is always returned in $request. 
        // again, we don't know if this is because the user set it or it was originally set in the database..
        // therefore, if we initialize the boolean to 0, it will be left in that state if the checkbox is not set
        // and it will be set to 1 if the form checkbox is set.

        $song->VOCAL = 0;
        $song->VOCALISTS = 0;
        $song->TRANSCRIPTION = 0;
        $song->COMMARRANGEMENT = 0;

        $song->update($request->all());
        flash()->success("Song '" . $song->TITLE . "' successfully updated!");

        //return $this->index();
        return redirect()->back(); // if you want to keep the updated form displayed.
    }

    public function destroy($musiclibrary)
    {
        if (!(policy(new Musiclibrary)->delete()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }


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

    public function edit(Musiclibrary $song)
    {
        return view('musiclibrary.editSong', $song);
    }

}
