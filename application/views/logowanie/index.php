<script type='text/javascript'>
window.onload = function(){
    document.getElementById('input_name').focus();
};

</script>

<div class="logcontainer">
    
    <nav><p> <?= Html::Anchor('blog/index','Powrót do galerii');?></p></nav>
   
        <?php 
        
            echo Form::open('/logowanie/login',['method'=>'post']);
            echo '<legend>Fill all fields</legend>';

            echo  '<div class="logowanie">';
                echo '<div>' . Form::label('log_name', 'Name') . '</div>';
                echo '<div>';
                        echo   Form::input('log_name', Arr::get($values,'log_name_valid'), array('id'=>'input_name'));
                echo '</div>';

                echo '<div>'. Form::label('log_pass','password'). '</div>';
                                     //echo Form::input('log_pass',  $values['log_pass_valid']);
                echo '<div>';        
                        echo Form::input('log_pass', '', array('type'=>'password'),Arr::get($values,'log_pass_valid'));
                echo '</div>';

                echo '<div class="login">'. Form::submit('submit','Log in'). '</div>';
            echo '</div>';
            echo Form::close();
        
            if(isset($errors)):
                echo '<ul>';
                foreach($errors as $err):
                    echo '<li>'.$err.'</li>';
                endforeach;
                echo '</ul>';
            endif;

        ?>
</div>