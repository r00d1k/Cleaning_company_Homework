<?php
/**
 * Created by PhpStorm.
 * User: r00d1k
 * Date: 28.04.2017
 * Time: 4:53
 */

namespace App\Http\Controllers;

use App\Models\City,
    Illuminate\Http\Request,
    Session;

class SityController
{
    public function index()
    {
        $city = City::paginate(25);
        return view('city.index', ['city' => City::paginate(25)]);
    }

    public function create()
    {
        return view('city.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        City::create($requestData);
        Session::flash('flash_message', 'City added!');
        return redirect('city');
    }

    public function show($id)
    {
        $city = City::findOrFail($id);
        return view('city.show', compact('city'));
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('city.edit', compact('city'));
    }

    public function update($id, Request $request)
    {
        $requestData = $request->all();
        $city = City::findOrFail($id);
        $city->update($requestData);
        Session::flash('flash_message', 'City updated!');
        return redirect('city');
    }

    public function destroy($id)
    {
        City::destroy($id);
        Session::flash('flash_message', 'City deleted!');
        return redirect('city');
    }
}