<?php
use Helpers\Url;
?>
<div>
    <table id="paginate">
        <tbody>
        <?php
        $vmodel = new \Models\Virtual_model();
        foreach($data["vms"] as $vm) {

            $start = strtotime(date("Y-m-d"));
            $end = strtotime($vm->expires);

            $days = ceil(abs($end - $start) / 86400);
            if($days >= 31) {
                $color = "info";
            } elseif($days < 31 && $days >= 16) {
                $color = "success";
            } elseif($days < 16 && $days >= 7) {
                $color = "warning";
            } elseif($days < 7) {
                $color = "danger";
            }

            if($vmodel->isOnline($vm->id) == 1) {
                $status = '<span class="label label-success">Online</span>';
            } else {
                $status = '<span class="label label-danger">Offline</span>';
            }

            $vmusage = $vmodel->getUsage($vm->id);
            ?>
            <tr><td>
                    <div class="serverselect" data-toggle="collapse" data-target="#cgs<?=$vm->id?>" aria-expanded="false" aria-controls="cgs<?=$vm->id?>">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-angle-double-down"></i> <label>ID:</label> #<?=$vm->id?>
                            </div>
                            <div class="col-md-3">
                                <label>IP:</label>
                            </div>
                            <div class="col-md-3">
                                <label>Days left:</label> <?=$days?>
                            </div>
                            <div class="col-md-3">
                                <label>Status:</label> <div class="vpsstatuscontainer2"><div class="vpsstatus2"><?=$status?></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="cgs<?=$vm->id?>">
                        <div class="servercollapse" id="collapseExample">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="expirebox <?=$color?>"><label>Expires in:</label> <?=$days?> days <a href="extend/vps/<?=$vm->id?>" class="btn btn-success btn-sm btn-extend"><i class="fa fa-plus-circle"></i> Extend Period</a></div>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Server Data</div>
                                        <div class="panel-body">
                                            <label>Status:</label> <div class="vpsstatuscontainer"><div class="vpsstatus"><?=$status?></div></div>
                                            <br><label>RAM Usage</label>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$vmusage["ram"]["percent"]?>" aria-valuemin="0" aria-valuemax="100" style="min-width: <?=$vmusage["ram"]["percent"]?>%;">
                                                    <?=$vmusage["ram"]["percent"]?>%
                                                </div>
                                            </div>
                                            <label>Disk Usage</label>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php if($vmusage["disk"]["/"]["limit_gb"] / $vmusage["disk"]["/"]["used_gb"] * 100 >= 100) { echo 100; } else { echo $vmusage["disk"]["/"]["limit_gb"] / $vmusage["disk"]["/"]["used_gb"] * 100; } ?>" aria-valuemin="0" aria-valuemax="100" style="min-width: <?php if($vmusage["disk"]["/"]["limit_gb"] / $vmusage["disk"]["/"]["used_gb"] * 100 >= 100) { echo 100; } else { echo $vmusage["disk"]["/"]["limit_gb"] / $vmusage["disk"]["/"]["used_gb"] * 100; } ?>%;">
                                                    <?php if($vmusage["disk"]["/"]["limit_gb"] / $vmusage["disk"]["/"]["used_gb"] * 100 >= 100) { echo 100; } else { echo $vmusage["disk"]["/"]["limit_gb"] / $vmusage["disk"]["/"]["used_gb"] * 100; } ?>%
                                                </div>
                                            </div>
                                            <?=$vmusage["disk"]["/"]["used_gb"]?>GB / <?=$vmusage["disk"]["/"]["limit_gb"]?>GB DISK USED<br>
                                            <label>CPU Usage</label>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$vmusage["cpu"]["percent"]?>" aria-valuemin="0" aria-valuemax="100" style="min-width: <?=$vmusage["ram"]["percent"]?>%;">
                                                    <?=$vmusage["cpu"]["percent"]?>%
                                                </div>
                                            </div>
                                            <?=$vmusage["cpu"]["percent"]?> CPU USED
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Actions</div>
                                        <div class="panel-body">
                                            <div class="onlinebuttons">
                                                <div  class="onlinebuttonsinner">
                                                    <?php if (strpos($status, 'Offline') !== false) { ?>
                                                        <button class="btn btn-success btn-fullwidth" type="button" data-toggle="modal" data-target="#start<?php echo $vm->id; ?>"><i class="fa fa-play"></i> Start</button><br><br>
                                                    <?php } else { ?>
                                                        <button class="btn btn-warning btn-fullwidth" type="button" data-toggle="modal" data-target="#restart<?php echo $vm->id; ?>"><i class="fa fa-refresh"></i> Restart</button><br><br>
                                                        <button class="btn btn-danger btn-fullwidth" type="button" data-toggle="modal" data-target="#stop<?php echo $vm->id; ?>"><i class="fa fa-stop"></i> Stop</button><br><br>
                                                    <?php } ?>
                                                    <button class="btn btn-default btn-fullwidth" type="button" data-toggle="modal" data-target="#reinstall<?php echo $vm->id; ?>"><i class="fa fa-refresh"></i> Reinstall</button><br><br>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="start<?php echo $vm->id; ?>" tabindex="-1" role="dialog" aria-labelledby="start<?php echo $vm->id; ?>Label">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Confirm Start</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a onclick="start<?=$vm->id?>();" class="btn btn-success startMsg"><i class="fa fa-play"></i> Confirm Start</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                function start<?=$vm->id?>() {
                                                    $.ajax({
                                                        url: 'vps/start/<?=$vm->id?>',
                                                    });
                                                    $('#start<?php echo $vm->id; ?>').modal('hide');
                                                }
                                            </script>
                                            <div class="modal fade" id="restart<?php echo $vm->id; ?>" tabindex="-1" role="dialog" aria-labelledby="restart<?php echo $vm->id; ?>Label">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Confirm Restart</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a onclick="restart<?=$vm->id?>();" class="btn btn-warning restartMsg"><i class="fa fa-refresh"></i> Confirm Restart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                function restart<?=$vm->id?>() {
                                                    $.ajax({
                                                        url: 'vps/restart/<?=$vm->id?>',
                                                    });
                                                    $('#restart<?php echo $vm->id; ?>').modal('hide');
                                                }
                                            </script>
                                            <div class="modal fade" id="stop<?php echo $vm->id; ?>" tabindex="-1" role="dialog" aria-labelledby="stop<?php echo $vm->id; ?>Label">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Confirm Stop</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a onclick="stop<?=$vm->id?>();" class="btn btn-danger stopMsg"><i class="fa fa-stop"></i> Stop</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                function stop<?=$vm->id?>() {
                                                    $.ajax({
                                                        url: 'vps/stop/<?=$vm->id?>',
                                                    });
                                                    $('#stop<?php echo $vm->id; ?>').modal('hide');
                                                }
                                            </script>
                                            <div class="modal fade" id="reinstall<?php echo $vm->id; ?>" tabindex="-1" role="dialog" aria-labelledby="reinstall<?php echo $vm->id; ?>Label">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Confirm Reinstall</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <select class="osid<?=$vm->id?> form-control">

                                                            </select><br>
                                                            <a onclick="reinstall<?=$vm->id?>();" class="btn btn-default reinstallMsg"><i class="fa fa-refresh"></i> Reinstall</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                function reinstall<?=$vm->id?>() {
                                                    var game<?=$vm->id?> = $("select.game<?=$vm->id?>").val();
                                                    $.ajax({
                                                        url: 'vps/reinstall/<?=$vm->id?>/',
                                                    });
                                                    $('#reinstall<?php echo $vm->id; ?>').modal('hide');
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td></tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>