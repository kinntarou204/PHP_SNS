<?php

class RegistController extends Controller
{
    public function index()
    {
        Session::forget("member");
        Session::forget("errors");
        Route::redirect('input.php');
    }

    public function input()
    {
        $data = [
            'member' => Session::get("member"),
            'errors' => Session::get("errors"),
        ];
        View::render('regist/input', $data);
    }

    public function confirm()
    {
        checkPostRequest();
        $posts = check($_POST);
        Session::add("member", $_POST);

        $user = new User();
        $user->validateRegist($posts);

        Session::add("errors", $user->errors);
        if ($user->errors) {
            Route::redirect('input.php');
        }
        $data = [
            'posts' => $posts,
            'errors' => $user->errors,
        ];
        View::render('regist/confirm', $data);
    }

    public function add()
    {
        checkPostRequest();
        if ($posts = Session::get("member")) {
            $posts['password'] = password_hash($posts['password'], PASSWORD_DEFAULT);
            $user = new User();
            $user->save($posts);
        }

        Route::redirect('result.php');
    }

    public function result()
    {
        if (Session::has('member')) {
            Session::forget('member');
            View::render('regist/result');
        } else {
            Route::redirect('./');
        }
    }
}
