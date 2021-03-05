
<?php if($uploaded_file): ?>
<div>
   
    <div class="center">
    <figure>
        <?= FORM::image('','',array(
                                "src"=>"/assets/images/$uploaded_file",
                                "width"=> 400,
                                "alt"=>"Załadowane zdjęcie do BD"
        ));?>

    </figure>
    <?php else: ?>
    <h1> something wrong with the upload file</h1>
    <p> <?php echo $error_message ?></p>
    <th>
        <?  if($errors):?>
                <?php echo 'Błędy:<br>';?>
                <? foreach($errors as $e):?>
                        <p style="color=red"><?= $e?></p>
                <?endforeach;?>
        <? endif;?>
    <?php endif ?>
    </div>

    <nav>
        <div class="center">
            <button><?= Html::anchor('blog/index', 'galleria');?></button>
            <button><?= Html::anchor('AdminPanel/index', 'powrót do admina');?></button>
        </div>


    </nav>
</div>