<?php
use Helpers\Url;
$passwordhelper = new \Helpers\Password();
$vmodel = new \Models\Virtual_model();
?>
<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td style="width: 5%;">
                ID
            </td>
            <td style="width: 25%;">
                Usage
            </td>
            <td style="width: 25%;">
                Status
            </td>
            <td style="width: 25%;">
                Server Data
            </td>
            <td style="width: 20%;">
                Delete
            </td>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($data["servers"] as $server) {
        $srv = $vmodel->getUsage($server->id);
        $onl = $vmodel->isOnline($server->id);
        ?>
        <tr>
            <td style="width: 5%;">
                m_v<?=$server->id?>
            </td>
            <td style="width: 25%;">
                <?=$srv["ram"]["used"]?>MB / <?=$srv["ram"]["limit"]?>MB (<?=$srv["ram"]["percent"]?>) RAM USED<br>
                <?=$srv["disk"]["/"]["used_gb"]?>GB / <?=$srv["disk"]["/"]["limit_gb"]?>GB DISK USED (<?=$srv["disk"]["percent"]?> USED)<br>
                <?=$srv["cpu"]["percent"]?> CPU USED
            </td>
            <td style="width: 25%;">
                <?php
                if($onl == 1) {
                    echo "<span class='success'>Online</span>";
                } else {
                    echo "<span class='danger'>Offline</span>";
                }
                ?>
            </td>
            <td style="width: 25%;">
                IPs:<br>
                <?php
                if(!empty($server->ips)) {
                    foreach(json_decode($server->ips) as $ip) {
                        echo $ip.'<br>';
                    }
                } else {
                    echo "No IPv4 Addresses!<br>";
                }
                if(!empty($server->ipv6)) {
                    foreach (json_decode($server->ipv6) as $ip) {
                        echo $ip . '<br>';
                    }
                } else {
                    echo "No IPv6 Addresses!<br>";
                }
                echo "<br>Root Password:<br>";
                echo $passwordhelper->decryptPassword($server->pass);
                ?>
            </td>
            <td style="width: 20%;">
                <a href="<?=Url::getUri("admin/vps/delete/".$server->id)?>" class="btn btn-danger"><i class="fa fa-times"></i> Delete Server</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Virtualserver</a><br><br>
    </div>
</div>
<?php
$masters = $vmodel->get_mservers();
?>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a Virtualserver</h4>
            </div>
            <form action="add" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="password">Root Password</label>
                            <input class="form-control" name="rootpass" type="password">
                            <label for="price">Price</label>
                            <input class="form-control" name="price" type="text" placeholder="12.99">
                            <label for="virt">Virtualization Technology</label>
                            <select name="virt" class="form-control">
                                <option value="kvm">KVM</option>
                                <option value="openvz">OpenVZ</option>
                                <option value="xen">XEN (HVM)</option>
                                <option value="xcp">XEN (XCP)</option>
                            </select>
                            <label for="master_id">Master</label>
                            <select name="master_id" class="form-control">
                                <?php foreach($masters as $master) { ?>
                                    <option value="<?=$master->id?>"><?=$master->ip?> (ID: <?=$master->id?>)</option>
                                <?php } ?>
                            </select>
                            <label for="plid">Plan</label>
                            <select name="plid" class="form-control">
                                <option value="0">Select a plan...</option>
                            </select>
                            <label for="hostname">Hostname</label>
                            <input name="hostname" class="form-control" placeholder="vps1.host1.vps.splash-wi.com">
                            <label for="space">Diskspace</label>
                            <input name="space" class="form-control" type="number" step="1024" min="1024" max="1073741824">
                            <label for="ram">RAM</label>
                            <input name="ram" class="form-control" type="number" step="1024" min="1024" max="1048576">
                            <label for="bandwidth">Bandwidth</label>
                            <input name="bandwidth" class="form-control" type="number" step="1024" min="0">
                            <label for="network_speed">Network Speed</label>
                            <select name="networkk_speed" class="form-control">
                                <option value="1">1 Mbit/s</option>
                                <option value="10">10 Mbit/s</option>
                                <option value="100">100 Mbit/s</option>
                                <option value="1024">1 Gbit/s</option>
                                <option value="10240">10 Gbit/s</option>
                                <option value="0">Unlimited</option>
                            </select>
                            <label for="cores">Cores</label>
                            <input name="cores" type="number" class="form-control" min="1" max="100" step="1">
                            <label for="mgs">Media Group</label>
                            <input type="text" name="mgs" class="form-control" placeholder="MyMediaGroup">
                            <label for="mac">MAC Address</label>
                            <input type="text" name="mac" class="form-control" placeholder="00:00:00:00:00:00:00:00">
                            <label for="priority">VPS Priority</label>
                            <input type="text" name="priority" class="form-control" value="1.0">
                            <label for="cpu">CPU Weight</label>
                            <input type="text" name="cpu" value="1.0" class="form-control">
                            <label for="cpu_percent">CPU Percent</label>
                            <input type="text" name="cpu_percent" value="100.00" class="form-control">
                            <label for="rilimit">OS Reinstall Limit</label>
                            <input name="rilimit" type="number" class="form-control" min="0" max="1000" step="1">
                            <label for="nic_type">Network Interface</label>
                            <select name="nic_type" class="form-control">
                                <option value="default">Default</option>
                                <option value="e1000">e1000 NetIO</option>
                            </select>
                            <label for="osid">Operating System ID</label>
                            <input type="number" min="1" step="1" name="osid" class="form-control">
                            <label for="iso">ISO File</label>
                            <select name="iso" class="form-control">
                                <option value="">No ISO</option>
                            </select>
                            <label for="tuntap">Enable TUN/TAP</label>
                            <select name="tuntap" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            <label for="vnc">Enable VNC</label>
                            <select name="vnc" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            <label for="vncpass">VNC Password</label>
                            <input type="password" name="vncpass" class="form-control">
                            <label for="burst">Burst RAM</label>
                            <input name="burst" class="form-control" type="number" step="1024" min="0" max="1048576" value="0">
                            <label for="swapram">Swap RAM</label>
                            <input name="swapram" class="form-control" type="number" step="1024" min="0" max="1048576" value="0">
                            <label for="shadow">Shadow RAM</label>
                            <input name="shadow" class="form-control" type="number" step="1024" min="0" max="1048576" value="0">
                            <label for="virtio">Enable VirtIO</label>
                            <select name="virtio" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            <label for="vif_type">VIF Type</label>
                            <select name="vif_type" class="form-control">
                                <option value="netfront">Netfront</option>
                                <option value="ioemu">IOEMU</option>
                            </select>
                            <label for="hvm">Use HVM</label>
                            <select name="hvm" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            <label for="boot">Boot Order</label>
                            <select name="boot" class="form-control">
                                <option value="dca">DCA</option>
                                <option value="cda">CDA</option>
                            </select>
                            <label for="ips">IP Addresses</label>
                            <input name="ips" class="form-control" placeholder="192.168.178.21,33.51.224.12,...">
                            <label for="noemail">Send Infomails to User?</label>
                            <select name="nomail" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <label for="admin_managed">Managed?</label>
                            <select name="admin_managed" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this Virtualserver</button>
                </div>
            </form>
        </div>
    </div>
</div>