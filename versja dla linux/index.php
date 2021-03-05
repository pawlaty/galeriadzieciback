<table>
    <tr style="height:2em">
       <?php  if(!isset($logged)):?>
            <td>
                <button><?= HTML::anchor('logowanie/login','Lets login') ?></button>
            </td>
        <?php  endif;?>
       <td style="width:100px">
       
       </td>

       <?php  if(isset($logged)):?>
            <td>
                <button><?= HTML::anchor('adminPanel/index','admin panel') ?></button>
            </td>

        <?php  endif;?> 

        <?php if(URL::base(true, false) != 'blog/index'):?>
            <td>
                <button><?= HTML::anchor('blog/index','gallery') ?></button>
            </td>
        <?php endif;?>

        <?php  if(isset($logged)):?>
            <td>
                <button class="logout"><?= HTML::anchor('logowanie/logout','logout') ?></button>
            </td>
        <?php  endif;?>
    </tr>
   
   

   
</table>

<hr>