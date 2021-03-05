<?php
 class Model_Author extends ORM{

    public function __construct($id=null){
        parent::__construct($id);
    }

     public function rules(){
         return array(
            'log_name_valid' => array(
                array('not_empty')
            ),
            'log_pass_valid' => array(
                array('not_empty')

            )
         );
     }
     
 }
?>