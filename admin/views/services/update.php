
<form class="form uniformForm validateForm" enctype="multipart/form-data" id="Service-form"
      action="" method="post">
    <input type="hidden" name="<?=\vendor\security\Csrf::$_csrf_token_name?>" value="<?=\vendor\security\Csrf::_creatToken()?>">

    <div class="widget">
        <div class="widget-header">
            <h3>Service Information</h3>
        </div> <!-- .widget-header -->
        <div class="widget-content nopadding">
            <div class="field-group">

                <label for="Service_name" class="required">Name <span class="required">*</span></label>
                <div class="field">
                    <input size="40" maxlength="255" name="Service[name]" id="Service_name" type="text"
                           value="<?= isset($model) ? $model->name : ''; ?>">
                    <div class="errorMessage" id="Service_name_em_" style="display:none"></div>
                </div>
                <label for="Service_order" class="required">Order <span class="required">*</span></label>
                <div class="field">
                    <input size="40" maxlength="255" name="Service[order]" id="Service_order" type="text"
                           value="<?= isset($model) ? $model->order : ''; ?>">
                    <div class="errorMessage" id="Service_order_em_" style="display:none"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
		<span class="pull-left">
			<button type="submit" class="btn btn-primary">Save</button>
			&nbsp;
			<a href="/admin/services">Back</a>
		</span>
    </div>
</form>
