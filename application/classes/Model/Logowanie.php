<?php
 class Model_Logowanie extends ORM{

    public function rules(){
        return array(
            'log_name_valid'=> array(
                array(
                    'not_empty'
                );
            );
            'log_pass_valid' => array(){
                array(){
                    'not_empty'
                }
            }
        );
    }
 }

?>