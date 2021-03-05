<?php
 class Model_Genre extends ORM{

     public function GetGenres(){

        /**
         * 1) view before():     $this->gen_model = Model::factory('Genre');
         * 2) view action_...(): $genres = $this->gen_model->GetGenres();
         * 3) model:               bellow
         */
        $genre = ORM::factory('Genre')->find_all()->as_array('id_genres','name');
        $data['genres'] = $genre;
        return $data['genres'];
     }
 }
?>