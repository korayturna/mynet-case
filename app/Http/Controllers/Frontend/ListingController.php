<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Person;

class ListingController extends Controller
{
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
        return view('frontend.listing.index', ['persons' => $persons, 'page' => $request->page]);
    }
}
