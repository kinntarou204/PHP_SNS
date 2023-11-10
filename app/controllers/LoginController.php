<?php

class LoginController extends Controller
{
    public function index()
    {
        Session::forget("login");
        Session::forget("errors");
        Route::redirect('input.php');
    }

    public function input()
    {
        $checked = '';
        $member = [];
        $errors = [];

        if (isset($_SESSION['login'])) {
            $member['email'] = $_SESSION['login']['email'];
        }
        $errors = Session::get('errors');

        $data = [
            'member' => $member,
            'errors' => $errors,
            'checked' => $checked,
        ];
        View::$layout_name = 'login';
        View::render('login/input', $data);
    }

    public function auth()
    {
        checkPostRequest();

        $user = new User();
        $posts = check($_POST);
        Session::add('login', $_POST);

        $user->validateLogin($posts);

        if (!$user->errors) {
            $auth_user = $user->auth($posts['email'], $posts['password']);
            if ($auth_user) {
                Session::add('auth_user', $auth_user);
                Route::redirect('../');
            }
        }

        Session::add('errors', $user->errors);
        if ($user->errors) {
            Route::redirect('input.php');
        }
    }
}
