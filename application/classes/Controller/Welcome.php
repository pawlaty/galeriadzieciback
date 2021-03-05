<?php

class Controller_Welcome extends Controller_Template
{
   

    public function action_index()
    {
        $v = View::factory('welcome/index');
       $this->template->content = $v;
    }

    public function action_echo(){
        $message = $this->request->param('id');
        $this->response->body('You said :   ' . $message);
    }

}
