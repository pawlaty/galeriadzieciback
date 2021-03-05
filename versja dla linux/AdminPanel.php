<?php defined('SYSPATH') or die('No direct script access');

class Controller_AdminPanel extends Controller_Logowanie {
   
    protected $session;
    private $logged = false;
    private $url;
    private $name_url;

    public function before(){
        parent:: before();
        $this->session = parent::GetSess();
        $this->logged = $this->is_loggin_in();
    
        if(parent::GetLogged() == false ){
            Http::redirect('blog/index');
        }
    }

    public function action_index(){
        $this->url = "Blog/index";
        $this->name_url = "Galeria";
       
        $mymenu = View::factory('mymenu/index');
        $v = View::factory('AdminPanel/index');
       

        View::bind_global('logged',$this->logged);
        $this->template->title = 'Panel administracyjny '.$this->GetAuthorName();
        $this->template->content = $v;
        $this->template->mymenu = $mymenu;
    }

    private function is_loggin_in(){
        return $this->session->get('logged_in');
    }

    protected function GetSess(){
        return $this->session;
    }

    protected function GetAuthor(){
        return $this->session->get('logged_author_id');
    }

    protected function GetAuthorName(){
       $name = $this->session->get('logged_author');
       if($name === "Majka")
            return "Mai";
        elseif($name === "Karolinka")
            return "Karolinki" ;    

    }
}

?>