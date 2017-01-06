<?php
use Helpers\Url;
use Helpers\Session;
$modules = new \Models\Module_model();
$lm = new \Models\Livechat_model();
$status = $lm->agentOnline();

if($modules->isLoaded("livechat")) {
    if(Session::get("role") == "user" || empty(Session::get("role"))) {
        if($status == true) {
            if(empty(\Helpers\Session::get("chatid"))) {
                ?>
                <div class="livechat">
                    <div class="chatmask" id="chatmask">
                        <div id="chatcontent">
                            <form action="startchat" method="post">
                                <p class="text-center">
                                    <label>How to start a conversation?</label><br>
                                    To start a conversation with a support agent, please fill out all of the fields below and
                                    click the button to proceed!

                                    <label>Your Name:</label>
                                    <input class="form-control" name="name" id="name" placeholder="Your Name">
                                    <label>Your Question:</label>
                                    <textarea class="form-control" name="message" id="message" placeholder="Your message!"></textarea>
                                </p>
                                <div class="btn btn-success" type="submit" onclick="submitchat()">Start Chat</div>
                            </form>
                        </div>
                    </div>
                    <div class="maskcontainer" id="exp">
                        <div class="expandmask">
                            <i class="fa fa-comment"></i> Chat with us!
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="livechat">
                    <div class="chatmask" id="chatmask">
                        <div class="btn btn-danger" type="submit" onclick="closechat()">Close Chat</div>
                        <div id="chatcontent">
                            <div class="chatwindowcontainer">
                                <div class="concontain">
                                    <?=$lm->interpretChat()?>
                                </div>
                            </div>
                            <form action="chatmsg" method="post" id="newmsg">
                                <textarea name="message" class="form-control" id="message" onkeypress="onEnter()"></textarea>
                                <div class="btn btn-success" type="submit" onclick="submitchatmsg()">Submit Message</div>
                            </form>
                        </div>
                    </div>
                    <div class="maskcontainer" id="exp">
                        <div class="expandmask">
                            <i class="fa fa-comment"></i> Chat with us!
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="livechat">
                <a href="<?=Url::getUri("dashboard/tickets")?>">
                    <div class="maskcontainer">
                        <div class="expandmask">
                            <i class="fa fa-comment-o"></i> Leave a message!
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
    }
}
?>