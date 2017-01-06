<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                QR Code
            </div>
            <div class="panel-body">
                <img style="width: 100%" src="<?=$data["qr"]?>">
            </div>
            <div class="panel-footer">
                Secret: <?=$data["secret"]?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Confirm Authenticator
            </div>
            <div class="panel-body">
                <form action="locktwofactor" method="post">
                    <input class="form-control" placeholder="Google Authenticator Code" name="code" required><br>
                    <button type="submit" class="btn btn-success">Confirm Authenticator</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-success">
            <div class="panel-heading">
                Two-Factor-Authentication Information
            </div>
            <div class="panel-body">
                <p class="text-justify">
                    You are about to improve your account security from unauthorized access by another 3rd party! We are
                    glad you decided to add the extra layer of security to your account. To proceed you will need to install
                    the google authenticator app from the official IOS appstore or the google play store. After you downloaded
                    it, please open it and click the plus in the bottom right corner of the application. You will have to choose
                    either you want to use a code or a QR picture to set up the new authentication page. If you want to use the
                    code, please referr to the "secret" on the right. If you want to use the QR code please get your camera
                    pointed at the QR code on the right.
                </p>
                <p class="text-justify">
                    To become familiar with the 2-Factor principal and to ensure you understood how it works, please enter the
                    authentication code which is displayed on your smartphone into the "Confirm Authenticator" textfield on the
                    left. After you clicked on the confirmation button, your setup process is compleated. From now on you will
                    have to use the authenticator every time you log into your account!
                </p>
                <p class="text-justify">
                    If you want to remove the authenticator at a later point in time, please go to your profile page, enter the
                    authenticator code into the appropriated field and click on the button to remove the authenticator.
                </p>
                <p class="text-justify" style="font-size: 18px;">
                    <label style="margin-bottom: 0;">ATTENTION!</label> An authenticator code is only valid for around 10 seconds. If you fail entering
                    it in time or if the script takes longer to execute, we advese you to try again. If it still does not work,
                    we advise to contact our support team.
                </p>
                <p class="text-justify">
                    <label>Lost your smartphone?</label><br>If you lost your smartphone or you can't access the google authenticator
                    app for another reason, we can help! Get in touch with us and we will remove the authenticator from your account.
                    Please keep in mind that this is only possible if we are able to perform an identity check on your person. Therefor
                    your account needs to have a valid address as well as the full name entered into it.
                </p>
                <p class="text-justify">
                    <label>How does this removal process work?</label><br>We will sent you a letter in your mail which has a special
                    code written on it. Please call us via. phone and tell the support agent the username of the account you want to
                    recover along with the code we provided in the letter. We will then remove the authenticator from your user
                    account. <label style="margin-bottom: 0;">Why so complicated?</label> Well, we care about our clients security. And you should care about yours!
                    That's why we do not remove any authentication methods without the identity approval of the affected user.
                </p>
            </div>
        </div>
    </div>
</div>