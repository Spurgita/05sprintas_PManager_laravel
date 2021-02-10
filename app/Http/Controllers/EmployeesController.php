<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('employees', ['employees' => \App\Models\Employees::all()]);
    }

    public function show($id)
    {
        return view('empl_update', ['employee' => \App\Models\Employees::find($id)]);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas! Galime pažiūrėti, kas bus jei bus neteisingas
        //     'name' => 'name|max:30',
        //     'surname' => 'surname|max:30',
        // ]);

        $empl = new \App\Models\Employees();
        $empl->name = $request['name'];
        $empl->surname = $request['surname'];
        $empl->proj_id = $request['proj_id'];

        return ($empl->save() !== 1) ?
            redirect('/Employees')->with('status_success', 'Employee created!') :
            redirect('/Employees')->with('status_error', 'Employee not created!');
    }

    public function destroy($id)
    {
        \App\Models\Employees::destroy($id);
        return redirect('/Employees')->with('status_success', 'Project deleted!');
    }

    public function update($id, Request $request)
    {
        // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
        // $this->validate($request, [
        //     // 'title' => 'required|unique:employees,title,' . $id . ',id|max:530',
        //     'name' => 'name|max:30',
        //     'surname' => 'surname|max:30'
        // ]);

        $empl = \App\Models\Employees::find($id);
        $empl->name = $request['name'];
        $empl->surname = $request['surname'];
        $empl->proj_id = $request['proj_id'];

        return ($empl->save() !== 1) ?
            redirect('/Employees/' . $id)->with('status_success', 'Project updated!') :
            redirect('/Employees/' . $id)->with('status_error', 'Project is not updated!');
    }
}
