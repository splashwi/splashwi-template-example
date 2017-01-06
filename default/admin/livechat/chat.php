<?php
$lm = new \Models\Livechat_model();
?>
<a href="../close/<?=$data["chat"]->id?>" class="btn btn-danger">Close Chat</a></td></td>
<div id="chatcontent">
    <div class="chatwindowcontainer">
        <div class="concontain">
            <?=$lm->interpretChatByID($data["chat"]->id)?>
        </div>
    </div>
    <form action="msgchat" method="post" id="newmsg2">
        <textarea name="message" class="form-control" id="message" onkeypress="onEnter2()"></textarea>
        <div class="btn btn-success" type="submit" onclick="submitchatmsg2()">Submit Message</div>
    </form>
</div>