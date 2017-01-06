<?php
    $gameservers = $data["gameservers"];
?>
<div>
    <table class="table" id="paginate">
        <head><tr class="blue"><td>Gameservers</td></tr></head>
        <tbody>
        <?php
        foreach($gameservers as $gameserver) {
            $gm = new \Models\Gameserver_model();
            $gm = $gm->get_mserver($gameserver->master_id);

            $start = strtotime(date("Y-m-d"));
            $end = strtotime($gameserver->expires);

            $days = ceil(abs($end - $start) / 86400);
            if($days >= 31) {
                $color = "hidden";
            } elseif($days < 31 && $days >= 16) {
                $color = "success";
            } elseif($days < 16 && $days >= 7) {
                $color = "warning";
            } elseif($days < 7) {
                $color = "danger";
            }

            $gm2 = new \Models\Gameserver_model();
            ?>
        <tr><td>
            <div class="status">
            <?php
            $status = $gm2->get_status($gameserver->id);
            ?>
            </div>
            <div class="serverselect" data-toggle="collapse" data-target="#cgs<?=$gameserver->id?>" aria-expanded="false" aria-controls="cgs<?=$gameserver->id?>">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-angle-double-down"></i> <label>ID:</label> #<?=$gameserver->id?>
                    </div>
                    <div class="col-md-3">
                        <label>IP:</label> <?=$gm[0]->ip.":".$gameserver->port?>
                    </div>
                    <div class="col-md-3">
                        <label>Days left:</label> <?=$days?>
                    </div>
                    <div class="col-md-3">
                        <label>Status:</label> <div class="statuscontainer2"><div class="status2"><?=$status?></div></div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="cgs<?=$gameserver->id?>">
                <div class="servercollapse" id="collapseExample">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="expirebox <?=$color?>"><label>Expires in:</label> <?=$days?> days <a href="extend/gameserver/<?=$gameserver->id?>" class="btn btn-success btn-sm btn-extend"><i class="fa fa-plus-circle"></i> Extend Period</a></div>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Server Data</div>
                                <div class="panel-body">
                                    <label>Status:</label> <div class="statuscontainer3"><div class="status3"><?=$status?></div></div>
                                    <label>Server ID:</label>
                                    #gsrv<?=$gameserver->id?><br>
                                    <label>IP Adress:</label>
                                    <?php
                                    echo $gm[0]->ip.":".$gameserver->port;
                                    ?><br>
                                    <label>Game:</label>
                                    <?php
                                    if($gameserver->game == "mc_vanilla") {
                                        echo "Minecraft (Vanilla)";
                                    } elseif($gameserver->game == "mc_bukkit") {
                                        echo "Minecraft (Craftbukkit)";
                                    } elseif($gameserver->game == "mc_spigot") {
                                        echo "Minecraft (Spigot)";
                                    }
                                    ?><br>
                                    <label>Slots:</label>
                                    <?=$gameserver->slots?><br>
                                    <label>Ram:</label>
                                    <?=$gameserver->ram?>MB<br>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">FTP Access</div>
                                <div class="panel-body">
                                    <label>FTP Hostname:</label>
                                    <?php
                                    echo $gm[0]->ip;
                                    ?>:21<br>
                                    <label>FTP Username:</label>
                                    <?php
                                    echo $gameserver->owner.$gameserver->sid;
                                    ?><br>
                                    <label>FTP Password:</label>
                                    <?php
                                    echo $gameserver->ftppass;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Actions</div>
                                <div class="panel-body">
                                    <?php
                                    //TODO: Get latest.log and write into modal!
                                    $gamemodal = new \Models\Gameserver_model();
                                    $log = $gamemodal->getLog($gameserver->id);
                                    $log = $gamemodal->interpretLog($log);
                                    ?>
                                    <div class="modal fade" id="gc<?php echo $gameserver->id; ?>" tabindex="-1" role="dialog" aria-labelledby="gc<?php echo $gameserver->id; ?>Label">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Console</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="containconsole">
                                                        <div id="con<?php echo $gameserver->id; ?>" class="form-control console" readonly><?php echo $log; ?></div>
                                                    </div>
                                                    <form action="" method="post" id="form<?php echo $gameserver->id; ?>">
                                                        <br>
                                                        <input id="id<?php echo $gameserver->id; ?>" name="id" value="<?php echo $gameserver->id; ?>" type="hidden" readonly>
                                                        <div class="input-group">
                                                            <input id="command<?php echo $gameserver->id; ?>" name="command" class="form-control" type="text" placeholder="op splashwi">
                                                            <span class="input-group-btn">
                                                                <button type="button" onClick="submitdata();" class="btn btn-success btn-fullwidth">Send Command <i class="fa fa-arrow-circle-right"></i></button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                    <script>
                                                        function submitdata() {
                                                            var id  = document.getElementById("id<?php echo $gameserver->id; ?>").value;
                                                            var command = document.getElementById("command<?php echo $gameserver->id; ?>").value;

                                                            var dataString = 'id=' + id + '&command=' + command;
                                                            if (id == '' || command == '') {
                                                                //alert("Please Fill All Fields");
                                                            } else {
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: "gameserver/send",
                                                                    data: dataString,
                                                                    cache: false,
                                                                    success: function(html) {
                                                                        //alert(html);
                                                                    }
                                                                });
                                                            }
                                                            $('#command<?php echo $gameserver->id; ?>').val('');
                                                            return false;
                                                        }
                                                        $('#form<?php echo $gameserver->id; ?>').on('keyup keypress', function(e) {
                                                            var keyCode = e.keyCode || e.which;
                                                            if (keyCode === 13) {
                                                                e.preventDefault();
                                                                submitdata();
                                                                return false;
                                                            }
                                                        });
                                                        $('#form<?php echo $gameserver->id; ?>').submit(function(e) {
                                                            e.preventDefault();
                                                            submitdata();
                                                            return false;
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="onlinebuttons">
                                        <div  class="onlinebuttonsinner">
                                            <button class="btn btn-info btn-fullwidth" type="button" data-toggle="modal" data-target="#gc<?php echo $gameserver->id; ?>"><i class="fa fa-code"></i> Console</button><br><br>
                                            <?php if (strpos($status, 'Offline') !== false) { ?>
                                                <button class="btn btn-success btn-fullwidth" type="button" data-toggle="modal" data-target="#start<?php echo $gameserver->id; ?>"><i class="fa fa-play"></i> Start</button><br><br>
                                            <?php } else { ?>
                                                <button class="btn btn-warning btn-fullwidth" type="button" data-toggle="modal" data-target="#restart<?php echo $gameserver->id; ?>"><i class="fa fa-refresh"></i> Restart</button><br><br>
                                                <button class="btn btn-danger btn-fullwidth" type="button" data-toggle="modal" data-target="#stop<?php echo $gameserver->id; ?>"><i class="fa fa-stop"></i> Stop</button><br><br>
                                            <?php } ?>
                                            <button class="btn btn-default btn-fullwidth" type="button" data-toggle="modal" data-target="#reinstall<?php echo $gameserver->id; ?>"><i class="fa fa-refresh"></i> Reinstall</button><br><br>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="start<?php echo $gameserver->id; ?>" tabindex="-1" role="dialog" aria-labelledby="start<?php echo $gameserver->id; ?>Label">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Confirm Start</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <a onclick="start<?=$gameserver->id?>();" class="btn btn-success startMsg"><i class="fa fa-play"></i> Confirm Start</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function start<?=$gameserver->id?>() {
                                            $.ajax({
                                                url: 'gameserver/start/<?=$gameserver->id?>',
                                            });
                                            $('#start<?php echo $gameserver->id; ?>').modal('hide');
                                        }
                                    </script>
                                    <div class="modal fade" id="restart<?php echo $gameserver->id; ?>" tabindex="-1" role="dialog" aria-labelledby="restart<?php echo $gameserver->id; ?>Label">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Confirm Restart</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <a onclick="restart<?=$gameserver->id?>();" class="btn btn-warning restartMsg"><i class="fa fa-refresh"></i> Confirm Restart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function restart<?=$gameserver->id?>() {
                                            $.ajax({
                                                url: 'gameserver/restart/<?=$gameserver->id?>',
                                            });
                                            $('#restart<?php echo $gameserver->id; ?>').modal('hide');
                                        }
                                    </script>
                                    <div class="modal fade" id="stop<?php echo $gameserver->id; ?>" tabindex="-1" role="dialog" aria-labelledby="stop<?php echo $gameserver->id; ?>Label">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Confirm Stop</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <a onclick="stop<?=$gameserver->id?>();" class="btn btn-danger stopMsg"><i class="fa fa-stop"></i> Stop</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function stop<?=$gameserver->id?>() {
                                            $.ajax({
                                                url: 'gameserver/stop/<?=$gameserver->id?>',
                                            });
                                            $('#stop<?php echo $gameserver->id; ?>').modal('hide');
                                        }
                                    </script>
                                    <div class="modal fade" id="reinstall<?php echo $gameserver->id; ?>" tabindex="-1" role="dialog" aria-labelledby="reinstall<?php echo $gameserver->id; ?>Label">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Confirm Reinstall</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <select class="game<?=$gameserver->id?> form-control">
                                                        <option value="mc_vanilla">Minecraft: Vanilla</option>
                                                        <option value="mc_bukkit">Minecraft: Bukkit</option>
                                                        <option value="mc_spigot">Minecraft: Spigot</option>
                                                    </select><br>
                                                    <a onclick="reinstall<?=$gameserver->id?>();" class="btn btn-default reinstallMsg"><i class="fa fa-refresh"></i> Reinstall</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function reinstall<?=$gameserver->id?>() {
                                            var game<?=$gameserver->id?> = $("select.game<?=$gameserver->id?>").val();
                                            $.ajax({
                                                url: 'gameserver/reinstall/<?=$gameserver->id?>/' + game<?=$gameserver->id?>,
                                            });
                                            $('#reinstall<?php echo $gameserver->id; ?>').modal('hide');
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
    <div class="row">
        <div class="col-md-12">
            <div class="pagination-nav">
                <div class="simple-pagination-first"></div>
                <div class="simple-pagination-previous"></div>
                <div class="simple-pagination-page-numbers"></div>
                <div class="simple-pagination-next"></div>
                <div class="simple-pagination-last"></div>
            </div>
        </div>
    </div>
</div>
