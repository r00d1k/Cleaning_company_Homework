<?php
/**
 * Created by PhpStorm.
 * User: r00d1k
 * Date: 28.04.2017
 * Time: 4:53
 */

namespace App\Http\Controllers;

use App\Models\Sity,
    Illuminate\Http\Request,
    Session;

class SityController
{
    public function index()
    {
        $sity = Sity::paginate(25);
        return view('sity.index', ['sity' => Sity::paginate(25)]);
    }

    public function create()
    {
        return view('sity.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        Sity::create($requestData);
        Session::flash('flash_message', 'Sity added!');
        return redirect('sity');
    }

    public function show($id)
    {
        $sity = Sity::findOrFail($id);
        return view('sity.show', compact('sity'));
    }

    public function edit($id)
    {
        $sity = Sity::findOrFail($id);
        return view('sity.edit', compact('sity'));
    }

    public function update($id, Request $request)
    {
        $requestData = $request->all();
        $sity = Sity::findOrFail($id);
        $sity->update($requestData);
        Session::flash('flash_message', 'Sity updated!');
        return redirect('sity');
    }

    public function destroy($id)
    {
        Sity::destroy($id);
        Session::flash('flash_message', 'Sity deleted!');
        return redirect('sity');
    }
}