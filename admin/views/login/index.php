<div id="login">
    <div id="logo"><a href="/"><img src="/themes/retreat/admin/images/logo2.png"/></a></div>

    <div id="login_panel">
        <form id="login-form" action="" method="post">
            <div class="login_fields">
                <div class="field">
                    <label for="email">Email</label>
                    <input tabindex="1" name="AdminLogin[email]" id="AdminLogin_email" type="text"/>
                    <div class="errorMessage" id="AdminLogin_email_em_" style="display:none"></div>
                </div>
                <div class="field">
                    <label for="password">Password
                        <small><a id="to-recover" class="flip-link" href="/admin/login/forgot" tabindex="4">Forgot
                                Password?</a></small>
                    </label>
                    <input tabindex="2" name="AdminLogin[password]" id="AdminLogin_password" type="password"/>
                    <div class="errorMessage" id="AdminLogin_password_em_" style="display:none"></div>
                </div>
                <div class="errorMessage error_login"><?=isset($data)&&!empty($data)?$data:''?></div>
            </div>
            <input type="hidden" name="<?=\vendor\security\Csrf::$_csrf_token_name?>" value="<?=\vendor\security\Csrf::_creatToken()?>">

            <div class="login_actions">
                <button type="submit" class="btn btn-primary" tabindex="3">Login</button>
            </div>
        </form>
    </div>
</div> <!-- #login -->
<script>
    $('.btn-primary').click(function () {
        $('.error_login').remove();
    });
</script>