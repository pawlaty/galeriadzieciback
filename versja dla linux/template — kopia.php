<!DOCTYPE html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blog z rysunkami dzieci">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge, chrome=1">
    <meta name="keywords" content="galeria dzieci, piękne obrazki, rysunki dzieci">
    
	
    <title>Galeria Majki i Kajki</title>
    
    <?php 
    echo HTML::style('assets/css/zabcia.css'); 
    echo HTML::style('assets/css/ap.css'); 
    echo HTML::style('assets/css/letsforms.css');
    ?> 
       
  </head>


  <body oncontextmenu="return false">
   <div class="container">
<nav>
  <div class="menu">
    <?php if(isset($mymenu)) echo $mymenu;?>
  </div>
</nav>
<header><div><h1><?php echo $title?> </h1></div></header>
    <hr />
<main>
          <div class="content">
            <?= $content ?>
          </div>
</main>
  </div>
  
  <div class="coookies">
    <p>Strona korzysta z plików cookies. Są niezbędne do prawidłowego działania strony.</p> 
    <?= Form::button('ok','Rozumiem i akceptuję pliki cookies', ['onclick'=>'closecookies()',
                                                                 'type'=>'button']);?>
  </div>
<footer>
  <div class="end">
    Miłego oglądania <br>
    Jelenia Góra <?= Date("m.d.y") ?>
  </div>
</footer>
  <?php echo HTML::script('assets/js/jquery-3.4.1.min.js'); ?> 
  <?php echo HTML::script('assets/js/show_review.js'); ?> 
 </body>
</html>




