<?php defined('SYSPATH') or die('No direct script access');

/* Tutorial en: Kohana tutorial #1 */

class Controller_EnLog extends Controller_Template {

    public $template = "logowanie";
    private $session;

    public function before(){
        parent::before();
        Session::$default = 'database';
        $this->session = Session::instance();

        if( $this->is_logged_in() != true )
        {
            $this->template = View::Factory('logowanie/index');
        }
    }

    public function action_index()
    {

    }

    private function is_logged_in(){
        return $this->session->get("loggen_in");
    }
}
