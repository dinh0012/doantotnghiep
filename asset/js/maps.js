 $(document).on('click', '.link-location', function(e) {
            e.preventDefault();
            var id = $(this).attr("rel");
            var val = parseInt(id);
            $('#show-gmap .hidden-id').html(val);
            $('#show-gmap').modal('show');
            $.ajax({
                url: '/tours/getmap',
                type: 'get',
                data: {
                    tour_id: $.trim($('#show-gmap .hidden-id').html())
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data.status == 'Success') {
                        $('#map').html('Loading map...Please wait');
                        $('#title-map').html(data.name);
                        //$('#country-title').html(data.country_title);
                        // Create a new Geocoder
                        var geocoder = new google.maps.Geocoder();

                        // Locate the address using the Geocoder.
                        geocoder.geocode( { location: new google.maps.LatLng(data.lat,data.lng) }, function(results, status) {
                            // If the Geocoding was successful
                            if (status == google.maps.GeocoderStatus.OK) {
                                // Create a Google Map at the latitude/longitude returned by the Geocoder.
                                var myOptions = {
                                    zoom: 13,
                                    center: results[0].geometry.location,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };
                                var map = new google.maps.Map(document.getElementById("map"), myOptions);

                                // Add a marker at the address.
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: results[0].geometry.location,
                                    /*icon: "http://www.viewretreats.com//themes/frontend/img/villa.png"*/
                                });

                                var infoWindow = new google.maps.InfoWindow();

                                google.maps.event.addListener(marker, 'click', function () {
                                    var markerContent = data.address;
                                    infoWindow.setContent(markerContent);
                                    infoWindow.open(map, marker);
                                });

                            } else {
                                try {
                                    console.error("Geocode was not successful for the following reason: " + status);
                                } catch(e) {}
                            }
                        });
                    }
                }
            });
});