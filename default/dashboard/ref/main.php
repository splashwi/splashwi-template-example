<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td>Referred User</td>
            <td>Firstname</td>
            <td>Lastname</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data["ref_users"] as $ref_user) { ?>
        <tr>
            <td><?=$ref_user->username?></td>
            <td><?=$ref_user->firstname?></td>
            <td><?=$ref_user->lastname?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<h3>Banners</h3>
<div class="row">
<?php
$um = new \Models\User_model();
$user = $um->get_profile(\Helpers\Session::get("username"))[0];
$bannercnt = 0;
foreach($data["banners"] as $banner) {
    $bannercnt = $bannercnt + 1;
    ?>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Banner <?=$bannercnt?>
            </div>
            <div class="panel-body">
                <a href="<?="http://" . $_SERVER['SERVER_NAME'] . DIR . 'ref/' . $user->id?>" target="_blank"><img class="banner" src="<?=DIR.'banners/'.$banner?>"></a>
                <br><br><label>Code</label>
                <textarea class="form-control code" readonly disabled><a href="<?="http://" . $_SERVER['SERVER_NAME'] . DIR . 'ref/' . $user->id?>" target="_blank">
    <img src="<?="http://" . $_SERVER['SERVER_NAME'] . DIR . 'banners/' . $banner ?>">
</a></textarea>
            </div>
        </div>
    </div>
    <?php
}
?>
</div>
