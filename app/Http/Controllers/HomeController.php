<?php

namespace CodingTask\Http\Controllers;

class HomeController extends Controller
{
    private static $viewData = [];

    public function __construct()
    {
        self::$viewData['pageInfo'] = (object) [
            'title' => trans('general.home_page'),
        ];
    }

    public function home()
    {
        return view('pages.home')
            ->with(self::$viewData);
    }
}
