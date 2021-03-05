<?php defined('SYSPATH') or die('No direct script access');

class Controller_Upload extends Controller_AdminPanel {

    protected $session;
    
    public function before(){
        parent::before();
       /* Session::$default = 'database';*/
        $this->session = parent::GetSess();
        if(!$this->is_logged_in()){
            Http::redicted('blog/index');
        }

    }

    public function action_index(){
        $view = View::factory('loadimage/index');
        $title = "Dodaj zdjęcie";
       //$this->response->body($view);
        $this->template->content = $view;
        $this->template->title = $title;
    }

    public function action_upload(){
        $view = View::factory('loadimage/upload');
        $error_message = NULL;
        $filename = NULL;

        if($this->request->method() == Request::POST){
            if(isset($_FILES['myimage'])){
                $filename = $this->_save_image($_FILES['myimage']);
            }
        }

        if(!$filename){
            $error_message = 'There is a problemwhile uploading foiles';
        }
        $title = 'Dodawanie zdjęcia';
        $view->uploaded_file = $filename;
        $view->error_message = $error_message;
       // $this->response->body($view);
       $this->template->content = $view;
       $this->template->title = $title;

    }

    protected function  _save_image($image){
        if(!Upload::Valid($image) OR
            !Upload::not_empty($image) OR
            !Upload::type($image, array('jpg','png','jpeg'))){
                    return false;
        }

       // $directory = DOCROOT . 'assets/images';
       $directory = 'assets/images/';

        if($file = Upload::save($image,NULL,$directory)){
           //$filename = strtolower(Text::random('alnum',20)) . '.jpg';
           $nr = ORM::factory('Posts')->count_all('id');
           $nr = $nr + 1;
           $filename = 'myimagesingallery_'.$nr.'.jpg';
            Image::factory($file)
                        ->resize(1200,null,Image::AUTO)
                        ->save($directory.$filename);
            //delete the temploary file
            unlink($file);

            return $filename;
        }
        return false;
    }

    protected function _save_db_image($image){

    }

    private function is_logged_in(){
        return $this->session->get('logged_in');
    }
    
    
}
