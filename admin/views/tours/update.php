
<form class="form uniformForm validateForm" enctype="multipart/form-data" id="Tour-form"
      action="" method="post">
    <input type="hidden" name="<?=\vendor\security\Csrf::$_csrf_token_name?>" value="<?=\vendor\security\Csrf::_creatToken()?>">
    <div class="widget">
        <div class="widget-header">
            <h3>Tour Information</h3>
        </div> <!-- .widget-header -->
        <div class="widget-content nopadding">
            <div class="field-group">

                <label for="Tour_name" class="required">Name <span class="required">*</span></label>
                <div class="field">
                    <input size="40" maxlength="255" name="Tour[name]" id="Tour_name" type="text"
                           value="<?= isset($model) ? $model->name : ''; ?>">
                    <div class="errorMessage" id="Tour_name_em_" style="display:none"></div>
                </div>
                <label for="Tour_password">Description Sort</label>
                <div class="field">
                    <textarea id="tour_description_sort" name="Tour[description_sort]"><?= isset($model) ? $model->description_sort : ''; ?></textarea>
                </div>
                <label for="Tour_password">Description</label>
                <div class="field">
                    <textarea id="tour_description" name="Tour[description]"><?= isset($model) ? $model->description : ''; ?></textarea>
                </div>

                <label for="Tour_status">Status</label>
                <div class="field">
                    <select name="Tour[status]" id="Tour_status">
                        <option value="active" <?= isset($model) && $model->status == 'active' ? 'selected' : ''; ?>>
                            Active
                        </option>
                        <option
                            value="inactive" <?= isset($model) && $model->status == 'inactive' ? 'selected' : ''; ?>>
                            Inactive
                        </option>
                    </select>
                    <div class="errorMessage" id="Tour_status_em_" style="display:none"></div>
                </div>
                <label for="Tour_status">Tour Category</label>
                <div class="field">
                    <select name="Tour[category]" id="Tour_tour_type">
                        <?php \application\models\Tours::optionCats($model->category) ?>
                    </select>
                    <div class="errorMessage" id="Tour_status_em_" style="display:none"></div>
                </div>
                <label for="Tour_status">Tour Departure</label>
                <div class="field">
                    <select name="Tour[departure]" id="Tour_departure">
                        <?php \application\models\Tours::optionDeparture($model->departure) ?>
                    </select>
                    <div class="errorMessage" id="Tour_status_em_" style="display:none"></div>
                </div>
                
                <div class="field" style="width: 100%;">
                    <div style="float: left; width: 25%;">
                        <label style="display: block" for="Tour_email" class="required">Check In <span class="required">*</span></label>
                        <input size="20" maxlength="255" name="Tour[check_in]" id="check_in" type="text"
                               value="<?= isset($model) ? $model->check_in : ''; ?>">
                    </div>
                    <div style="float: left; width: 25%;">
                        <label style="display: block" for="Tour_email" class="required">Check Out <span class="required">*</span></label>
                        <input size="20" maxlength="255" name="Tour[check_out]" id="check_out" type="text"
                               value="<?= isset($model) ? $model->check_out : ''; ?>">
                    </div>

                </div>
                <div class="field" style="width: 100%;">
                    <div style="float: left; width: 25%;">
                        <label style="display: block" for="Tour_email" class="required">Total guest <span class="required">*</span></label>
                        <input size="20" maxlength="255" name="Tour[total_guest]" id="Tour_total_guest" type="text"
                               value="<?= isset($model) ? $model->total_guest : ''; ?>">
                    </div>
                    <div style="float: left; width: 25%;">
                        <label style="display: block" for="Tour_total_book" class="required">Total book <span class="required">*</span></label>
                        <input size="20" maxlength="255" name="Tour[total_book]" id="Tour_total_book" type="text"
                               value="<?= isset($model) ? $model->total_book : '0'; ?>">
                    </div>

                </div>
                <label for="Tour_status">MAP</label>
                <div class="field" style="width: 100%;">
                    <div style="float: left; width: 25%;">
                        <label style="display: block" for="Tour_email" class="required">Long <span class="required">*</span></label>
                        <input size="20" maxlength="255" name="Tour[lng]" id="Tour_lng" type="text"
                               value="<?= isset($model) ? $model->lng : ''; ?>">
                        <label style="display: block" for="Tour_email" class="required">Lat <span class="required">*</span></label>
                        <input size="20" maxlength="255" name="Tour[lat]" id="Tour_lat" type="text"
                               value="<?= isset($model) ? $model->lat : ''; ?>">
                    </div>
                    <div style="float: left; width: 75%;">
                        <div class="wmap">
                            <div id="map-canvas" style="width: 100%; height: 400px;"></div>
                            <input type="text" class="pac-input" id="pac-input" placeholder="Search Location" />
                        </div>

                    </div>

                </div>

                <div class="field" style="width: 100%;">
                    <div style="float: left; width: 25%;">
                        <label for="Tour_email" class="required">Total days <span class="required">*</span></label>
                        <input size="20" maxlength="255" name="Tour[total_days]" id="Tour_total_days" type="text"
                               value="<?= isset($model) ? $model->total_days : ''; ?>">
                    </div>
                    <div style="float: left; width: 25%;">
                        <label for="Tour_email" class="required">Total Nights <span class="required">*</span></label>
                        <input size="20" maxlength="255" name="Tour[total_nights]" id="Tour_total_nights" type="text"
                               value="<?= isset($model) ? $model->total_nights : ''; ?>">
                    </div>

                </div>
                <label for="Tour_price" class="required">Price <span class="required">*</span></label>
                <div class="field">

                    <input size="40" maxlength="255" name="Tour[price]" id="Tour_price" type="text"
                           value="<?= isset($model) ? $model->price : ''; ?>">
                    <div class="errorMessage" id="Tour_name_em_" style="display:none"></div>
                </div>
                <label for="Tour_price" class="required">Services <span class="required">*</span></label>
                <div class="field" style="width: 100%;">
                    <?php
                    if(isset($model) && ($model->services)){
                        $model_ser = explode(',',$model->services);

                    }
                    foreach ($services as $service):?>
                    <div style="float: left; width: 25%;">
                        <input type="checkbox" name="Tour[services][]" <?= isset($model_ser) && in_array($service->id,$model_ser)   ? 'checked' : ''; ?>  class="user-service-chkbox" value="<?=$service->id?>">
                        <?=$service->name?>
                    </div>
                    <?php endforeach;?>
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
                                            <img style="max-width:180px" src="<?=baseUrl()?>/uploads/tours/<?=$_GET['id']?>/<?php echo $gallery; ?>"
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
                <input type="hidden" name="images-order" id="images-order"/>
            </div>
        </div>
    </div>

    <div class="form-actions">
		<span class="pull-left">
			<button type="submit" class="btn btn-primary">Save</button>
			&nbsp;
			<a href="/admin/tour">Back</a>
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
        $('#tour_description').redactor({});
        $('#tour_description_sort').redactor({});
    });
    $(document).ready(function() {
        $(function() {
            $("#check_in").datepicker({
                dateFormat: "dd-mm-yy",
                minDate: -0,
                onClose: function (selectedDate) {
                    var date2 = $('#check_in').datepicker('getDate');
                    date2.setDate(date2.getDate() + 1);
                    $("#check_out").datepicker("option", "minDate", date2);
                }
            });
            $("#check_out").datepicker({
                dateFormat: "dd-mm-yy",

            });
        });
    });

