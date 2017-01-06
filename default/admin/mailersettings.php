<?php
/**
 * Panel Settings
 */
?>
<div class="row">
    <div class="col-md-12">
        <form action="changemailersettings" method="post">
            <div class="box">
                <h3 style="margin:0;padding:0;">Mailer Credentials</h3>
                <label>SMTP Login Type:</label>
                <select name="smtp_type" class="form-control">
                    <option value="<?=SMTP_TYPE?>">Current value: <?=SMTP_TYPE?></option>
                    <option value="tls">TLS</option>
                    <option value="ssl">SSL</option>
                </select>
                <label>SMTP Server:</label>
                <input class="form-control" name="smtp_server" value="<?=SMTP_SERVER?>" autocomplete="off">
                <label>SMTP Port:</label>
                <input class="form-control" name="smtp_port" value="<?=SMTP_PORT?>" autocomplete="off">
                <label>SMTP Username:</label>
                <input class="form-control" name="smtp_username" value="<?=SMTP_USERNAME?>" autocomplete="off">
                <label>SMTP Password:</label>
                <input class="form-control" name="smtp_password" value="<?=SMTP_PASSWORD?>" type="password" autocomplete="off">
            </div>
            <div class="box">
                <h3 style="margin:0;padding:0;">Mailer Credentials</h3>
                <label>From:</label>
                <input class="form-control" name="smtp_from" value="<?=SMTP_FROM?>" autocomplete="off">
                <label>Reply to:</label>
                <input class="form-control" name="smtp_to" value="<?=SMTP_TO?>" autocomplete="off">
                <label>Company Name:</label>
                <input class="form-control" name="smtp_to_name" value="<?=SMTP_TO_NAME?>" autocomplete="off">
            </div>
            <div class="box">
                <h3 style="margin:0;padding:0;">Datacenter Information Service</h3>
                <p>
                    This contact info is used to inform the provider about new orders of dedicated, bare metal machines!
                </p>
                <label>Datacenter Name:</label>
                <input class="form-control" name="dc_name" value="<?=DC_NAME?>" autocomplete="off">
                <label>Datacenter E-Mail:</label>
                <input class="form-control" name="dc_mail" value="<?=DC_MAIL?>" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-warning">Submit Changes</button>
        </form>
    </div>
</div>