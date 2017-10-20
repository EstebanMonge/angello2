<?php
        require 'header.php';
?>
<body>
    <?php
        echo drawHeader($vlans);
    ?>
    <div class="container-fluid">
            <div class="row">
                <h3>Users</h3>
            </div>
            <div class="pull-right" style="padding-bottom:20px">
        <?php
	if ($this->session->is_admin == 1) {
            echo '<a href="add_user.php" class="btn btn-info" role="button">Add Users</a>';
        }
        ?>
            </div>
            <div>
                <table class="table table-striped table-bordered" data-sortable>
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Name</th>
                      <th>Mail</th>
                      <th>Admin</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($users as $row) {
                        echo '<tr>';
                        echo '<td>'.$row['username'].'</td>';
                        echo '<td>'.$row['name'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['is_admin'].'</td>';
			if ($this->session->is_admin == 1) {
                            echo '<td><a href="#" data-href="delete_user.php?username='.$row['username'].'" data-toggle="modal" data-target="#confirm-delete"><button type="button" class="btn btn-info">Delete</button></a></td>';
                            echo '</tr>';
                        } else {
                            echo '<td>None</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                  </tbody>
            </table>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            Please confirm deletion 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
        </div>
    </div> <!-- /container -->
    <script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    </script>
  </body>
</html>
