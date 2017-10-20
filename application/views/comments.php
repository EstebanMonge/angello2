<?php
/**
 * Angello IP Management
 * PHP Version 7
 *
 * @category PHP
 * @package  Angello
 * @author   Esteban Monge <estebanmonge@riseup.net>
 * @license  https://opensource.org/licenses/BSD-2-Clause BSD
 * @link     http://www.hashbangcode.com/
 */
    require 'header.php';
?>
<body>
    <?php
           echo drawHeader($vlans);
    ?>
    <div class="container-fluid">
            <div class="row">
                <h3>Add or modify </h3>
    <form class="form-inline" role="form" action="insert_comment.php" method="POST">
     <div class="form-group">
            <TEXTAREA NAME="comment" COLS=40 ROWS=6><?php foreach ($comment as $row) { echo $row['comments']; }?></TEXTAREA>
     </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
            </div> <!-- /row -->
    </div> <!-- /container -->
  </body>
</html>
