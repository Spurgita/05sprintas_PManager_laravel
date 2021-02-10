<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        return view('projects', ['projects' => \App\Models\Projects::all()]);
    }

    public function show($id)
    {
        return view('pr_update', ['project' => \App\Models\Projects::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas! Galime pažiūrėti, kas bus jei bus neteisingas
            'title' => 'required|unique:projects,title|max:30',
            // 'text' => 'required',
        ]);

        $proj = new \App\Models\Projects();
        $proj->title = $request['title'];

        return ($proj->save() !== 1) ?
            redirect('/Projects')->with('status_success', 'Project created!') :
            redirect('/Projects')->with('status_error', 'Project not created!');
    }

    public function destroy($id)
    {
        \App\Models\Projects::destroy($id);
        return redirect('/Projects')->with('status_success', 'Project deleted!');
    }

    public function update($id, Request $request)
    {
        // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
        $this->validate($request, [
            'title' => 'required|unique:projects,title,' . $id . ',id|max:530',
        ]);

        $proj = \App\Models\Projects::find($id);
        $proj->title = $request['title'];

        return ($proj->save() !== 1) ?
            redirect('/Projects/' . $id)->with('status_success', 'Project updated!') :
            redirect('/Projects/' . $id)->with('status_error', 'Project is not updated!');
    }
}
