 <?php
    /**
     * Sample layout.
     */
    use Helpers\Assets;
    use Helpers\Hooks;
    use Helpers\Url;
    use Core\View;

    //initialise hooks
    $hooks = Hooks::get();
    $lm = new \Models\Livechat_model();
    $um = new \Models\User_model();

    $modules = new \Models\Module_model();

    if(!empty($data["lid"]) && isset($data["lid"])) {
        $lid = $data["lid"];
    } else {
        $lid = 0;
    }
    ?>
     </div>
     <footer>
         <div class="topfooter">
             <div class="container">
                 <div class="row">
                     <div class="col-md-3">
                         <h4>Our Products</h4>
                         <ul>
                             <?php if($modules->isLoaded("teamspeak")) { ?>
                             <li><a href="">Teamspeak Servers</a></li>
                             <?php } ?>
                             <?php if($modules->isLoaded("gameserver")) { ?>
                             <li><a href="">Gameservers</a></li>
                             <?php } ?>
                             <?php if($modules->isLoaded("webspace")) { ?>
                                 <li><a href="">Webspaces</a></li>
                             <?php } ?>
                             <?php if($modules->isLoaded("vps")) { ?>
                             <li><a href="">Virtual Servers</a></li>
                             <?php } ?>
                             <?php if($modules->isLoaded("dedicated")) { ?>
                             <li><a href="">Dedicated Servers</a></li>
                             <?php } ?>
                         </ul>
                         <h4>Support</h4>
                         <ul>
                             <li><a href="">Teamspeak Support</a></li>
                             <?php if($modules->isLoaded("tickets")) { ?>
                             <li><a href="">Ticket Support</a></li>
                             <?php } ?>
                             <li><a href="">E-Mail Support</a></li>
                             <li><a href="">Support Hotline</a></li>
                             <?php if($modules->isLoaded("serverstatus")) { ?>
                                 <li><a href="<?= Url::getUri("serverstatus"); ?>">Server Status</a></li>
                             <?php } ?>
                         </ul>
                     </div>
                     <div class="col-md-3">

                     </div>
                     <div class="col-md-3">
                         <h4>We logged your IP for safety!</h4>
                         <p class="text-justify">
                             To ensure the security of our system we logged your ip address! If you don't want us to log
                             your IP-Address, please leave the page immediatly.
                         </p>
                         <p>
                             Your IP: <?=$um->getIP();?>
                         </p>
                     </div>
                     <div class="col-md-3">
                         <h4>Get Social</h4>
                         <ul>
                             <li><a href="">Facebook</a></li>
                             <li><a href="">Twitter</a></li>
                             <li><a href="">Youtube</a></li>
                             <li><a href="">Google+</a></li>
                         </ul>
                         <h4>Legal Stuff</h4>
                         <ul>
                             <?php if($modules->isLoaded("legaldisclosure")) { ?>
                             <li><a href="<?= Url::getUri("legaldisclosure"); ?>"><?=$data['lang_legaldisclosure']?></a></li>
                             <?php } ?>
                             <?php if($modules->isLoaded("policies")) { ?>
                             <li><a href="<?= Url::getUri("terms-of-service"); ?>"><?=$data['lang_tos']?></a></li>
                             <li><a href="<?= Url::getUri("privacy-policy"); ?>"><?=$data['lang_privacy']?></a></li>
                             <li><a href="<?= Url::getUri("withdraw-policy"); ?>"><?=$data['lang_withdraw']?></a></li>
                             <?php } ?>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <div class="bottomfooter">
             <?=$data['lang_copyright']?> &copy2015 - <?=date("Y")?> Splash-WI
         </div>
     </footer>
    </div>
     <div class="startMsgContainer">
         <i class="fa fa-info-circle"></i> Your server has been started. It can take a couple of seconds until the process is completed!
     </div>
     <div class="restartMsgContainer">
         <i class="fa fa-info-circle"></i> Your server has been restarted. It can take a couple of seconds until the process is completed!
     </div>
     <div class="stopMsgContainer">
         <i class="fa fa-info-circle"></i> Your server has been stopped. It can take a couple of seconds until the process is completed!
     </div>
     <div class="reinstallMsgContainer">
         <i class="fa fa-info-circle"></i> Your server is going to be reinstalled. It can take a couple of seconds until the process is completed!
     </div>


    <?php
    Assets::js([
        Url::templatePath().'js/bootstrap.min.js'
    ]);

    //hook for plugging in javascript
    $hooks->run('js');
    ?>
    <!-- JS -->
    <script>
        $('#editor').wysihtml5({
            "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": false, //Italics, bold, etc. Default true
            "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false //Button to change color of font
        });
        $('#editor2').wysihtml5({
            "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": false, //Italics, bold, etc. Default true
            "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false //Button to change color of font
        });
        $('#editor3').wysihtml5({
            "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": false, //Italics, bold, etc. Default true
            "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false //Button to change color of font
        });
        $('#editor4').wysihtml5({
            "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": false, //Italics, bold, etc. Default true
            "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false //Button to change color of font
        });
    </script>
    <script>
        $(document).ready(function () {

            $('.star').on('click', function () {
                $(this).toggleClass('star-checked');
            });

            $('.ckbox label').on('click', function () {
                $(this).parents('tr').toggleClass('selected');
            });

            $('.btn-filter').on('click', function () {
                var $target = $(this).data('target');
                if ($target != 'all') {
                    $('.table tr').css('display', 'none');
                    $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
                } else {
                    $('.table tr').css('display', 'none').fadeIn('slow');
                }
            });

            $('#chatmask').hide();

            $('#exp').click(function(e){
                if($('#chatmask').is(":visible")) {
                    $('#chatmask').hide();
                } else {
                    $('#chatmask').show();
                }
            });

            chatWindow();
        });

        function scrollBox() {
            var objBox = $('.console');
            var height = objBox[0].scrollHeight;
            objBox.scrollTop(height);
        }

         $(document).ready(function(){
             $(".startMsgContainer").hide();
             $(".restartMsgContainer").hide();
             $(".stopMsgContainer").hide();
             $(".reinstallMsgContainer").hide();
             scrollBox();
         });

        function refreshConsole() {
            setInterval(function () {
                $('.containconsole').load(document.URL + ' .console');
            }, 1500);
        }

        $('.containconsole').bind("DOMSubtreeModified",function(){
            scrollBox();
        });

        refreshConsole();

        function refreshStatus() {
            setInterval(function () {
                $('.status').load(document.URL + ' .status');
            }, 1500);
        }

        refreshStatus();

        function refreshStatus2() {
            setInterval(function () {
                $('.statuscontainer2').load(document.URL + ' .status2');
            }, 1500);
        }

        refreshStatus2();

        function refreshStatus3() {
            setInterval(function () {
                $('.statuscontainer3').load(document.URL + ' .status3');
            }, 1500);
        }

        refreshStatus3();

        function onBtn() {
            setInterval(function () {
                $('.onlinebuttons').load(document.URL + ' .onlinebuttonsinner');
            }, 1500);
        }

        onBtn();

        function refreshVpsStatus() {
            setInterval(function () {
                $('.vpsstatuscontainer').load(document.URL + ' .vpsstatus');
            }, 6000);
        }

        refreshVpsStatus();

        function refreshVpsStatus2() {
            setInterval(function () {
                $('.vpsstatuscontainer2').load(document.URL + ' .vpsstatus2');
            }, 6000);
        }

        refreshVpsStatus2();

        $(".startMsg").click(function () {
            $(".startMsgContainer").fadeIn("slow");
            setTimeout(function() {
                $(".startMsgContainer").fadeOut("slow");
            }, 5000);
        });
        $(".restartMsg").click(function () {
            $(".restartMsgContainer").fadeIn("slow");
            setTimeout(function() {
                $(".restartMsgContainer").fadeOut("slow");
            }, 5000);
        });
        $(".stopMsg").click(function () {
            $(".stopMsgContainer").fadeIn("slow");
            setTimeout(function() {
                $(".stopMsgContainer").fadeOut("slow");
            }, 5000);
        });
        $(".reinstallMsg").click(function () {
            $(".reinstallMsgContainer").fadeIn("slow");
            setTimeout(function() {
                $(".reinstallMsgContainer").fadeOut("slow");
            }, 5000);
        });
     </script>
     <script>
         function chatWindow() {
             setInterval(function () {
                 $('.chatwindowcontainer').load(document.URL + ' .concontain');
             }, 1500);
         }

         chatWindow();

         function chatList() {
             setInterval(function () {
                 $('.chatlistcontainer').load(document.URL + ' .chatlist');
             }, 1500);
         }

         chatList();

         function chatList2() {
             setInterval(function () {
                 $('.lchats').load(document.URL + ' .lchatsbox');
             }, 1500);
         }

         chatList2();

         function chatOnl() {
             setInterval(function () {
                 $('.maskcontainer').load(document.URL + ' .expandmask');
             }, 1500);
         }

         chatOnl();
     </script>
     <script>
             $(".search").keyup(function () {
                 var searchTerm = $(".search").val();
                 var listItem = $('.results tbody').children('tr');
                 var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

                 $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                     return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                 }
                 });

                 $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
                     $(this).attr('visible','false');
                 });

                 $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
                     $(this).attr('visible','true');
                 });

                 var jobCount = $('.results tbody tr[visible="true"]').length;
                 $('.counter').text(jobCount + ' items');

                 if(jobCount == '0') {$('.no-result').show();}
                 else {$('.no-result').hide();}
             });
     </script>
    <script>
        function submitchat() {
            var name  = document.getElementById("name").value;
            var message = document.getElementById("message").value;

            var dataString = 'name=' + name + '&message=' + message;
            if (name == '' || message == '') {
                //alert("Please Fill All Fields");
            } else {
                $.ajax({
                    type: "POST",
                    url: "startchat",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        //alert(html);
                    }
                });
            }
            $('#chatcontent').html(
                '<div class="btn btn-danger" type="submit" onclick="closechat()">Close Chat</div>' +
                '<div class="chatwindowcontainer">' +
                '<div class="concontain">' +

                '</div>' +
                '</div>' +
                '<form action="chatmsg" method="post" id="newmsg">' +
                '<textarea name="message" class="form-control" id="message" onkeypress="onEnter()"></textarea>' +
                '<div class="btn btn-success" type="submit" onclick="submitchatmsg()">Submit Message</div>' +
                '</form>'
            );
        }
        function submitchatmsg() {
            var message = document.getElementById("message").value;

            var dataString = 'message=' + message;
            if (message == '') {
                //alert("Please Fill All Fields");
            } else {
                $.ajax({
                    type: "POST",
                    url: "msgchat",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        //alert(html);
                    }
                });
            }

            $('#message').val('');
        }
        function submitchatmsg2() {
            var message = document.getElementById("message").value;

            var dataString = 'message=' + message;
            if (message == '') {
                //alert("Please Fill All Fields");
            } else {
                $.ajax({
                    type: "POST",
                    url: "msgchat/<?=$lid?>",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        //alert(html);
                    }
                });
            }

            $('#message').val('');
        }
        function closechat() {

            var dataString = '';
            $.ajax({
                type: "POST",
                url: "closelivechat",
                data: dataString,
                cache: false,
                success: function(html) {
                    //alert(html);
                }
            });
            var cntt = "<p class='text-center'><label>Thank you!</label><br>Thanks for chatting with us! We hope that the conversation helped you out! If you'd like you may want to follow us on facebook, twitter or youtube to stay up to date.</p>";
            $('#chatmask').html(cntt);

        }
    </script>
    <script>
        function onEnter() {
            var key = window.event.keyCode;

            // If the user has pressed enter
            if (key === 13) {
                var message = document.getElementById("message").value;

                var dataString = 'message=' + message;
                if (message == '') {
                    //alert("Please Fill All Fields");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "msgchat",
                        data: dataString,
                        cache: false,
                        success: function(html) {
                            //alert(html);
                        }
                    });
                }
                $('#message').val('');
            }
        }
        function onEnter2() {
            var key = window.event.keyCode;

            // If the user has pressed enter
            if (key === 13) {
                var message = document.getElementById("message").value;

                var dataString = 'message=' + message;
                if (message == '') {
                    //alert("Please Fill All Fields");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "msgchat/<?=$lid?>",
                        data: dataString,
                        cache: false,
                        success: function(html) {
                            //alert(html);
                        }
                    });
                }

                $('#message').val('');
            }
        }
    </script>
    <script>
        $('nav .dropdown-submenu > a:not(a[href="#"])').on('click', function() {
            self.location = $(this).attr('href');
        });
    </script>
    <?php
    //if(Session::get("role") == "user") {
        View::renderTemplate('livechat', $data);
    //}
    //hook for plugging in code into the footer
    $hooks->run('footer');
    ?>
    </body>
</html>
