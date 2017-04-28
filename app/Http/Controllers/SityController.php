<?php
/**
 * Created by PhpStorm.
 * User: r00d1k
 * Date: 28.04.2017
 * Time: 4:53
 */

namespace App\Http\Controllers;

use App\Models\Sity;

class SityController
{
    public function index()
    {
        $sity = Sity::paginate(25);
        return view('sity.index', ['sity' => Sity::paginate(25)]);
    }
}