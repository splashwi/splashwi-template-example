<!--<pre><?php //print_r($data['domains']); ?></pre>-->
<div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
    <div class="row">
        <div class="col-md-12" style="line-height: 34px; padding-left: 40px;">
            Webspace <label>#web<?=$data['webspaceid']?></label><div class="pull-right"><a class="btn btn-primary btn-small" href="../<?=$data['webspaceid']?>"><i class="fa fa-arrow-circle-left"></i> Back</a></div>
        </div>
    </div>
</div>
<?php
if(count($data["domains"]) > 0) {
    foreach($data["domains"] as $domain) {
        $dotcnt = explode(".", $domain->domain);
        $dotcnt = count($dotcnt);
        if($dotcnt == 2) {
            ?>
            <div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
                <div class="row">
                    <div class="col-md-9" style="line-height: 34px; padding-left: 40px;">
                        <?= $domain->domain ?>
                    </div>
                    <div class="col-md-3">
                        <form action="../deleteDomain" method="post">
                            <input type="hidden" name="webspaceid" value="<?= $domain->webspace_id ?>">
                            <input type="hidden" name="domainid" value="<?= $domain->id ?>">
                            <button class="btn btn-danger btn-fullwidth"><i class="fa fa-trash-o"></i> Delete Domain
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            foreach($data["domains"] as $subdomain) {
                $dotcnt = explode(".", $subdomain->domain);
                $dotcnt = count($dotcnt);
                $exploded = explode(".", $subdomain->domain);
                if($dotcnt > 2 && $exploded[1].".".$exploded[2] == $domain->domain) {
                    ?>
                    <div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
                        <div class="row">
                            <div class="col-md-9" style="line-height: 34px; padding-left: 40px;">
                                <?= $subdomain->domain ?>
                            </div>
                            <div class="col-md-3">
                                <form action="../deleteDomain" method="post">
                                    <input type="hidden" name="webspaceid" value="<?= $subdomain->webspace_id ?>">
                                    <input type="hidden" name="domainid" value="<?= $subdomain->id ?>">
                                    <button class="btn btn-danger btn-fullwidth"><i class="fa fa-trash-o"></i> Delete Domain
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        }
    }
    ?>
    <div class="row">
        <div class="col-md-3 col-md-offset-6 webicon" style="padding: 0 15px;">
            <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Sub-Domain</a><br><br>
        </div>
        <div class="col-md-3 webicon" style="padding: 0 15px;">
            <a data-toggle="modal" data-target="#Modal" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Domain</a><br><br>
        </div>
    </div>
    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add a Sub-Domain</h4>
                </div>
                <form action="../addSubDomain" method="post">
                    <div class="modal-body">
                        <label for="subdomain">Subdomain</label><br>
                        <div class="row">
                            <input type="hidden" name="webspaceid" value="<?=$domain->webspace_id?>">
                            <div class="col-md-5">
                                <input class="form-control" name="subdomain" placeholder="mysubdomainname">
                            </div>
                            <div class="col-md-7">
                                <select name="domain" class="form-control">
                                    <?php
                                    foreach($data["domains"] as $domain) {
                                        $dotcnt = explode(".", $domain->domain);
                                        $dotcnt = count($dotcnt);
                                        if($dotcnt == 2) {
                                        ?>
                                        <option>
                                            <?= $domain->domain ?>
                                        </option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this Sub-Domain</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                No domains on this webspace!
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-9 webicon" style="padding: 0 15px;">
            <a data-toggle="modal" data-target="#Modal" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Domain</a><br><br>
        </div>
    </div>
    <?php
}
?>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a Domain</h4>
            </div>
            <form action="../addDomain" method="post">
                <div class="modal-body">
                    <input name="webspaceid" type="hidden" value="<?=$data['webspaceid']?>">
                    <label for="domain">Domain</label>
                    <input class="form-control" name="domain" placeholder="example.com">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-fullwidth" type="submit"><i class="fa fa-plus-circle"></i><br>Add this Domain</button>
                </div>
            </form>
        </div>
    </div>
</div>
