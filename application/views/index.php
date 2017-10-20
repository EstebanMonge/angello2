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
?>
<body>
    <?php
    require 'header.php';
    echo drawHeader($vlans);
    if (!$_GET) {
        $vlan = 128;
    } else {
        $vlan = $_GET['vlan'];
    }
    ?>
    <div class="container-fluid">
            <div class="row">
            <div class="col-sm-4">
            <a href="<?php echo base_url()?>index.php/vlans/" title="Admin VLANs">
                <img src="<?php echo base_url()?>icons/flaticon/svg/network.svg" />
            </a>
            </div>
                <div class="col-sm-4">
            <a data-toggle="modal" href="#VlanModal" title="Show hosts">
                <img src="<?php echo base_url()?>icons/flaticon/svg/television-1.svg" />
            </a>
                        <!-- Modal -->
                        <div class="modal fade" id="VlanModal" role="dialog">
                                <div class="modal-dialog">
                                <!-- Modal content-->
                                        <div class="modal-content">
                                                <div class="modal-body">
                                                        <form action="<?php echo base_url()?>index.php/hosts/getvlanmodal" method="POST">
                                                                 <div align="center">
                                                                        <select id="vlan" name="vlan" onchange="this.form.submit();">
                                                                                <option>Select VLAN</option>
                                                                                <?php
                                                                                foreach ($vlans as $row) {
                                                                                    echo '<option value="'.$row['vlan'].'">'.$row['vlan'].'</option>';
                                                                                }
                                                                                ?>
                                                                        </select>
                                                                </div>
                                                        </form>
                                                </div>
                                        </div>
                                </div>
                        </div>
        </div>
        <div class="col-sm-4">
            <a href="scans.php" title="Admin scans">
                <img src="<?php echo base_url()?>icons/flaticon/svg/list.svg" />
            </a>
            </div>
    </div><!-- /container -->
  </body>
</html>
