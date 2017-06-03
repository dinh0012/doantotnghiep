
<form class="form uniformForm validateForm" enctype="multipart/form-data" id="CategoriesTour-form"
      action="" method="post">
    <input type="hidden" name="<?=\vendor\security\Csrf::$_csrf_token_name?>" value="<?=\vendor\security\Csrf::_creatToken()?>">

    <div class="widget">
        <div class="widget-header">
            <h3>CategoriesTour Information</h3>
        </div> <!-- .widget-header -->
        <div class="widget-content nopadding">
            <div class="field-group">

                <label for="CategoriesTour_name" class="required">Name <span class="required">*</span></label>
                <div class="field">
                    <input size="40" maxlength="255" name="CategoriesTour[name]" id="CategoriesTour_name" type="text"
                           value="<?= isset($model) ? $model->name : ''; ?>">
                    <div class="errorMessage" id="CategoriesTour_name_em_" style="display:none"></div>
                </div>
                <label for="Tour_password">Description Sort</label>
                <div class="field">
                    <textarea id="CategoriesTour_description_sort" name="CategoriesTour[description_sort]"><?= isset($model) ? $model->description_sort : ''; ?></textarea>
                </div>
                <label for="CategoriesTour_des">Description</label>
                <div class="field">
                    <textarea id="CategoriesTour_description" name="CategoriesTour[description]"><?= isset($model) ? $model->description : ''; ?></textarea>
                </div>
                <label for="CategoriesTour_status">Parent</label>
                <div class="field">

                    <select name="CategoriesTour[parent]" id="CategoriesTour_parent">
                        <option value="0" >
                            Select Parent Cat
                        </option>
                        <?php \application\models\CategoriesTour::optionCats(isset($model)?$model:'');?>
                    </select>
                    <div class="errorMessage" id="CategoriesTour_status_em_" style="display:none"></div>
                </div>
                <div class="field" style="width: 100%">
                    <div class="photo-list">
                        <label style="margin-bottom:15px;">Images</label>
                        <ul class="property-image-list" id="sortable">
                            <?php if (isset($model) && ($model->images)) : ?>
                                <?php
                                $galleries = json_decode($model->images);
                                /*echo '<pre>';
                                print_r($galleries);
                                echo '</pre>';*/
                                foreach ($galleries as $gallery) : ?>
                                    <li class="gallery-image" class="ui-state-default">
                                        <div class="property-image">
                                            <a href="javascript:void(0);" class="property-image-remove"
                                               rel="<?php echo $gallery; ?>">
                                                <img
                                                    src="<?php echo baseUrlAmin() . '/asset/images/icons/remove_icon.png'; ?>"
                                                    title="Remove">
                                            </a>
                                            <img style="max-width:180px" src="<?=baseUrl()?>/uploads/CategoriesTour/<?=$_GET['id']?>/<?php echo $gallery; ?>"
                                                 alt="photo"/>
                                        </div>

                                    </li>
                                    <?php
                                endforeach?>
                                <input type="hidden" name="images" value="<?=implode(',',$galleries)?>" >
                                <?php
                            endif;
                            ?>
                        </ul>
                    </div>
                    <div style="clear:both"></div>
                    <input type="file" id="files" name="files[]" multiple />
                    <output id="list"></output>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
		<span class="pull-left">
			<button type="submit" class="btn btn-primary">Save</button>
			&nbsp;
			<a href="/admin/categoriesTours">Back</a>
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
        $('#CategoriesTour_description').redactor({});
        $('#CategoriesTour_description_sort').redactor({});
    });

</script>
<style>
    option.level-0 {
        font-size: 16px;
        font-weight: 600;
    }

    option.level-1 {
        font-weight: 500;
        font-size: 14px;
    }
    .thumb {
        height: 75px;
        border: 1px solid #000;
        margin: 10px 5px 0 0;
    }
</style>