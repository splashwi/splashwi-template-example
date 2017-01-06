<tr><td>
  <div class="">
    <div class="row">
      <div class="status">
      <?php
      $request = array(
          $data['teamspeak'],
          $data['master']
      );
      $online = $data['admin']->isOnline($request);

      if($online == "online") {
        $status = '<span class="label label-success">Online</span>';
      } else {
        $status = '<span class="label label-danger">Offline</span>';
      }
      ?>
      </div>
      <?php

      $start = strtotime(date("Y-m-d"));
      $end = strtotime($data['expires']);
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
      ?>
    </div>
    <div class="serverselect" data-toggle="collapse" data-target="#cgs<?=$gameserver->id?>" aria-expanded="false" aria-controls="cgs<?=$gameserver->id?>">
      <div class="row">
        <div class="col-md-3">
          <i class="fa fa-angle-double-down"></i> <label>ID:</label> #<?=$data['id']?>
        </div>
        <div class="col-md-3">
          <label>IP:</label> <?=$data['ip']?>:<?=$data['port']?>
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
              <div class="expirebox <?=$color?>"><label>Expires in:</label> <?=$days?> days <a href="extend/teamspeak/<?=$data['id']?>" class="btn btn-success btn-sm btn-extend"><i class="fa fa-plus-circle"></i> Extend Period</a></div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Server Data</div>
              <div class="panel-body">
                <label>Status:</label> <div class="statuscontainer3"><div class="status3"><?=$status?></div></div><br>
                <label>IP:</label> <?=$data['ip']?>:<?=$data['port']?><br>
                <label>Token:</label> <?=$data['token']?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="modal fade" id="start<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="start<?=$data['id']?>Label">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Confirm Start</h4>
                </div>
                <div class="modal-body">
                  <a onclick="start<?=$data['id']?>();" class="btn btn-success btn-fullwidth startMsg"><i class="fa fa-play"></i> Confirm Start</a>
                </div>
              </div>
            </div>
          </div>
          <script>
            function start<?=$data['id']?>() {
              $.ajax({
                url: 'teamspeak/start/<?=$data['id']?>',
              });
              $('#start<?=$data['id']?>').modal('hide');
            }
          </script>
          <div class="modal fade" id="restart<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="restart<?=$data['id']?>Label">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Confirm Restart</h4>
                </div>
                <div class="modal-body">
                  <a onclick="restart<?=$data['id']?>();" class="btn btn-warning btn-fullwidth restartMsg"><i class="fa fa-refresh"></i> Confirm Restart</a>
                </div>
              </div>
            </div>
          </div>
          <script>
            function restart<?=$data['id']?>() {
              $.ajax({
                url: 'teamspeak/restart/<?=$data['id']?>',
              });
              $('#restart<?=$data['id']?>').modal('hide');
            }
          </script>
          <div class="modal fade" id="stop<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="stop<?=$data['id']?>Label">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Confirm Stop</h4>
                </div>
                <div class="modal-body">
                  <a onclick="stop<?=$data['id']?>();" class="btn btn-danger btn-fullwidth stopMsg"><i class="fa fa-stop"></i> Confirm Stop</a>
                </div>
              </div>
            </div>
          </div>
          <script>
            function stop<?=$data['id']?>() {
              $.ajax({
                url: 'teamspeak/stop/<?=$data['id']?>',
              });
              $('#stop<?=$data['id']?>').modal('hide');
            }
          </script>
          <div class="onlinebuttons">
            <div  class="onlinebuttonsinner">
              <?php if($online !== "online") { ?>
                <div class="col-md-12">
                  <button class="btn btn-success btn-fullwidth" type="button" data-toggle="modal" data-target="#start<?=$data['id']?>"><i class="fa fa-play"></i> Start</button>
                </div>
              <?php } elseif($online == "online") { ?>
                <div class="col-md-12">
                  <form action="" method="post" id="form<?=$data['id']?>">
                    <div class="row">
                      <div class="col-md-2">
                        <label for="action">Action</label>
                        <select class="form-control" name="action" id="action<?=$data['id']?>">
                          <option value="1">Kick</option>
                          <option value="2">Ban</option>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <label for="username">User</label>
                        <select class="form-control" name="username" id="usr<?=$data['id']?>">
                          <?php
                          echo $data['users'];
                          foreach($data['users']["data"] as $user_online) {
                            echo '<option value="'.$user_online["clid"].'">'.$user_online["client_nickname"].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="reason">Reason</label>
                        <input class="form-control" name="reason" id="reason<?=$data['id']?>">
                      </div>
                      <div class="col-md-2">
                        <label for="reason">Perform Action</label>
                        <button name="submit" type="button" onClick="submitdata();" class="btn btn-info btn-fullwidth">Send <i class="fa fa-arrow-circle-right"></i></button>
                      </div>
                    </div>
                  </form>
                </div><br><br><br>
                <script>
                  function submitdata() {
                    var action  = document.getElementById("action<?=$data['id']?>").value;
                    var usr  = document.getElementById("usr<?=$data['id']?>").value;
                    var command = document.getElementById("reason<?=$data['id']?>").value;

                    var dataString = 'username=' + usr + '&action=' + action + '&reason=' + command;
                    if (action == '' || usr == '' || command == '') {
                      //alert("Please Fill All Fields");
                    } else {
                      $.ajax({
                        type: "POST",
                        url: "teamspeak/action",
                        data: dataString,
                        cache: false,
                        success: function(html) {
                          //alert(html);
                        }
                      });
                    }
                    $('#reason<?=$data['id']?>').val('');
                    return false;
                  }
                  $('#form<?=$data['id']?>').on('keyup keypress', function(e) {
                    var keyCode = e.keyCode || e.which;
                    if (keyCode === 13) {
                      e.preventDefault();
                      submitdata();
                      return false;
                    }
                  });
                  $('#form<?=$data['id']?>').submit(function(e) {
                    e.preventDefault();
                    submitdata();
                    return false;
                  });
                </script>
              <br>
                <div class="col-md-6">
                  <button class="btn btn-warning btn-fullwidth" type="button" data-toggle="modal" data-target="#restart<?=$data['id']?>"><i class="fa fa-refresh"></i> Restart</button>
                </div>
                <div class="col-md-6">
                  <button class="btn btn-danger btn-fullwidth" type="button" data-toggle="modal" data-target="#stop<?=$data['id']?>"><i class="fa fa-stop"></i> Stop</button>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</tr></td>