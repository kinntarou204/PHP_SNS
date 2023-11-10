<?php
class User extends Model
{
    use UserValidate;

    public string $table = "users";
    public array $columns = ['id', 'name', 'email', 'password'];
    public string $csv_file = DATA_DIR . "users.csv";

    function findByEmail($email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = \"{$email}\";";
        $user = $this->fetchBySQL($sql);
        return $user;
    }

    function auth(string $email, string $password)
    {
        $user = $this->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            $this->errors['email'] = "ユーザ名かパスワードが間違っています。";
        }
    }

}
