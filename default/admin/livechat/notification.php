<?php
use Helpers\Session;

$lm = new \Models\Livechat_model();
$chats = $lm->getOpenChats(Session::get("username"));

foreach($chats as $chat) {
?>
    <div class="cbox">
        New Livechat request!
    </div>
<?php
}
?>