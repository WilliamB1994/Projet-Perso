<?php

class RegisterForm extends Form {
    function build() {
        $this->addFormField('firstName');
        $this->addFormField('lastName');
        $this->addFormField('email');
        $this->addFormField('password');
        $this->addFormField('year');
        $this->addFormField('month');
        $this->addFormField('day');
    }
}