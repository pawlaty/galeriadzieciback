<?php defined('SYSPATH') or die('No direct script access');

class Controller_Blog extends Controller_Template {

  public function before(){
     parent::before(); // musi byc aby uniknąc error:: 
      //ErrorException [ Warning ]: Attempt to assign property 'title' of non-object
    $this->blog_model = Model::factory('Posts');

    if($_GET AND is_numeric($_GET['withonegetposts']))//$this->request->method() == Request::GET)
    {
    // $this->lastrecord = $_GET['withonegetposts'];//$this->request->get('withonegetposts');
    $this->blog_model->SetLastRecord($_GET['withonegetposts']); 
    $this->lastrec = $_GET['withonegetposts'];

    }
    else
    {
      //$this->lastrecord = $this->blog_model->GetLastRecord();
      $this->blog_model->SetLastRecord($this->blog_model->GetLastRecord());
    }
   
   }
  
    public function action_index()
    {
      try
      {
      // $posts = ORM::factory('Posts')->where('path','!=',"")->find_all();
       $posts = $this->blog_model->GetPostsAsArray();
       
      // echo Debug::dump($posts);
      }
      catch(ORM_Validation_Exception $e)
      {
        $errors = '<div>Przepraszamy, galeria chwilowo niedostępna<br> spróbuj w późniejszym terminie. </div>';
      }
       
        $withonegetps =  $this->blog_model->CountPostses();
        $view = View::factory('blog/index')->bind('posts',$posts)
                                           ->bind('lastrec',$this->lastrec)
                                           ->bind('withonegetps',$withonegetps);
        $menu = View::factory('mymenu/index');
        // $this->logged = $this->is_loggin_in();
        $this->template->title = 'Galeria Mai I Karolci';
        $this->template->content = $view->bind('err',$errors)->render();
     
        $this->template->mymenu = $menu;
                                      /*  ->bind('url', $this->url)
                                        ->bind('name_url', $this->name_url);*/
     
    }

    

  
}
