<html>

<body>
  <h3 align="center">Report</h3>
  <?php
  require_once('../Model/Userinformation.php');
  require_once('../Model/Score.php');
  $o=new Pdf;
  $user=$o->getUserInfo("234rty7890");
  foreach($user as $x => $x_value) {
echo "<b>". $x."</b>"." : "  . $x_value;
echo "<br>";
}
   ?>
   <input id="pdf" type="button" name="pdf" value="Download"onclick="onClick()">
   </body>

   <br>

</html
