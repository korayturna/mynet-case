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
        $persons = Person::addSelect(['post_code' => function ($query) {
        $query->select('post_code')
            ->from('address')
            ->whereColumn('person_id', 'person.id')
            ->limit(1);
        }])->orderBy('id', 'desc')
        ->paginate(10);
        return view('admin.person.index', ['persons' => $persons, 'page' => $request->page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $status = false;
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => ['required', 'max:50'],
                'gender' => ['required', new GenderCheck()],
                'birthday' => ['required', 'date_format:d/m/Y'],
            ]);
            $status = PersonController::store($request);
        }
        return view('admin.person.create', ['status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Person::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'birthday' => $this->convertdateFormat($request->birthday),
        ]);
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
            $status = PersonController::update($request, $id);
        }
        $person = Person::where('id', $id)->first();
        return view('admin.person.edit', ['person' => $person, 'status' => $status, 'page' => $request->page]);
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
        return Person::where('id', $id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'birthday' => $this->convertdateFormat($request->birthday),
        ]);
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
