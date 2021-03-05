
<table class="menu_table">
    <tr>
       <?php  if(!isset($logged)):?>
            <td class="menu_cell">
                <button><?= HTML::anchor('logowanie/login','Admin panel') ?></button>
            </td>
        <?php  endif;?>
      
       
       
        <?php if(Request::current()->controller() != 'Blog'):?>
            <td class="menu_cell">
                <button><?= HTML::anchor('blog/index','gallery') ?></button>
            </td>
        <?php endif;?>

        <?php if(Request::current()->controller() == 'Blog'):?>
           <td class="menu_cell">
                <button><?= HTML::anchor('about/index','autorzy')?></button>
           </td>
        <?php endif;?>

        <?php  if(isset($logged)):?>
            <td class="menu_cell">
                <button class="logout"><?= HTML::anchor('logowanie/logout','logout') ?></button>
            </td>
        <?php  endif;?>
    </tr>
</table>

