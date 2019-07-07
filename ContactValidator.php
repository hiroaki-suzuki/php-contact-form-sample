<?php


class ContactValidator
{
    private $errors;

    private $inputs;

    public function __construct($inputs)
    {
        $this->errors = [];
        $this->inputs = $inputs;
    }

    public function validate()
    {
        $this->validateName();
        $this->validateEmail();
        $this->validateContent();

        return $this->errors;
    }

    private function validateName()
    {
        $errors = [];

        $name = $this->inputs['name'];
        if ($this->isEmpty($name)) {
            $errors[] = 'お名前を入力してください。';
        } else if (strlen($name) >= 20) {
            $errors[] = 'お名前は20文字以内で入力してください。';
        }

        if (!empty($errors)) {
            $this->errors['name'] = $errors;
        }
    }

    private function validateEmail()
    {
        $errors = [];

        $email = $this->inputs['email'];
        if ($this->isEmpty($email)) {
            $errors[] = 'メールアドレスを入力してください。';
        }

        if (!empty($errors)) {
            $this->errors['email'] = $errors;
        }
    }

    private function validateContent()
    {
        $errors = [];

        $content = $this->inputs['content'];
        if ($this->isEmpty($content)) {
            $errors[] = 'お問い合わせ内容が入力されていません。';
        } else if (strlen($content) >= 1000) {
            $errors[] = 'お問い合わせ内容は、1000文字以内で入力してください。';
        }

        if (!empty($errors)) {
            $this->errors['content'] = $errors;
        }
    }

    private function isEmpty($value)
    {
        return !isset($value) || $value === '';
    }
}