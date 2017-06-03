<form class="form uniformForm validateForm" enctype="multipart/form-data" id="user-form"
      action="" method="post">
    <input type="hidden" name="<?=\vendor\security\Csrf::$_csrf_token_name?>" value="<?=\vendor\security\Csrf::_creatToken()?>">

    <div class="widget">
        <div class="widget-header">
            <h3>Login Information</h3>
        </div> <!-- .widget-header -->
        <div class="widget-content nopadding">
            <div class="field-group">

                <label for="User_email" class="required">Email <span class="required">*</span></label>
                <div class="field">
                    <input size="40" maxlength="255" name="User[email]" id="User_email" type="text"
                           value="<?=isset($model)?$model->email:'';?>">
                    <div class="errorMessage" id="User_email_em_" style="display:none"></div>
                </div>

                <label for="User_password">Password</label>
                <div class="field">
                    <input size="40" maxlength="255" name="User[password]" id="User_password" type="password">
                    <div class="errorMessage" id="User_password_em_" style="display:none"></div>
                </div>

                <label for="User_repeat_password">Repeat Password</label>
                <div class="field">
                    <input size="40" maxlength="100" name="User[repeat_password]" id="User_repeat_password"
                           type="password">
                    <div class="errorMessage" id="User_repeat_password_em_" style="display:none"></div>
                </div>
                <label for="User_status">Status</label>
                <div class="field">
                    <select name="User[status]" id="User_status">
                        <option value="active" <?=isset($model)&&$model->status=='active'?'selected':'';?>>Active</option>
                        <option value="inactive" <?=isset($model)&&$model->status=='inactive'?'selected':'';?>>Inactive</option>
                    </select>
                    <div class="errorMessage" id="User_status_em_" style="display:none"></div>
                </div>
                <label for="User_role">Role</label>
                <div class="field">
                    <select name="User[role]" id="User_role">
                        <option value="1" <?=isset($model)&&$model->role=='1'?'selected':'';?>>Admin</option>
                        <option value="0" <?=isset($model)&&$model->role=='0'?'selected':'';?>>User</option>
                    </select>
                    <div class="errorMessage" id="User_role_em_" style="display:none"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="widget">
        <div class="widget-header">
            <h3>User Information</h3>
        </div> <!-- .widget-header -->
        <div class="widget-content nopadding">
            <div class="field-group">
                <label for="User_username">Username</label>
                <div class="field">
                    <input size="40" maxlength="255" name="User[username]" id="User_username" type="text"
                           value="<?=isset($model)?$model->username:'';?>">
                    <div class="errorMessage" id="User_username_em_" style="display:none"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
		<span class="pull-left">
			<button type="submit" class="btn btn-primary">Save</button>
			&nbsp;
			<a href="/admin/user">Back</a>
		</span>
    </div>
</form>
<script type="text/javascript">
    /*<![CDATA[*/
    jQuery(function($) {
        jQuery('#User_expired_date').datepicker({'showAnim':'fold','dateFormat':'dd-mm-yy'});
        jQuery('#user-form').yiiactiveform({'validateOnSubmit':true,'attributes':[{'id':'User_email','inputID':'User_email','errorID':'User_email_em_','model':'User','name':'email','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {

            if(jQuery.trim(value)=='') {
                messages.push("Email cannot be blank.");
            }


            if(jQuery.trim(value)!='') {

                if(value.length>128) {
                    messages.push("Email is too long (maximum is 128 characters).");
                }

            }

            if(jQuery.trim(value)!='' && !value.match(/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/)) {
                messages.push("Email is not a valid email address.");
            }

        }}
        <?php if(!isset($model)):?>
        ,{'id':'User_password','inputID':'User_password','errorID':'User_password_em_','model':'User','name':'password','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {

            if(jQuery.trim(value)!='') {

                if(value.length>128) {
                    messages.push("Password is too long (maximum is 128 characters).");
                }

            }


            if(jQuery.trim(value)=='') {
                messages.push("Password cannot be blank.");
            }


            if(jQuery.trim(value)!='') {

                if(value.length<6) {
                    messages.push("Password is too short (minimum is 6 characters).");
                }

            }

        }}
        <?php endif;?>,{'id':'User_usertype','inputID':'User_usertype','errorID':'User_usertype_em_','model':'User','name':'usertype','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {

            if(jQuery.trim(value)!='') {

                if(!value.match(/^\s*[+-]?\d+\s*$/)) {
                    messages.push("Membership must be an integer.");
                }

            }

        }},{'id':'User_no_listing','inputID':'User_no_listing','errorID':'User_no_listing_em_','model':'User','name':'no_listing','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {

            if(jQuery.trim(value)!='') {

                if(!value.match(/^\s*[+-]?\d+\s*$/)) {
                    messages.push("No Listing must be an integer.");
                }

            }

        }},{'id':'User_firstname','inputID':'User_firstname','errorID':'User_firstname_em_','model':'User','name':'firstname','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {

            if(jQuery.trim(value)=='') {
                messages.push("First Name cannot be blank.");
            }


            if(jQuery.trim(value)!='') {

                if(value.length>255) {
                    messages.push("First Name is too long (maximum is 255 characters).");
                }

            }


            if(jQuery.trim(value)=='') {
                messages.push("First Name cannot be blank.");
            }

        }},{'id':'User_username','inputID':'User_username','errorID':'User_username_em_','model':'User','name':'username','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {

            if(jQuery.trim(value)!='') {

                if(value.length>255) {
                    messages.push("Last Name is too long (maximum is 255 characters).");
                }

            }

        }},{'id':'User_phone','inputID':'User_phone','errorID':'User_phone_em_','model':'User','name':'phone','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {

            if(jQuery.trim(value)!='') {

                if(value.length>20) {
                    messages.push("Phone is too long (maximum is 20 characters).");
                }

            }

        }},{'id':'User_website','inputID':'User_website','errorID':'User_website_em_','model':'User','name':'website','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {

            if(jQuery.trim(value)!='') {

                if(value.length>255) {
                    messages.push("Website is too long (maximum is 255 characters).");
                }

            }

        }},{'id':'User_timezone','inputID':'User_timezone','errorID':'User_timezone_em_','model':'User','name':'timezone','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {

            if(jQuery.trim(value)!='') {

                if(value.length>100) {
                    messages.push("Timezone is too long (maximum is 100 characters).");
                }

            }

        }}],'errorCss':'error'});
    });
    /*]]>*/
</script>