<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Musiclibrary;
use Illuminate\Http\Request;
use laracasts\flash;
use App\User;
use App\Http\Controllers\Helpers\PageSizeHelper;

class MusiclibrariesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index(Request $request)
    {
        if (!(\policy(new Musiclibrary)->index()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }

        // get this users page size for this list
        $pgSizeHelper = new PageSizeHelper();
        $pgSzIndx = $pgSizeHelper->getPgSzIndx('songs', $request->pageSize);

        $songs = Musiclibrary::sortable()->paginate(PAGESIZES[$pgSzIndx]);
        $songs->appends($request->input());
        
        return view('musiclibrary.indexSongs', compact('songs', 'pgSzIndx'));
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

        $song = new Musiclibrary($request->all());

        $this->validate($request, $song::getRules());

        $song->UPDATEUSERID = \Auth::user()->id;
        $song->save();

        flash()->success("Song '" . $song->TITLE . "' successfully added!");

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

        // if a form checkbox is not set (= 0) its attribute is not returned in $request and therefore will not
        // be written to the database.
        // if a checkbox is set (=1), the attribute is always returned in $request and therefore will be 
        // wirtten to the database.
        // therefore, if we initialize the boolean to 0 (which is already in memory in $song),
        // it will either be written to the database or set to 1 depending on what state the checkbox is set to.

        $song->VOCAL = 0;
        $song->VOCALISTS = 0;
        $song->TRANSCRIPTION = 0;
        $song->COMMARRANGEMENT = 0;
        $song->UPDATEUSERID = \Auth::user()->id;

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
