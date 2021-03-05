<?php defined('SYSPATH') or die('No direct script access');

class Controller_AdminPanel extends Controller_Logowanie {
   
    protected $session;
   
    private $logged = false;
    private $url;
    private $name_url;
    private $idtodel;

    public function before(){
        parent:: before();

        $this->session = parent::GetSess();
        $this->logged = $this->is_loggin_in();
    
        if(parent::GetLogged() == false ){
            Http::redirect('blog/index');
        }

        $this->Setidtodel();
       
    }

    public function action_index(){
        $this->url = "blog/index";
        $this->name_url = "Galeria";
       
         /*pobiera wszystkie rekordy zalogowanego*/
        $postes = ORM::factory('Posts')->where('id_authors','=',$this->GetAuthor())->find_all();

        $mymenu = View::factory('mymenu/index');
        $v = View::factory('AdminPanel/index')->bind('postses',$postes)->bind('del_p',$this->idtodel);
        

        View::bind_global('logged',$this->logged);
        $this->template->title = 'Panel administracyjny '.$this->GetAuthorName();
        $this->template->content = $v;
        $this->template->mymenu = $mymenu;
    }

    public function action_deletepost(){
       
       
            $this->template->title = 'Delete in progress';
            $this->template->content = 'in progress...';
            $this->template->mymenu = '';
           
            if(isset($_GET['idtodel'])){
             $this->idtodel = $_GET['idtodel'];
            }

            Http::redirect('AdminPanel/index')->bind('del_p', $_GET['idtodel']);
            //->bind('del_p', $this->idtodel); 
           
           
        
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

    private function Setidtodel(){
        
        if($_GET AND is_numeric($_GET['idtodel']))
        {
           $this->idtodel = $_GET['idtodel'];
        }
    }

    private function Getidtodel(){
        return $this->idtodel;
    }
}

?>