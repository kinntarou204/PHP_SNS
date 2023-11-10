<?php 
// Database
const DB_CONNECTION = 'mysql';
const DB_HOST = '127.0.0.1';
const DB_PORT = 3306;
const DB_DATABASE = 'php_sns';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

// APP
const APP_KEY = "php_sns";
const SITE_TITLE = "PHP SNS";

const BASE_DIR = __DIR__;
const APP_DIR = __DIR__ . "/app/";
const LIB_DIR = __DIR__ . "/lib/";
const DATA_DIR = __DIR__ . "/data/";
const MODEL_DIR = APP_DIR . "models/";
const VIEW_DIR = APP_DIR . "views/";
const CONTROLLER_DIR = APP_DIR . "controllers/";
const VALIDATE_DIR = APP_DIR . "validate/";
const LAYOUT_DIR = VIEW_DIR . "layouts/";

require_once LIB_DIR . 'functions.php';
require_once LIB_DIR . 'View.php';
require_once LIB_DIR . 'Session.php';
require_once LIB_DIR . 'Route.php';

require_once VALIDATE_DIR . 'UserValidate.php';
require_once VALIDATE_DIR . 'TweetValidate.php';

require_once MODEL_DIR . 'Model.php';
require_once MODEL_DIR . 'User.php';
require_once MODEL_DIR . 'Tweet.php';
require_once MODEL_DIR . 'Like.php';

require_once CONTROLLER_DIR . 'Controller.php';
require_once CONTROLLER_DIR . 'ApiController.php';
require_once CONTROLLER_DIR . 'TweetController.php';
require_once CONTROLLER_DIR . 'UserController.php';
require_once CONTROLLER_DIR . 'LoginController.php';
require_once CONTROLLER_DIR . 'RegistController.php';