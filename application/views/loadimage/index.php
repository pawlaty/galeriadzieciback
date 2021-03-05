<div class="loadimage">
   

    <?php echo Form::open(/*URL::base().Route::get('default')->url(
                         ['controller'=>'loadimage/upload', 'action'=>'upload'])*/
                         'upload/upload',
                         array('method'=>'post', 'enctype'=>'multipart/form-data'));
    ?>
        <p>Choose file:</p>
        <div class="uploadgrid">
            <?= Form::label('name','Set name'); ?>
            <?= Form::input('name', Arr::get($values, 'myname'));?>
          
            <?= Form::label('myimage','Your image');?>
            <?= Form::input('myimage', Arr::get($values,'myimage'),['type'=>'file']);?>
            
            <?= Form::label('mycontent','Write content');?>
            <?= Form::textarea('mycontent', Arr::get($values,'mycontent'));?>

            <?= Form::label('genres', 'Wybierz kategorię:');?>
            <?= Form::select('genres', $genres,  null,null);?>

            <div class="login"><?= Form::submit('submit','upload');?></div>


            <?  if($errors):?>
               <?php echo 'Błędy:<br>';?>
               <? foreach($errors as $e):?>
                    <p style="color=red"><?= $e?></p>
               <?endforeach;?>
            <? endif;?>

        </div>
        
   <?php echo FORM::close();?>

</div>