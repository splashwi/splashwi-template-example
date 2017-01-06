<div class="jumbotron">
  <i class="fa fa-headphones"></i> Teamspeak<br><br>
  <div class="row">
    <div class="col-md-12">
      IP: <label><?=$data['ip']?>:<?=$data['port']?></label><br>
      Token: <label><?=$data['token']?></label>
    </div>
  </div><br>
  <?php
  $request = array(
      $data['teamspeak'],
      $data['master']
  );
   ?>
  <button class="btn btn-primary btn-fullwidth" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    <i class="fa fa-info-circle"></i> Control Teamspeak
  </button><br>
  <div class="collapse" id="collapseExample">
    <div><br>
      <?php if($data['admin']->isOnline($request) == "online") { ?>
      <form action="teamspeak/action" method="post">
        <div class="row">
          <div class="col-md-2">
            <label for="action">Action</label>
            <select class="form-control" name="action">
              <option value="1">Kick</option>
              <option value="2">Ban</option>
            </select>
          </div>
          <div class="col-md-2">
            <label for="username">User</label>
            <select class="form-control" name="username">
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
            <input class="form-control" name="reason">
          </div>
          <div class="col-md-2">
            <label for="reason">Perform Action</label>
            <button name="submit" type="submit" class="btn btn-info btn-fullwidth">Send <i class="fa fa-arrow-circle-right"></i></button>
          </div>
        </div><br>
        <?php } ?>
        <div class="row">
          <?php if($data['admin']->isOnline($request) !== "online") {?>
            <div class="col-md-12">
              <a href="start/<?=$data['id']?>" class="btn btn-success btn-fullwidth"><i class="fa fa-play"></i> Start</a>
            </div>
          <?php } elseif($data['admin']->isOnline($request) == "online") {?>
            <div class="col-md-6">
              <a href="restart/<?=$data['id']?>" class="btn btn-warning btn-fullwidth"><i class="fa fa-refresh"></i> Restart</a>
            </div>
            <div class="col-md-6">
              <a href="stop/<?=$data['id']?>" class="btn btn-danger btn-fullwidth"><i class="fa fa-stop"></i> Stop</a>
            </div>
          <?php } ?>
        </div><br>
      </form>
    </div>
  </div>
  <br>
    <div class="row">
      <div class="col-md-12">
        <a href="delete/<?=$data['id']?>" class="btn btn-danger btn-fullwidth"><i class="fa fa-trash-o"></i> Delete</a>
      </div>
    </div>
  </div>