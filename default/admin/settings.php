<?php
/**
 * Panel Settings
 */
?>
<div class="row">
    <div class="col-md-12">
        <form action="changesettings" method="post">
            <div class="box">
                <h3 style="margin:0;padding:0;">General Page Settings</h3>
                <label>Site Title:</label>
                <input class="form-control" name="sitetitle" value="<?=SITETITLE?>">
                <label>Splash-Wi Template:</label>
                <select name="template" class="form-control">
                    <option value="<?=TEMPLATE?>">Currently Activated: <?=TEMPLATE?></option>
                </select>
            </div>
            <div class="box">
                <h3 style="margin:0;padding:0;">License</h3>
                <label>License Key:</label>
                <input class="form-control" name="license_key" value="<?=LICENSE_KEY?>">
                <label>License Username:</label>
                <input class="form-control" name="license_username" value="<?=LICENSE_USERNAME?>">
            </div>
            <div class="box">
                <h3 style="margin:0;padding:0;">Frontend / Order System</h3>
                <label>Enable Frontend*:</label>
                <select name="frontend" class="form-control">
                    <option value="<?=FRONTEND?>">Current value: <?=FRONTEND?></option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </div>
            <div class="box">
                <h3 style="margin:0;padding:0;">Database Credentials</h3>
                <label>Database Type:</label>
                <select name="db_type" class="form-control">
                    <option value="<?=DB_TYPE?>">Current value: <?=DB_TYPE?></option>
                    <option value="mysql">MySQL</option>
                    <option value="mysqli">MySQLi</option>
                    <option value="sqlite">SQLite</option>
                    <option value="pdo">PDO</option>
                </select>
                <label>Database Host:</label>
                <input class="form-control" name="db_host" value="<?=DB_HOST?>" autocomplete="off">
                <label>Database Username:</label>
                <input class="form-control" name="db_user" value="<?=DB_USER?>" autocomplete="off">
                <label>Database Password:</label>
                <input class="form-control" name="db_pass" value="<?=DB_PASS?>" type="password" autocomplete="off">
                <label>Database Name:</label>
                <input class="form-control" name="db_name" value="<?=DB_NAME?>" autocomplete="off">
                <label>Database Prefix:</label>
                <input class="form-control" name="prefix" value="<?=PREFIX?>"  autocomplete="off" disabled>
                Changing the database prefix WILL destroy your entire installation! Therefor this option is disabled.
                If you want to change the prefix anyways, change it in the Config.php manually!
            </div>
            <div class="box">
                <h3 style="margin:0;padding:0;">API Credentials</h3>
                <label>API Key*:</label>
                <input class="form-control" name="api_key" value="<?=API_KEY?>" minlength="16">
                <label>API Username*:</label>
                <input class="form-control" name="api_username" value="<?=API_USERNAME?>">
                <label>API Password*:</label>
                <input class="form-control" name="api_password" value="<?=API_PASSWORD?>" type="password">
            </div>
            *Attention! This is for hosting-providers only!
            <button type="submit" class="btn btn-warning">Submit Changes</button>
        </form>
    </div>
</div>
