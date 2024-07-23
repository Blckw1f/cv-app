<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Resources\CVResource;
use App\Http\Resources\PersonResource;
use App\Models\CV;
use App\Models\Person;

class SearchController extends Controller
{
    public function index()
    {

        return view('search');
    }
    public function search(SearchRequest $request)
    {
        $newRequest = $request->validated();
        $personIds = Person::where('birth_date', '>=', $newRequest['start_date'])
            ->where('birth_date', '<=', $newRequest['end_date'])->get()->pluck('id')->toArray();
        $cvs = CV::whereIn('person_id', $personIds)->with('person', 'university', 'skills')->get();
        return $cvs;
    }
}
