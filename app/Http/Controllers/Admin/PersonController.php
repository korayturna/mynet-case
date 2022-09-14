<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Helpers\FormatHelper;
use App\Rules\GenderCheck;

class PersonController extends Controller
{
    use FormatHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $persons = Person::orderBy('id', 'desc')->paginate(10);
        return view('admin.person.index', ['persons' => $persons, 'page' => $request->page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $status = isset($request->status)?$request->status:false;
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => ['required', 'max:50'],
                'gender' => ['required', new GenderCheck()],
                'birthday' => ['required', 'date_format:d/m/Y'],
            ]);
            
            $person = new Person();
            $person->name = $request->name;
            $person->gender = $request->gender;
            $person->birthday = $this->convertdateFormat($request->birthday);
            $status = $person->save();
            return redirect()->route('person.create', ['status' => $status]);
        }
        return view('admin.person.create', ['status' => $status]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $status = false;
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => ['required', 'max:50'],
                'gender' => ['required', new GenderCheck()],
                'birthday' => ['required', 'date_format:d/m/Y'],
            ]);
            
            $person = Person::find($id);
            $person->name = $request->name;
            $person->gender = $request->gender;
            $person->birthday = $this->convertdateFormat($request->birthday);
            $person->save();
            $status = $person->wasChanged();
        }
        $person = Person::where('id', $id)->first();
        return view('admin.person.edit', ['person' => $person, 'status' => $status, 'page' => $request->page]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $person = Person::where('id', $id)->first()->delete();
        return redirect()->route('person', ['page' => $request->page])->with('status', 'Silindi');
    }
}
