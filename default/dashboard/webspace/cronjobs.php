<div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
    <div class="row">
        <div class="col-md-12" style="line-height: 34px; padding-left: 40px;">
            Webspace <label>#web<?=$data['webspaceid']?></label><div class="pull-right"><a class="btn btn-primary btn-small" href="../<?=$data['webspaceid']?>"><i class="fa fa-arrow-circle-left"></i> Back</a></div>
        </div>
    </div>
</div>
<div class="jumbotron">
    <?php
    foreach($data['cronJobs'] as $cron) {
        ?><br>
        <div class="row">
            <div class="col-md-1">
                <input class="form-control" type="text" value="<?=$cron->min?>" readonly>
            </div>
            <div class="col-md-1">
                <input class="form-control" type="text" value="<?=$cron->hour?>" readonly>
            </div>
            <div class="col-md-1">
                <input class="form-control" type="text" value="<?=$cron->day?>" readonly>
            </div>
            <div class="col-md-1">
                <input class="form-control" type="text" value="<?=$cron->month?>" readonly>
            </div>
            <div class="col-md-1">
                <input class="form-control" type="text" value="<?=$cron->wday?>" readonly>
            </div>
            <div class="col-md-7">
                <input class="form-control" type="text" value="<?=$cron->cmd?>" readonly>
            </div>
        </div><br>
        <?php
    }
    ?>
</div>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="padding: 0 15px;">
        <a data-toggle="modal" data-target="#Modal" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a CronJob</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a CronJob</h4>
            </div>
            <form action="../addCronJob" method="post">
                <input name="webspaceid" type="hidden" value="<?=$data['webspaceid']?>" readonly>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Minute</label>
                            <input class="form-control" type="text" name="min">
                        </div>
                        <div class="col-md-2">
                            <label>Hour</label>
                            <input class="form-control" type="text" name="hour">
                        </div>
                        <div class="col-md-2">
                            <label>Day</label>
                            <input class="form-control" type="text" name="day">
                        </div>
                        <div class="col-md-2">
                            <label>Month</label>
                            <input class="form-control" type="text" name="month">
                        </div>
                        <div class="col-md-2">
                            <label>WDay</label>
                            <input class="form-control" type="text" name="wday">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Command</label>
                            <input class="form-control" type="text" name="cmd">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this CronJob</button>
                </div>
            </form>
        </div>
    </div>
</div>