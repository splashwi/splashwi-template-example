<?php
use Helpers\Url;

$servers = $data['servers'];
?>
<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td style="width: 10% !important;">
                ID
            </td>
            <td style="width: 20% !important;">
                Owner
            </td>
            <td>
                Data
            </td>
            <td>
                Deactivate
            </td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($servers as $server) { ?>
        <tr>
            <td style="width: 10% !important;">
                <?=$server->id?>
            </td>
            <td style="width: 20% !important;">
                <?=$server->username?>
            </td>
            <td>
                Plattform: <?=$server->plattform?><br>
                RAM: <?=$server->ram?>MB<br>
                <br>
                More information available...
            </td>
            <td>
                <?php if($server->status == 1) { ?>
                <a href="<?=Url::getUri("admin/dedicated/online/".$server->id)?>" class="btn btn-success">Set Online</a>
                <?php } ?>
                <a href="<?=Url::getUri("admin/dedicated/deactivate/".$server->id)?>" class="btn btn-danger">Request Cancelation</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
