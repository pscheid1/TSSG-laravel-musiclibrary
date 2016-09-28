<?php

namespace App\Http\Controllers;

use Gate;
use App;
use App\Http\Controllers\Controller;
use App\Musiclibrary;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use laracasts\flash;
use App\Policies;
use Hash;
use Carbon\Carbon;

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

    public function store(Request $request)
    {
        if (!(\policy(new Musiclibrary)->store()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        
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

        $rqst = $request->all();
        /// if a checkbox is not checked, it's value is not sent
        // without an explicit check it would never get set off
        if (!$request->has('VOCAL'))
        {
            $rqst = \array_merge($rqst, array("VOCAL" => "0"));
        }
        if (!$request->has('TRANSCRIPTION'))
        {
            $rqst = \array_merge($rqst, array("TRANSCRIPTION" => "0"));
        }
        if (!$request->has('COMMARRANGEMENT'))
        {
            $rqst = \array_merge($rqst, array("COMMARRANGEMENT" => "0"));
        }

        if ($request->has('PUBYEAR'))
        {
            {
                $now = Carbon::now();
                $pub_year = intval($request->PUBYEAR);
                if ($pub_year < 1700 || $pub_year > $now->year)
                {
                    flash()->error("Publication Year must be > 1700 and less than or equal to the current year.")->important();
                    return redirect()->back()->withInput();
                }
            }
        }
        else
        {
            $rqst = \array_merge($rqst, array("PUBYEAR" => ''));
        }

        $musicLibrary->save($rqst);

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
        //return $song;
        return view('musiclibrary.editSong', compact('song', 'styles', 'tempos'));
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

        $rqst = $request->all();
        /// if a checkbox is not checked, it's value is not sent
        // without an explicit check it would never get set off
        if (!$request->has('VOCAL'))
        {
            $rqst = \array_merge($rqst, array("VOCAL" => "0"));
        }

        if (!$request->has('TRANSCRIPTION'))
        {
            $rqst = \array_merge($rqst, array("TRANSCRIPTION" => "0"));
        }

        if (!$request->has('COMMARRANGEMENT'))
        {
            $rqst = \array_merge($rqst, array("COMMARRANGEMENT" => "0"));
        }

        if ($request->has('PUBYEAR'))
        {
            {
                $now = Carbon::now();
                $pub_year = intval($request->PUBYEAR);
                if ($pub_year < 1700 || $pub_year > $now->year)
                {
                    flash()->error("Publication Year must be > 1700 and less than or equal to the current year.")->important();
                    return redirect()->back()->withInput();
                }
            }
        }
        else
        {
            $rqst = \array_merge($rqst, array("PUBYEAR" => ''));
        }

        $song->update($rqst);
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
