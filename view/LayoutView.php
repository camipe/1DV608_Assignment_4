<?php
/**
  * Solution for assignment 2
  * @author Daniel Toll
  */
namespace view;

class LayoutView {
  public function render($isLoggedIn, BaseView $v, NavigationView $nv, DateTimeView $dtv) {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 4</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Assignment 4</h1>

      <?php 
        if ($nv->inRegistration()) {
          echo $nv->getLinkToLogin();
        }
        else {
          echo $nv->getLinkToRegister();
        }

      ?>
      <?php 
        if ($isLoggedIn) {
          echo "<h2>Logged in</h2>";
        } else {
          echo "<h2>Not logged in</h2>";
      }
      ?>
      <?php 
        echo $v->render();

        $dtv->show();
      ?>
      <div>
        <em>This site uses cookies to improve user experience. By continuing to browse the site you are agreeing to our use of cookies.</em>
      </div>
    </div>
  </body>
</html>
<?php
  }
}
