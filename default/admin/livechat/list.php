<div class="chatlistcontainer">
    <div class="chatlist">
        <table class="table">
            <thead>
                <tr class="blue">
                    <td style="width: 10%;">
                        ID
                    </td>
                    <td style="width: 15%;">
                        User
                    </td>
                    <td style="width: 15%;">
                        Agent
                    </td>
                    <td style="width: 20%;">
                        Close
                    </td>
                    <td style="width: 20%;">
                        Take Over
                    </td>
                    <td style="width: 20%;">
                        View Chat
                    </td>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($data["chats"] as $chat) {
                ?>
                <tr>
                    <td style="width: 10%;"><?=$chat->id?></td>
                    <td style="width: 15%;"><?=$chat->username?></td>
                    <td style="width: 15%;"><?=$chat->agent?></td>
                    <td style="width: 20%;"><a href="livechat/close/<?=$chat->id?>" class="btn btn-danger">Close Chat</a></td></td>
                    <td style="width: 20%;">
                        <?php
                        if(empty($chat->agent)) {
                        ?>
                        <a href="livechat/claim/<?=$chat->id?>" class="btn btn-success">Claim Chat</a></td>
                    <?php
                    } else {
                        ?>
                        <a class="btn btn-warning" disabled>Chat Claimed</a></td>
                        <?php
                    }
                    ?>
                    <td style="width: 20%;">
                        <?php
                        if($chat->agent == \Helpers\Session::get("username")) {
                        ?>
                        <a href="livechat/chat/<?=$chat->id?>" class="btn btn-info">View Chat</a></td></td>
                <?php
                } else {
                    ?>
                    <a class="btn btn-warning" disabled>Claim the Chat first</a></td>
                    <?php
                }
                ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
