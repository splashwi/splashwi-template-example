<h3 class="text-center">User Accounts</h3>
<table class="table" id="paginate">
    <thead>
    <tr class="blue">
        <th>#</th>
        <th class="col-md-2 col-xs-2">Username</th>
        <th class="col-md-3 col-xs-3">Role</th>
        <th class="col-md-3 col-xs-3">Actions</th>
    </tr>
    <tr class="warning no-result">
        <td colspan="4"><i class="fa fa-warning"></i> No results!</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $cnt = 0;
    foreach($data["clients"] as $user) {
        ?>
        <tr>
            <th scope="row" width="10%"><?=$user->id?></th>
            <td style="width: 5%"><?=$user->username?></td>
            <td style="width: 5%"><?=$user->role?></td>
            <td style="width: 20%"><a class="btn btn-info" href="client/info/<?=$user->id?>"><i class="fa fa-info-circle"></i> Info</a></td>
        </tr>
        <?php
        $cnt = $cnt + 1;
    }
    ?>
    </tbody>
</table>