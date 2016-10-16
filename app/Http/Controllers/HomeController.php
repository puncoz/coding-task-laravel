<?php

namespace CodingTask\Http\Controllers;

use Illuminate\Http\Request;

use CodingTask\Http\Requests;

class HomeController extends Controller
{
    private static $viewData = [];

    function __construct()
    {
        self::$viewData['pageInfo'] = (object) [
            'title' => 'Home',
        ];
    }

    public function home()
    {
        return view('pages.home')
            ->with(self::$viewData);
    }
}
