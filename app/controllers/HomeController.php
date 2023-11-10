<?php

class HomeController extends Controller
{
    public function index()
    {
        Route::redirect('tweet/');
    }

}
