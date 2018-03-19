<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainpageController extends Controller
{
	/**
	 * Show the main page.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('mainpage');
	}
}
