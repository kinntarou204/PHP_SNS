<?php
class UserController extends Controller
{
    public $auth_user;

    public function __construct() {
        if (Session::has("auth_user")) {
            $this->auth_user = Session::get("auth_user");
        } else {
            Route::redirect('../login/');
        }
    }

    public function index()
    {
        $data = [
            'user' => $this->auth_user,
        ];
        View::render('user/index', $data);
    }

    public function logout()
    {
        Session::forget('auth_user');
        Route::redirect('../login/');
    }
}
