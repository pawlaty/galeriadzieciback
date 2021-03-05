<?php defined('SYSPATH') or die('No direct script access');

class Controller_Upload extends Controller_AdminPanel {

    protected $session;
    private $directory = 'assets/images/';
    
    public function before(){
        parent::before();
       /* Session::$default = 'database';*/
        $this->session = parent::GetSess();
        if(!$this->is_logged_in()){
            Http::redicted('blog/index');
        }

        $this->gen_model = Model::factory('Genre');
     
    }

    public function action_index(){
       
        $genres = $this->gen_model->GetGenres();
       
        $view = View::factory('loadimage/index')->bind('values',$_POST)                                               
                                                ->bind('genres',$genres)
                                                ->bind('errors',$errors);
        $title = "Dodaj zdjęcie";
        $this->template->content = $view;
        $this->template->title = $title;
    }

    public function action_upload(){
        $view = View::factory('loadimage/upload');
        $error_message = NULL;
        $filename = NULL;

        //1) jeżeli istnieje request POST
            //jeżeli jest w tym requescie FILES[myimage]
               /*to wykona sie metoda this->save image na tej zmiennej
                 ktora zwroci do zmiennej nazwe pliku*/
        if($this->request->method() == Request::POST){
            if(isset($_FILES['myimage'])){
               
                    $filename = $this->_save_image($_FILES['myimage']);
                    //$filename = $this->directory . $filename;
                    $uploadimage = $this->_save_db_image($filename);
            }
    
        }


        //2) jezeli nazwa pliku == false
        if(!$filename){
            $error_message = '<span style="color:red">There is a problem while uploading file</span>';
            
        }

        if(!$uploadimage){
            $error_message = '<span style="color:red">There is a problem while save file in DB</span>';
        }

        //3) jeżeli nazwa pliku == true
        $title = 'Dodawanie zdjęcia';
       
        $view->uploaded_file = $filename;
        $view->error_message = $error_message;
        $this->template->content = $view->bind('values',$_POST)->bind('errors',$errors);
        $this->template->title = $title;
        //end of action_upload
    }
    /*zapis zdjecia na dysk*/
    protected function  _save_image($image){
        //walidacja zakonczenie jezeli false
        if(!Upload::Valid($image) OR
            !Upload::not_empty($image) OR
            !Upload::type($image, array('jpg','png','jpeg'))){
                    return false;
        }

       // $directory = DOCROOT . 'assets/images';
      

        if($file = Upload::save($image,NULL,$this->directory)){
           //$filename = strtolower(Text::random('alnum',20)) . '.jpg';
          
           $filename = 'myimagesingallery_'.$this->NrId().'.jpg';
            Image::factory($file)
                        ->resize(800,null,Image::AUTO)
                        ->save($this->directory.$filename);
            //delete the temploary file
            unlink($file);

            return $filename;
        }
        return false;
    }
    /*zapis zdjecia do DB*/
    protected function _save_db_image($image){
        try
        {
            if($image == '')
            {
                $errors = 'Nie wybrano zdjęcia';
                return false;
            }
            else
            {
                $post = ORM::factory('Posts');
               
                //$this->PrintErr(parent::GetAuthor());
                $post->id = $this->NrId();
                $post->id_authors = parent::GetAuthor();
                $post->path = 'assets\\images\\'.$image;
                
                          /*
                $post->content = $_POST['mycontent'];
                $post->id_genres =  $_POST['genres'];
                $post->name = $_POST['name'];*/
                
                $post->content = $this->request->post('mycontent');
                $post->id_genres =  $this->request->post('genres');
                $post->name = $this->request->post('name');

                $post->save();
                return true;
            }
        }
        catch(ORM_Validation_Exception $e)
        {
           // $errors = 'Błąd z zapisem do bazy danych';
           $errors = $e->errors('model');
           return false;
        }
       
    }

    private function is_logged_in(){
        return $this->session->get('logged_in');
    }

    private function NrId(){
        $records = ORM::factory('Posts')->find_all();
        $licznik = 1;
        foreach($records as $r){
           ++$licznik;
       }
     
       $this->PrintErr($licznik);
      
       return $licznik;
    }



    private function PrintErr($err){
       echo '<script type="text/javascript">console.log(';
       print_r($err);
       echo ');</script>';
    }


    
    
}
