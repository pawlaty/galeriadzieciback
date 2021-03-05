<?php 
   
    class Model_Posts extends ORM {

      protected $lastrecord; //pobierany w kontrolerze
      protected $_lastrecord; //przekazywany z kontrolera  do zapytania

      public function before(){
        //parent::before();
        $this->LastPosts();
      }

      

      /*wykonywana w kontrolerze gdy jest  GET ustawia ostni rekord*/
      public function SetLastRecord($record){$this->_lastrecord = $record;}
      
      /*wykonywana w kontrolerze gdy nie ma GET*/
      public function GetLastRecord(){$this->LastPosts();return $this->lastrecord;}

      
      /**Liczy rekordy postow z DB */
      private function LastPosts(){
        $this->lastrecord = ORM::factory('Posts')->find_all()->count();
      }

      /*ustawia select -- zwraca tablice do opisania SELECTA w widoku*/
      public function CountPostses(){
        //$c_postses = ORM::factory('Posts')->find_all()->count();
        
        $this->LastPosts();
        $c_postses = $this->lastrecord;
        //$this->lastrecord =  $c_postses;

        $c_postses_asarray = array();
      /* array_push_assoc($c_postses_asarray, $nr,$nr);*/
      /*pierwsza dziesiayka*/
      $nr = (string)($c_postses).' do '.(string)($c_postses-10);
      $c_postses_asarray[$c_postses] = $nr;
      $c_postses -=10;

      /**nastepne dziesiatki */
        while( $c_postses>0){
          if(($c_postses-10)>=10 )
            $nr = (string)($c_postses-1).' do '.(string)($c_postses-10);
		  elseif(($c_postses-10)<=10 AND ($c_postses-10)>1)
			$nr = (string)($c_postses-1).' do '.(string)($c_postses-10);
          else
            $nr = (string)($c_postses-1).' do 1';
        
          $c_postses_asarray[($c_postses-1)] = $nr;
          $c_postses -=10;
        }
      return $c_postses_asarray;
      } 

      protected $_has_many = array(
       // protected $_belongs_to = array(    
            'authors' =>array(
                     'model' => 'Author',
                     'foreign_key' => 'id_authors'
                     ),
            'genres' => array(
                    'model' => 'Genre',
                    'foreign_key' => 'id_genres'
                    )
            
      );

      protected $_load_with = array(
          'Author' ,'Genre'
      );

      public function GetPostsAsArray()
      {
     
         /*działa  
          $query =  DB::query(DataBase::SELECT,'select  postses.id,
                                                        postses.name, 
                                                        postses.content,
                                                        postses.path,
                                                        postses.id_authors,
                                                        postses.id_genres,
                                                        authors.name as aname,
                                                        genres.name as gname
            from((postses inner JOIN authors on postses.id_authors = authors.id_authors)
                          inner JOIN genres  on postses.id_genres  = genres.id_genres)
                          order by postses.id DESC limit  4'  
                          
                          )
                         // ->offset(4)
                          ->execute();
          // return $query->as_array();
         // echo Debug::dump($query);
         
          return $query;
*/  
       $query = DB::select(
                              'postses.id',
                              'postses.name', 
                              'postses.content',
                              'postses.path' ,
                               array('authors.name','aname'),
                               array('genres.name','gname')
                          )
                      ->from('postses')
                      ->join('authors','INNER')
                      ->on('postses.id_authors', '=', 'authors.id_authors')
                      ->join('genres','INNER')
                      ->on('postses.id_genres', '=', 'genres.id_genres')
                      //->order_by('postses.id','DESC')
                      //->offset($this->_lastrecord)
                      //->offset($_GET['withonegetposts'])
                     
                      // ->where('postses.id','BETWEEN', array(($_GET['withonegetposts']-4),($_GET['withonegetposts']))) 
                      ->where('postses.id','BETWEEN', array(($this->_lastrecord-10),($this->_lastrecord))   )
                      // ->limit(1 )
                      ->order_by('postses.id','DESC')
                      ->execute();
        return $query;
      }

    
   


 

    /* */
   

    //public function GetPostAsObject(){
      //  $authors = ORM::factory('Author')->find_all()->as_array('id_authors','name');
     //  $genres = ORM::factory('Genre')->find_all()->as_array('id_genres','name');
        
       //echo '$authors: ' .Debug::dump($authors).'<br>';
     //   echo '$genres: '.Debug::dump($genres).'<br>';

      //  $posts = ORM::factory('Posts')     
        
                   /*     ->with('Authors')
                        ->with('Genre')*/
                                   //  ->select(array('postses.id','id'),
                                    //          array('postses.content', 'content'))
                                      //->where('path','!=',"s")
                                     // ->from('postses')
                                 //->join($authors,'inner')
                                 //->on('postsed.id_authors','=',$authors->id_authors)
                                    
                                    //  ->join($genres,'INNER')
                                     // ->on('postses.id_genres','=',DB::expr('genres.id_genres'))
                                     //->on('postses.id_genres','=',$genres[id_genres])
                                 //    ->join($authors)
                                  //   -> on('postses.id_authors','=','authors.id_authors')
                                   //   ->find_all();
                                     // ->as_array('id','name','id_gemres','content', 'path','id_authors');
//*
     //    echo '<pre>';
       //   echo '<br>$posts: '. Debug::dump($posts);
       //   echo '<script type="text/javascript">console.log('.$posts.');</script>';
        //  echo '</pre>';*/
        //return $posts->select('postses.id','postses.name', 'postses.content','postses.path','authors.name','genres.name') 
         // return $posts;

                                 /* $veiling = ORM::factory('veilingen')
                                  ->select('vastprijs')
                                  ->join('veilingvoorkeur', 'RIGHT')
                                  ->on('veilingen.id', '=', 'vid')
                                  ->order_by('veilingen.created', DESC)
                                  ->limit(10)
                                  ->find_all();*/
 /**/

              
              // This query will find all the posts related to "smith" with JOIN
              /**/
    //}
    
      /* 
     public function rules(){
       return array(
         'name'=>array(
            array('alpha_numeric'=>'not empty')
         ),

         'id_genres' => array(
           array('alpha_numeric'=>'not empty')
         ),

         'content' => array(
            array('alpha_numeric'=>'not empty')
         ),

         'id_authors' => array(
            array('alpha_numeric'=>'not empty')
         ),

         'path' => array(
            array('not_empty'=>'not empty')
         )
       );*/
    // }

/*
      public function rules(){
        return array(
          'name'=>array(
              array('alpha_numeric'=>'Nie są litery i liczby'),
              array('not_empty' => 'Please enter your password'),
          ),
  
          'id_genres' => array(
            array('numeric'=>'Nie są  liczby'),
            array('not_empty' => 'Please enter your category'),
          ),
  
          'content' => array(
            array('alpha_numeric'=>'Nie są litery i liczby'),
            array('not_empty' => 'Please enter your content'),
          ),
  
        
          'path' => array(
            array('not_empty'=>'sciezka'),
          )
        );
      }*/



    }

?>