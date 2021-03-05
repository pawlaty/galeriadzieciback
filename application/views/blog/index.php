
<?php  header('Content-Type: image/png'); ?>


<br><br>

<?php
if(isset($err)){
    echo $err;
}
?>

<div class="collection">
    <div class="review" onclick="Hide()">
        <?php
       
       //echo FORM::image("","",array("src"=>HTML::entities($posts[1]->path),
       echo Form::image("","",array("src"=>HTML::entities($posts[1]['path']),
                                     "id"=>"big",  
                                     "alt"=>HTML::entities($posts[3]['name'])));
        ?>
    </div>

    <?php
        foreach($posts as $p){
        echo "<figure>"; 
        /*<?=HTML::entities($p['id'])?>*/
    ?>    
    
      <div class="one_post">  <!--onclick="ShowBigPost()"-->
        
    <?php   
        echo Form::image("",$p['id'],array("src"=>HTML::entities($p['path']),
                                        "width"=>310,
                                        "alt"=>HTML::entities($p['name'])));
        echo '<figcaption>
                <div id="small_content">
                        <strong>'.HTML::entities($p['name']). '</strong><br>
                        autorstwa<strong><i> ' . HTML::entities($p['aname']). '</i></strong>
                        <p>kategoria: ' .HTML::entities($p['gname']).'</p>
                       
                </div> 
                
                <p>'.HTML::entities($p['content']).'</p>
                
             </figcaption>';                                
    echo '</div>';

        echo "</figure>";
        }                        
    ?>
</div>

<?php if(Cookie::get('visitor')==false):?>
      <aside>
        <div class="coookies" onclick="<?php Cookie::set('visitor', true);?>">
            <p>Strona korzysta z plików cookies. Są niezbędne do prawidłowego działania strony.</p> 
            <?= Form::button('ok','Rozumiem i akceptuję pliki cookies', ['onclick'=>'closecookies()',
                                                                        'type'=>'button']);?>
        </div>
      </aside>
<?php endif;?>
      
<?php if(Request::detect_uri() === '/blog/index'):?>
      <nav>
            <div class=" ">
              <?php echo Form::open('blog/index',array('method'=>'GET','enctype'=>'multipart/form-data','id'=>'formselect'))?>
                                               
                        <?php echo Form::select('withonegetposts',
                                                $withonegetps,
                                                $lastrec,
                                                array('class'=>'uptowngirl choicepage')
                                                );
                            
                        ?>
                   
              <?php echo Form::close();?>
            </div>  
          </div>

          <div class="uptowngirl" id="upup">
              up
          </div>  
      </nav>
<?php endif;?>