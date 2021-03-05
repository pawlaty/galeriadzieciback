<!DOCTYPE html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blog z rysunkami dzieci">
    <meta name="keywords" content="Galeria dzieci, piękne obrazki, rysunki dzieci">
    <meta http-eqiuv="X-Ua-Compatible"  content="IE=edge, chrome=1">
    <title>Galeria Majki i Kajki</title>
    
    <?php 
    echo HTML::script('assets/js/angularJS.min.1.7.7.js');
    

    echo HTML::style('assets/css/zabcia.css'); 
    echo HTML::style('assets/css/ap.css'); 
    echo HTML::style('assets/css/letsforms.css');
    ?> 
       
  </head>


  <body>
    <div class="container">

      <nav>
        <div class="menu">
          <?php if(isset($mymenu)) echo $mymenu;?>
        </div>
      </nav>

      <header><div id="title"><h1><?=Html::entities($title)?> </h1></div></header>
        <hr />
      <main><div class="content"><?= $content ?></div></main>

     

      <footer>
        <div class="end">
          Miłego oglądania <br>
          Jelenia Góra <?= Date("d_m_y") ?>
        </div>
      </footer>
</div>
  
  <?php echo HTML::script('assets/js/jquery-3.4.1.min.js'); ?> 
  <?php echo HTML::script('assets/js/show_review.js'); ?> 
  
 </body>
</html>




