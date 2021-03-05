<?php defined('SYSPATH') or die('No direct script access');

class Controller_About extends Controller_Template {

    public function action_index(){
       $myview = View::factory('About/index'); 
       $mymenu = View::factory('mymenu/index');
       $this->template->title = 'oto my';
       $this->template->content = $myview;
       $this->template->mymenu = $mymenu;
    }

}