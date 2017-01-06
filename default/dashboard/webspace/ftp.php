<div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
    <div class="row">
        <div class="col-md-12" style="line-height: 34px; padding-left: 40px;">
            Webspace <label>#web<?=$data['webspaceid']?></label><div class="pull-right"><a class="btn btn-primary btn-small" href="../<?=$data['webspaceid']?>"><i class="fa fa-arrow-circle-left"></i> Back</a></div>
        </div>
    </div>
</div>
<?php
foreach($data["webspace"] as $ftp) {
    ?>
    <div class="row">
        <div class="col-md-3">
            <div class="jumbotron" style="padding: 20px">
                <h3 style="font-size: 20px; padding: 0px; margin: 0px; ">FTP Login Credentials</h3><hr>
                <label>FTP-Host:</label> <?= $data["ftpip"] ?><br>
                <label>FTP-Username:</label> <?= $ftp->username ?>
                <label>FTP-Password:</label> <?php $pwhelper = new \Helpers\Password(); echo $pwhelper->decryptPassword($ftp->password); ?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="jumbotron">
                THE FTP CLIENT WILL GO HERE AT A LATER POINT!<br>
                <iframe
                    style="
                    width: 100%;
                    border: none;
                    height: auto;
                    "
                    src="../../../ftp"
                    scrolling="no"
                    onload="resizeIframe(this)">
                </iframe>
                <script language="javascript" type="text/javascript">
                    function resizeIframe(obj) {
                        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
}