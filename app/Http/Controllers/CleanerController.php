<?php

namespace App\Http\Controllers;

use App\Models\CleanerInCities;
use App\Http\Requests\CleanerRequest;
use App\Models\Cleaner;
use App\Models\City;
use Session;

class CleanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cleaner = Cleaner::paginate(25);

        return view('cleaner.index', compact('cleaner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cleaner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CleanerRequest $request)
    {
        
        $requestData = $request->all();
        
        Cleaner::create($requestData);

        Session::flash('flash_message', 'Cleaner added!');

        return redirect('cleaner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cleaner = Cleaner::findOrFail($id);
        $cities = City::All();

        return view('cleaner.show', compact(['cleaner', 'cities']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cleaner = Cleaner::findOrFail($id);
        $cities = City::All();
        return view('cleaner.edit', compact(['cleaner', 'cities']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, CleanerRequest $request)
    {
        
        $requestData = $request->all();

        $cleaner = Cleaner::findOrFail($id);
        $cleaner->update($requestData);
        foreach ($cleaner->cities as $city) {
            if ($key = array_search($city->id, $requestData['cities'])) {
                unset($requestData['cities'][$key]);
            } else {
                $cleaner->cities()->detach($city->id);
            }

        }
        foreach ($requestData['cities'] as $city) {

            $cleaner->cities()->attach($city);
        }

        Session::flash('flash_message', 'Cleaner updated!');

        return redirect('cleaner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Cleaner::destroy($id);

        Session::flash('flash_message', 'Cleaner deleted!');

        return redirect('cleaner');
    }
}
