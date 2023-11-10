<?php 

trait TweetValidate
{
    public function validateMessage(string $value)
    {
        if (empty($value)) {
            $this->errors['message'] = "メッセージを入力してください。";
        }
    }

    function validate(array $posts)
    {
        $this->validateMessage($posts['message']);
    }

}