</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAmqIdCkNBZlUHNoJH4GgWdMgTZ4p1Tugw"></script>
<script>
    var map_info='';
    <?php if(isset($model)): ?>
    map_info += '<h4><?=$model->name?></h4>';
    map_info += '<p>Ngày khởi hành: <?=$model->check_in?></p>';
    map_info += '<p>Giá tour: <?=$model->price?> VND</p>';
    <?php endif;?>
    var infowindow;
    var markers = [];
    var defaultContent = ''+map_info;
    var defaultLatLng = new google.maps.LatLng(<?=isset($model)?$model->lat:'21.03139'?>, <?=isset($model)?$model->lng:'105.8525'?>);
    function initialize() {
        var mapOptions = {
            zoom: 12,
            center: defaultLatLng
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        //
        infowindow = new google.maps.InfoWindow({content: defaultContent})
        google.maps.event.addListener(map, 'click', function(e) {
            //infowindow = new google.maps.InfoWindow({content: defaultContent});
            placeMarker(e.latLng, map);
        });
        placeMarker(defaultLatLng, map);
        <?php /*if ((isset($model->latlng)) && $model->latlng) { */?>/*
        placeMarker(defaultLatLng, map);
        */<?php /*} */?>
        var input = (document.getElementById('pac-input'));
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var searchBox = new google.maps.places.SearchBox((input));
        google.maps.event.addListener(searchBox, 'places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }
            for (var i = 0, marker; marker = markers[i]; i++) {
                marker.setMap(null);
            }

            // For each place, get the icon, place name, and location.
            markers = [];
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0, place; place = places[i]; i++) {
                var image = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                var marker = new google.maps.Marker({
                    map: map,
                    icon: image,
                    title: place.name,
                    position: place.geometry.location
                });

                markers.push(marker);

                bounds.extend(place.geometry.location);
            }

            map.fitBounds(bounds);
        });
    }

    function placeMarker(position, map) {
        deleteMarkers();
        var marker = new google.maps.Marker({
            position: position,
            draggable: true,
            map: map
        });
        google.maps.event.addListener(marker, 'dragend', function(e) {
            setPosition(marker.getPosition().toUrlValue());
            //map.panTo(marker.getPosition());
        });
        google.maps.event.addListener(marker, 'click', function(e) {
            infowindow.open(map, marker);
            setTimeout(function() {
                setPosition(marker.getPosition().toUrlValue());
            }, 300);
        });
        markers.push(marker);
        map.panTo(position);
        google.maps.event.trigger(marker, 'click');
    }

    // Sets the map on all markers in the array.
    function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }
    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setAllMap(null);
    }
    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

    function setPosition(position) {
        var arr_position =  position.split(",");
        $('#Tour_lat').val(arr_position[0]);
        $('#Tour_lng').val(arr_position[1]);
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    var formSubmit = true;
    $(document).on("submit", "#maps-form", function() {
        if (!formSubmit)
            return false;
        formSubmit = false;
        var thi = $(this);
        $.ajax({
            'type': 'POST',
            'dataType': 'JSON',
            'url': thi.attr('action'),
            'data': thi.serialize(),
            'beforeSend': function() {
                w3ShowLoading($('#savemap'), 'right', 60, 0);
            },
            'success': function(res) {
                w3HideLoading();
                if (res.code != "200") {
                    if (res.errors) {
                        parseJsonErrors(res.errors);
                    }
                    //
                } else if (res.redirect) {
                    //
                    window.location.href = res.redirect;
                }
                formSubmit = true;
            },
            'error': function() {
                w3HideLoading();
                formSubmit = true;
            }
        });
        return false;
    });
</script>

<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<style>
    .thumb {
        height: 75px;
        border: 1px solid #000;
        margin: 10px 5px 0 0;
    }
    option.level-0 {
        font-size: 16px;
        font-weight: 600;
    }

    option.level-1 {
        font-weight: 500;
        font-size: 14px;
    }
</style>