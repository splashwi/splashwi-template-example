<div class="container">
    <div class="row">
        <?php
        $ded = new \Models\Dedicated_model();
        foreach($data["servers"] as $server) {
            $start = strtotime(date("Y-m-d"));
            $end = strtotime($server->valid_until);
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


            if($server->status == "0") {
                $status = "<span class='danger'>Awaiting Confirmation</span>";
            } elseif($server->status == "1") {
                $status = "<span class='warning'>Setup in Progress</span>";
            } elseif($server->status == "2") {
                $status = "<span class='success'>Up and Running</span>";
            }
            if($server->raid_c == "0") {
                $raid = "Software Raid";
            } elseif($server->raid_c == "1") {
                $raid = "Hardware Raid";
            }
            $hdds = json_decode($server->hdds);
            ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?=$ded->getPlattformName($server->plattform)?> (ID: #<?=$server->id?>)
                    </div>
                    <div class="panel-body">
                        <?php if($server->status > 0) { ?>
                        <div class="expirebox <?=$color?>" style="margin-top: 0 !important; margin-bottom: 20px !important;"><label>Expires in:</label> <?=$days?> days <a href="extend/dedicated/<?=$server->id?>" class="btn btn-success btn-sm btn-extend"><i class="fa fa-plus-circle"></i> Extend Period</a></div>
                        <?php } else { ?>
                            <div class="expirebox <?=$color?>" style="margin-top: 0 !important; margin-bottom: 20px !important;"><i class="fa fa-info-circle"></i> This <label>Server is awaiting staff aproval</label>!</div>
                        <?php } ?>
                        <label>Plattform: </label> <?=$ded->getPlattformName($server->plattform)?><br>
                        <label>RAM: </label> <?=$server->ram?>MB<br>
                        <label>HDDs: </label><br>
                        <?php
                        foreach($hdds as $hdd) {
                            echo $ded->getHDDName($hdd).'<br>';
                        }
                        ?>
                        <br>
                        <label>Raid: </label> <?=$raid?><br>
                        <label>Location: </label> <?=$ded->getLocationName($server->location)?><br>
                        <label>Status: </label> <?=$status?><br><br>

                        <label>Price: </label> €<?=$server->price?>EUR/per Month<br>
                        <label>Valid Until: </label> <?=$ded->interpretDate($server->valid_until)?> (<?=$days?> days left)
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>