<?php 

trait UserValidate
{

    public function validateEmail(string $value)
    {
        if (empty($value)) {
            $this->errors['email'] = "Emailを入力してください。";
        }
    }

    public function validatePassword(string $value)
    {
        $pattern = "/^[\w\.\@\/\-]{4,15}$/";
        if (empty($value)) {
            $this->errors['password'] = "パスワードを入力してください。";
        } else if (!preg_match($pattern, $value)) {
            $this->errors['password'] = "パスワードは4文字以上15文字以内で入力してください。";
        }
    }

    public function validateName(string $value)
    {
        $length = mb_strlen($value);
        if (empty($value)) {
            $this->errors['name'] = "氏名を入力してください。";
        } else if ($length > 20) {
            $this->errors['name'] = "氏名は20文字以内で入力してください。";
        }
    }

    public function validateExistsEmail(string $value)
    {
        if ($this->findByEmail($value)) {
            $this->errors['email'] = "Emailが既に存在します。";
        }
    }

    function validateLogin(array $posts)
    {
        $this->validateEmail($posts['email']);
        $this->validatePassword($posts['password']);
    }

    function validateRegist(array $posts)
    {
        $this->validateName($posts['name']);
        $this->validateEmail($posts['email']);
        $this->validateExistsEmail($posts['email']);
        $this->validatePassword($posts['password']);
    }

}
