<?php defined('SYSPATH') or die('No direct script access');

class Controller_Logowanie extends Controller_Template {

  protected $session;

  public function before()
  {
    parent::before();
    Session::$default = 'database';
	//if(isset(Session::instance())) //zmiana
		$this->session = Session::instance();
	
  }

 

  public function action_login(){
    if($this->GetLogged() == true){
      Http::redirect('adminPanel/index');
    }

    if($_POST)
    {
      try
      {
        $user = $this->request->post('log_name');
        $pass = $this->request->post('log_pass');
        $author = ORM::factory('Author')->where('name','=',$user)->find();
      
        if(password_verify($pass,$author->mypass)){
            $this->session->set('logged_in', true);
            $this->session->set('logged_author_id',$author->id_authors);
            
            Http::redirect('AdminPanel/index');
        }
        else
        {
          $err = "nieprawidlowe hasło lub login";
          Http::redirect('logowanie/login')->bind('errors', $err);
        }
      }
      catch(ORM_Validation_Exception $e)
      {
        $errors=$e->errors('model');
      }
    }
    $logowanie = View::factory('logowanie/index')->bind('errors',$errors)->bind('values',$_POST);
   // $this->response->body($logowanie);
   $this->template->content = $logowanie;
   $this->template->title = "logowanie";

  } 
  
  public function action_logout(){
   
    $this->session->delete('logged_in');
    
   $this->template->title = "logout";
   $this->template->content ="";
   
   Http::redirect('blog/index');;
    
    
  }

  protected  function GetLogged(){
    return $this->session->get('logged_in');
   
  }

  protected function SetLogout(){
    $this->session->set('logged_in', false);
  }

  protected function GetSess(){
    return $this->session;
  }
    
}

