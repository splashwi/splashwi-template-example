<div>
    <table id="paginate">
        <thead>
            <tr><td></td></tr>
        </thead>
        <tbody>
        <?php
        if(count($data["webspaces"]) > 0) {
            ?>
            <tr><td>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        foreach($data["webspaces"] as $webspace) {
                            $webdata = $data['model']->getData($webspace->id);
                            foreach($webdata as $webdata) {
                                foreach($webdata as $webdata) {
                                    //echo "<pre>";
                                    //print_r($webdata);
                                    //echo "</pre>";
                                    ?>
                                    <div class="jumbotron">
                                        Webspace <label>#web<?=$webspace->id?></label>
                                        <hr>
                                        <div class="row">
                                            <?php
                                            $start = strtotime(date("Y-m-d"));
                                            $end = strtotime($webspace->expires);

                                            $days = ceil(abs($end - $start) / 86400);
                                            ?>
                                            <div class="expirebox"><label>Expires in:</label> <?=$days?> days <a href="extend/webspace/<?=$webspace->id?>" class="btn btn-success btn-sm btn-extend"><i class="fa fa-plus-circle"></i> Extend Period</a></div><br>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><?= $webdata["U_WEB_DOMAINS"] / $webdata["WEB_DOMAINS"] * 100 ?>%</label> Domains<br>
                                                <label><?= $webdata["U_DATABASES"] / $webdata["DATABASES"] * 100 ?>%</label> Databases<br>
                                                <label><?= $webdata["U_MAIL_ACCOUNTS"] / $webdata["MAIL_ACCOUNTS"] * 100 ?>%</label> Mail Accounts<br>
                                                <label><?= $webdata["U_BANDWIDTH"] / $webdata["BANDWIDTH"] * 100 ?>%</label> Bandwidth<br>
                                                <label><?= $webdata["U_DISK"] / $webdata["DISK_QUOTA"] * 100 ?>%</label> Disk usage<br>
                                                <label><?= $webdata["U_CRON_JOBS"] / $webdata["CRON_JOBS"] * 100 ?>%</label> CronJobs<br>
                                            </div>
                                            <div class="col-md-8">
                                                <a href="webspace/<?=$webspace->id?>" class="btn btn-success btn-fullwidth"><i class="fa fa-file"></i> Show Webspace</a><br><br>
                                                <a href="webspace/reinstall/<?=$webspace->id?>" class="btn btn-warning btn-fullwidth"><i class="fa fa-refresh"></i> Reset Webspace</a><br><br>
                                                <a href="webspace/disable/<?=$webspace->id?>" class="btn btn-danger btn-fullwidth"><i class="fa fa-times"></i> Disable Webspace</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </td></tr>
            <?php
        } else {
            ?>
            <tr><td>
                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            No webspaces!
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
