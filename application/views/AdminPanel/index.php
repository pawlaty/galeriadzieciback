<style>
  .table>table, .table table tr td {border:1px solid black;}
</style>
<?php  header('Content-Type: image/png'); ?>

<?php if(isset($error)):
  foreach($error as $e):
    echo '<p>'.$e.'</p>';
  endforeach;
endif;?>

<div class="">
  <nav>
  <button>  
      <?= Html::anchor('upload/index','Add image');?>
  </button>
  </nav>
  <hr/>
  
  <?php if(isset($del_p)):?>
  <aside>
    <div class="del_message">

     
      <p>Are You sure delete post by id = <?php echo $del_p;?></p>
      


      <td><button class="orders _change" style="background:blue"><i class="material-icons">arrow_back</i></button></td>         
       
      <td><button class="orders _change" style="background:red"><i class="material-icons">delete_forever</i></button></td>         
            
    </div>
  </aside>
  <?php endif;?>

  <aside>
    <div class="table" style="min-width:100%;">
      <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Genres</th>
            <th>Content</th>          
            <th>change</th>
            <th>delete</th>
        </tr>

        <?php foreach($postses as $p){?>
        <tr class="admin_posts">
          
            <td><?php echo $p->id;?></td>
            <td><?php echo Form::image("",$p->id, array("src"=>HTML::entities($p->path),
                                                      "width"=>70,
                                                      "alt"=>HTML::entities($p->name)));?></td>
            <td><?php echo $p->name;?></td>
            <td><?php echo $p->id_genres;?></td>
            <td><?php echo $p->content;?></td>
            <td><button class="orders _change" style="background:green"><i class="material-icons">border_color</i></button></td>         
            
            <td>
           
              <?php echo Form::open('AdminPanel/deletepost', array('method'=>'GET','class'=>'del_post'));?>
              <input type="hidden" name="idtodel" value="<?= $p->id;?>">
                <button class="orders _del"  style="background:red" type="submit">
                  <i class="material-icons">delete_forever</i>
                </button>
              <?php echo Form::close();?>
            </td>         
        </tr>
        <?php }?>
      </table>
    </div>    
  </aside>
</div>

