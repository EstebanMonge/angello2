<?php
       require 'header.php';
?>
<body>
    <?php
        echo drawHeader($vlans);
#	if ($_POST['vlan']) {
#		$chosenvlan=$_POST['vlan'];
#	}
        $used_ip = $total_ip - $free_ip;
        $perc_used_ip = ($used_ip * 100) / $total_ip;
    ?>
    <div class="container-fluid">
            <div class="row">
                <h3>Hosts for VLAN <?php echo $chosenvlan; ?></h3>
        <p class="text-right"><?php echo '<strong>'.number_format((float) $perc_used_ip, 2, '.', '').'%</strong> network usage and <strong>'.$free_ip.' free</strong> IPs of '.$total_ip; ?></p>
        <div class="pull-right" style="padding-bottom:20px">
            <p><button id="export" data-export="export" type="button" class="btn btn-info">Export</button></p>
        </div>
                <table id="hosts_table" class="table table-striped table-fixed table-fixed-hosts" data-sortable>
                  <thead>
                    <tr>
                      <th>IP <span class="caret"></span></th>
                      <th>DNS <span class="caret"></span></th>
                      <th>OS <span class="caret"></span></th>
                      <th>MAC <span class="caret"></span></th>
                      <th>Host Interface <span class="caret"></span></th>
                      <th>Switch <span class="caret"></span></th>
                      <th>Switch Interface <span class="caret"></span></th>
                      <th>Comment <span class="caret"></span></th>
                      <th>Services</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($hosts as $row) {
                        echo '<tr>';
                        $iplast = explode('.', $row['ip']);
                        echo '<td data-value="'.$iplast[3].'">'.$row['ip'].'</td>';
                        echo '<td>'.$row['hostname'].'</td>';
                        echo '<td>'.$row['os'].'</td>';
                        echo '<td>'.$row['mac'].'</td>';
                        if ($row['interface'] == '') {
                            echo '<td><a href="comments.php?source=hosts&ip='.$row['ip'].'&vlan='.$row['vlan'].'&type=Add&item=Interface">Add</a></td>';
                        } else {
                            echo '<td><a href="comments.php?source=hosts&ip='.$row['ip'].'&vlan='.$row['vlan'].'&type=Modify&item=Interface">'.$row['interface'].'</a></td>';
                        }
                        if ($row['switch'] == '') {
                            echo '<td><a href="comments.php?source=hosts&ip='.$row['ip'].'&vlan='.$row['vlan'].'&type=Add&item=Switch">Add</a></td>';
                        } else {
                            echo '<td><a href="comments.php?source=hosts&ip='.$row['ip'].'&vlan='.$row['vlan'].'&type=Modify&item=Switch">'.$row['switch'].'</a></td>';
                        }
                        if ($row['switch_interface'] == '') {
                            echo '<td><a href="comments.php?source=hosts&ip='.$row['ip'].'&vlan='.$row['vlan'].'&type=Add&item=Switch Interface">Add</a></td>';
                        } else {
                            echo '<td><a href="comments.php?source=hosts&ip='.$row['ip'].'&vlan='.$row['vlan'].'&type=Modify&item=Switch Interface">'.$row['switch_interface'].'</a></td>';
			}
                        if ($row['comments'] == '') {
                            echo '<td><a href="comments.php?source=hosts&ip='.$row['ip'].'&vlan='.$row['vlan'].'&type=Add&item=Comment">Add</a></td>';
                        } else {
                            echo '<td><a href="comments.php?source=hosts&ip='.$row['ip'].'&vlan='.$row['vlan'].'&type=Modify&item=Comment">'.$row['comments'].'</a></td>';
                        }
                        echo '<td><a href="ports.php?source=hosts&ip='.$row['ip'].'">Details</a></td>';
                        echo '</tr>';
                    }
                    ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
