<?php
$servers = $data["status"];
?>
<div class="serverstatus">
    <h2>Virtual Server Hosts:</h2>
    <table class="table" id="paginate">
        <thead>
            <tr class="blue">
                <td>Host</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($servers as $server) {
                if($server["type"] == "vm") {
                    if($status == "true") {
                        $status = '<span class="label label-success">Online</span>';
                    } else {
                        $status = '<span class="label label-danger">Offline</span>';
                    }
                    echo '
                        <tr>
                            <td style="width: 80%">vHost'.$server["id"].' ('.$server["ip"].')</td>
                            <td style="width: 20%">'.$status.'</td>
                        </tr>
                    ';
                }
            }
            ?>
        </tbody>
    </table>

    <h2>Game Hosts:</h2>
    <table class="table" id="paginate2">
        <thead>
        <tr class="blue">
            <td>Host</td>
            <td>Status</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($servers as $server) {
            if($server["type"] == "game") {
                if($status == "true") {
                    $status = '<span class="label label-success">Online</span>';
                } else {
                    $status = '<span class="label label-danger">Offline</span>';
                }
                echo '
                        <tr>
                            <td style="width: 80%">gameHost'.$server["id"].' ('.$server["ip"].')</td>
                            <td style="width: 20%">'.$status.'</td>
                        </tr>
                    ';
            }
        }
        ?>
        </tbody>
    </table>

    <h2>Voiceserver Hosts:</h2>
    <table class="table" id="paginate3">
        <thead>
        <tr class="blue">
            <td>Host</td>
            <td>Status</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($servers as $server) {
            if($server["type"] == "voice") {
                if($status == "true") {
                    $status = '<span class="label label-success">Online</span>';
                } else {
                    $status = '<span class="label label-danger">Offline</span>';
                }
                echo '
                        <tr>
                            <td style="width: 80%">voiceHost'.$server["id"].' ('.$server["ip"].')</td>
                            <td style="width: 20%">'.$status.'</td>
                        </tr>
                    ';
            }
        }
        ?>
        </tbody>
    </table>

    <h2>Web Hosts:</h2>
    <table class="table" id="paginate4">
        <thead>
        <tr class="blue">
            <td>Host</td>
            <td>Status</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($servers as $server) {
            if($server["type"] == "web") {
                if($status == "true") {
                    $status = '<span class="label label-success">Online</span>';
                } else {
                    $status = '<span class="label label-danger">Offline</span>';
                }
                echo '
                        <tr>
                            <td style="width: 80%">webHost'.$server["id"].' ('.$server["ip"].')</td>
                            <td style="width: 20%">'.$status.'</td>
                        </tr>
                    ';
            }
        }
        ?>
        </tbody>
    </table>
</div>