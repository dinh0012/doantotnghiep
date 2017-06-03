
<form class="form uniformForm validateForm" enctype="multipart/form-data" id="Departures-form"
      action="" method="post">
    <input type="hidden" name="<?=\vendor\security\Csrf::$_csrf_token_name?>" value="<?=\vendor\security\Csrf::_creatToken()?>">

    <div class="widget">
        <div class="widget-header">
            <h3>Departures Information</h3>
        </div> <!-- .widget-header -->
        <div class="widget-content nopadding">
            <div class="field-group">

                <label for="Departures_name" class="required">Name <span class="required">*</span></label>
                <div class="field">
                    <input size="40" maxlength="255" name="Departures[name]" id="Departures_name" type="text"
                           value="<?= isset($model) ? $model->name : ''; ?>">
                    <div class="errorMessage" id="Departures_name_em_" style="display:none"></div>
                </div>
                <label for="Departures_des">Description</label>
                <div class="field">
                    <textarea id="Departures_description" name="Departures[description]"><?= isset($model) ? $model->description : ''; ?></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
		<span class="pull-left">
			<button type="submit" class="btn btn-primary">Save</button>
			&nbsp;
			<a href="/admin/Departuress">Back</a>
		</span>
    </div>
</form>

<script>
    $('.property-image-remove').click(function () {
        $(this).parent('.property-image').parent('.gallery-image').remove();
    });
    $(".property-image").hover(function () {
        $(this).find(".property-image-remove").show()
    });
    $(".property-image").on({
        'mouseenter': function () {
            $(this).find(".property-image-remove").show();
            $(this).find(".property-image-primary").show();
        }, 'mouseleave': function () {
            $(this).find(".property-image-remove").hide();
            $(this).find(".property-image-primary").hide();
        }
    });
    $(document).ready(function () {
        function handleFileSelect(evt) {
            var files = evt.target.files; // FileList object

            // Loop through the FileList and render image files as thumbnails.
            for (var i = 0, f; f = files[i]; i++) {

                // Only process image files.
                if (!f.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();

                // Closure to capture the file information.
                reader.onload = (function(theFile) {
                    return function(e) {
                        // Render thumbnail.
                        var span = document.createElement('span');
                        span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
                        document.getElementById('list').insertBefore(span, null);
                    };
                })(f);
                $(".thumb").click(function () {
                    alert(111);
                });

                reader.readAsDataURL(f);
            }
        }
        document.getElementById('files').addEventListener('change', handleFileSelect, false);
        $('#Departures_description').redactor({});
    });


</script>
<style>
    .thumb {
        height: 75px;
        border: 1px solid #000;
        margin: 10px 5px 0 0;
    }
</style>