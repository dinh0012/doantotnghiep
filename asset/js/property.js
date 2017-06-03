$(document).ready(function() {
    // getbookOnline();
    displayProperties();

});

function getPhotoUrl(url)
{
    var file = url.split('/');
    return file[0] + '/' + file[1] + '/' + file[2];
}

/**
 *
 * @param length
 * @returns {Array}
 */
function randomPs(length)
{
    length = length || 10;
    var result = [];
    while(result.length < length)
    {
        var rand = Math.floor(Math.random() * length );
        console.info(rand);
        if ( result.indexOf(rand) == -1 && rand < length )
        {
            result.push(rand);
        }
    }
    return result;
}

var sort_by = function(field, reverse, primer){

    var key = primer ?
        function(x) {return primer(x[field])} :
        function(x) {return x[field]};

    reverse = !reverse ? 1 : -1;

    return function (a, b) {
        return a = key(a), b = key(b), reverse * ((a < b) - (b < a));
    }
}


/**
 * Show property when search
 */
function displayProperties(){

    if(typeof sessionStorage.searchResult === "undefined"){
        //sessionStorage.searchResult = JSON.stringify(propertiesJSON);
    }
    //propertiesJSON.sort(sort_by('booking_option', true, parseInt));
    var html = '';
    var len = propertiesJSON.length;

    for(var i = 0; i < len; i++){
        // alert(i);
        var data = propertiesJSON[i];

        // console.log(data.country.name);ss
        if(data.gallery && data.gallery.length > 5){
            var galleriesLen = 5;
        }else if(data.gallery && data.gallery.length <= 5){
            var galleriesLen = data.gallery.length;
        }else{
            var galleriesLen = 0;
        }
        if(data.gallery){
            (data.gallery).sort(function(a,b){
                return b.main - a.main || a.order - b.order || a.id - b.id;
            });
        }
        var even = ((i % 2) == 0) ? 'even-item' : '';
        var propLocation = (data.town_or_suburb) ? data.town_or_suburb + ', ' : 'town_or_suburb';
        if(data.region)
            propLocation +=	(data.region) ? data.region.name +', ' : '';
        propLocation +=	(data.state) ? data.state.name + ', ' : '';
        propLocation +=	(data.country) ? data.country.name : '';
        // propLocation +=	(data.distance) ? data.distance : 'distance';
        var featured = (data.feature_end_day !== null && (new Date(data.feature_end_day).getTime() > new Date().getTime())) ? '<span class="featured">featured</span>' : '';
        var cost = '';
        if(data.min_cost) {
            cost += '<div class="cost">';
            cost +='<span class="cost-per-night">AVERAGE RATE PER NIGHT</span>';
            cost += '<span class="price">';

                if (data.country_id == 1) {
                    cost += 'AU$';
                }
                else if (data.country_id == 3) {
                    cost += 'NZ$';
                }
                if(data.max_cost == null){
                    cost +=numberWithCommas(data.min_cost);
                }else {
                    cost += numberWithCommas(data.min_cost) + ' - $' + numberWithCommas(data.max_cost);
                }

            //data.currency+'$'+

            //cost += '</span> per night</p>';
            cost +='</div>';
        }
        html += '<div class="box-item-vrt product-id-'+data.idbe+'"" data-idbe="'+data.idbe+'"> ';
        html += '<div class="container">';
        html +=	'<div class="item-vrt">';
        html +=	'<div class="row">';
        html +=	'<div class="col-sm-6">';
        html +=	'<div class="slide-vrt item">';

        for(var j = 0; j < galleriesLen; j++){
            var $img='<img  '+'src'+'="/'+getPhotoUrl(data.gallery[j].file) +'" alt="" style="width:632px ; height:455px" />';
            html +=	'<figure>';
            html +=	$img;
            html +=	'</figure>';

        }

        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-6">';
        html += '<div class="descrip-vrt">';

        html += '<h2 class="title">';
        html += '<a href="/retreat/'+data.property_url.url +'" target="_blank" title="" >'+ data.name +'</a>';
        if( hasLiked(data.id) ){
            html += '<button type="" value="'+data.id+'" class="btn-wish btn-like like"></button>';
        } else {
            html += '<button type="" value="'+data.id+'" class="btn-wish btn-like"></button>';}
        html += '</h2>';

        //+ data.street_address +', '
        html += '<button rel="'+data.id+'"  title="" class="blue link-location"> <span class="ion ion-ios-location-outline"></span> <span class="map-link">'+propLocation +'</span>';
        html += '</button>';
        html += '<div class="detail">';
        //html += '<h3>' +data.name+'</h3>';
        html += '<p>'+ data.key_features.substr(0, 150) +'</p>';
        html += '</div>';

        html += '<ul class="icon-property">';
        //html += '<h3>' +data.name+'</h3>';
        html += '<li class="type-property">';
        html += '<span class="icon"></span>'
        html +=  '<span>'+data.accommodation.name+'</span>';
        html += '</li>';
        html += '<li class="max-guests">';
        html += '<span class="icon">'+data.standard_adults+'</span>'
        html +=  '<span>Maximum guests</span>';
        html += '</li>';
        html += '<li class="min-nights">';
        if(!data.min_nights){
            html += '<span class="icon"> </span>';
        }
        else {
            html += '<span class="icon">'+data.min_nights+'</span>';
        }
        html +=  '<span>Minimum nights</span>';
        html += '</li>';
        html += '<li class="type-book">';
        if(data.booking_option == 0)
        {
            html +=  '<span class="icon instant-icon">INSTANT</span>';
        }else {
            html +=  '<span class="icon">24hr</span>';
        }
        html +=  '<span instant-icon>Booking confirmation</span>';
        html += '</li>';
        html += '</ul>';

        //html += '<div class="group">';

        /*if(data.booking_option == 0)
         {
         html += '<p class="instant online"> Instant book </p>';
         }
         html += '</div>';*/
        html += '<div class="group">';
        html += cost;
        /*if( hasLiked(data.id) ){
         html += '<button type="" value="'+data.id+'" class="btn-wish btn-2 btn-like like">Wishlist</button>';
         } else {
         html += '<button type="" value="'+data.id+'" class="btn-wish btn-2 btn-like">Wishlist</button>';
         }*/
        html += '<div class="view"><a href="/retreat/'+data.property_url.url+ '" title="" target="_blank"  class="btn-blue btn-2 ">View</a></div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

    }
    $("#wrap-wish").html(html);
    $("h2.title").each(function () {
        if(($(this).height()==90 && $(this).children('a').height()==41) ||
            ($(this).height()==82 && $(this).children('a').height()==37) ||
            ($(this).height()==74 && $(this).children('a').height()==33)||
            ($(this).height()==64 && $(this).children('a').height()==27)
        ){
           $(this).css("width","120%");
       }
           });
    loadOwlCarouselSearch();

    // set price from BE to HTML
    // getPrices();

}

function getPrices()
{
    var list = $("#wrap-wish .box-item-vrt");
    var ids	= [];
    $.each(list, function () {
        ids[ids.length] = $(this).data("idbe");
    });
    var params = ids;
    $.ajax({
        url: '/search/ajaxprices?ids='+params,
        type: 'post',
        dataType: 'json',
        success: function(data)  {
            $.each(data, function (objId, price) {
                var elm = $('.product-id-'+objId+'');
                var  _price= elm.find('span.price');
                if(_price!=null)
                {
                    _price.text('AU $'+price+'');
                }
                else
                {
                    _price.text('AU $0');
                }
            });
        }
    });
    $('p.price-bx').removeClass('hide');

}

//backup
function getPricesBK()
{
    var list = $("#wrap-wish .box-item-vrt");
    var ids	= [];
    $.each(list, function () {
        ids[ids.length] = $(this).data("idbe");
    });
    var params = ids;
    $.ajax({
        url: '/search/ajaxprices?ids='+params,
        type: 'post',
        dataType: 'json',
        success: function(data)  {
            $.each(data, function (objId, price) {
                var elm = $("#wrap-wish > [data-idbe='"+objId+"']");
                elm.find(".price").text('AUD $a'+price+'');
            });
        }
    });


}

function loadOwlCarouselSearch(){
    if(typeof($.fn.owlCarousel) != 'undefined'){
        $(".owl-slider").owlCarousel({
            navigation : true, // Show next and prev buttons
            slideSpeed : 100,
            paginationSpeed : 100,
            singleItem:true,
            navigationText: [
                "<i class='ion-ios-arrow-back'></i>",
                "<i class='ion-ios-arrow-forward'></i>"
            ],
            pagination: false,
            addClassActive : true
        });
    }else{
        setTimeout(loadOwlCarouselSearch, 100);
    }

}
function updatePropertyList(updateData)
{
    updateData.sort(sort_by('booking_option', true, parseInt));
    var html = '';
    var len = updateData.length;
    $.each(updateData, function (i, data) {
        if(data.gallery && data.gallery.length > 5){
            var galleriesLen = 5;
        }else if(data.gallery && data.gallery.length <= 5){
            var galleriesLen = data.gallery.length;
        }else{
            var galleriesLen = 0;
        }
        if(data.gallery){
            (data.gallery).sort(function(a,b){
                return b.main - a.main || a.order - b.order || a.id - b.id;
            });
        }
        var even = ((i % 2) == 0) ? 'even-item' : '';
        var propLocation = (data.town_or_suburb) ? data.town_or_suburb + ', ' : 'town_or_suburb';
        propLocation +=	(data.region) ? data.region.name +', ' : '';
        propLocation +=	(data.state) ? data.state.name + ', ' : '';
        propLocation +=	(data.country) ? data.country.name: '';
        // propLocation +=	(data.distance) ? data.distance : 'distance';
        var featured = (data.feature_end_day !== null && (new Date(data.feature_end_day).getTime() > new Date().getTime())) ? '<span class="featured">featured</span>' : '';
        var cost = '';
        if(data.min_cost) {
            cost += '<div class="cost">';
            cost +='<span class="cost-per-night">AVERAGE RATE PER NIGHT</span>';
            cost += '<span class="price">';

                if (data.country_id == 1) {
                    cost += 'AU$';
                }
                else if (data.country_id == 3) {
                    cost += 'NZ$';
                }
                if(data.max_cost == null){
                    cost +=numberWithCommas(data.min_cost);
                }else {
                    cost += numberWithCommas(data.min_cost) + ' - $' + numberWithCommas(data.max_cost);
                }

            //data.currency+'$'+

            //cost += '</span> per night</p>';
            cost +='</div>';
        }
        html += '<div class="box-item-vrt product-id-'+data.idbe+'" data-idbe="'+data.idbe+'">';
        html += '<div class="container">';
        html +=	'<div class="item-vrt">';
        html +=	'<div class="row">';
        html +=	'<div class="col-sm-6">';
        html +=	'<div class="slide-vrt slide-vrt-' + page +'" data-id='+ data.id +'">';
        for(var j = 0; j < galleriesLen; j++){
            var $img='<img '+'s'+'r'+'c'+'="/'+getPhotoUrl(data.gallery[j].file) +'" alt="" style="width:632px; height: 455px" />';
            html +=	'<figure>';
            html +=	$img;
            html +=	'</figure>';

        }

        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-6">';
        html += '<div class="descrip-vrt">';

        html += '<h2 class="title">';
        html += '<a href="/retreat/'+data.property_url.url +'" title="" target="_blank" >'+ data.name +'</a>';
        if( hasLiked(data.id) ){
            html += '<button type="" value="'+data.id+'" class="btn-wish btn-like like"></button>';
        } else {
            html += '<button type="" value="'+data.id+'" class="btn-wish btn-like"></button>';}
        html += '</h2>';

        //+ data.street_address +', '
        html += '<button rel="'+data.id+'"  title="" class="blue link-location"> <span class="ion ion-ios-location-outline"></span> <span class="map-link">'+propLocation +'</span>';
        html += '</button>';
        html += '<div class="detail">';
        //html += '<h3>' +data.name+'</h3>';
        html += '<p>'+ data.key_features.substr(0, 150) +'</p>';
        html += '</div>';

        html += '<ul class="icon-property">';
        //html += '<h3>' +data.name+'</h3>';
        html += '<li class="type-property">';
        html += '<span class="icon"></span>'
        html +=  '<span>'+data.accommodation.name+'</span>';
        html += '</li>';
        html += '<li class="max-guests">';
        html += '<span class="icon">'+data.standard_adults+'</span>'
        html +=  '<span>Maximum guests</span>';
        html += '</li>';
        html += '<li class="min-nights">';
        if(!data.min_nights){
            html += '<span class="icon"> </span>';
        }
        else {
            html += '<span class="icon">'+data.min_nights+'</span>';
        }

        html +=  '<span>Minimum nights</span>';
        html += '</li>';
        html += '<li class="type-book">';
        if(data.booking_option == 0)
        {
            html +=  '<span class="icon instant-icon">INSTANT</span>';
        }else {
            html +=  '<span class="icon">24hr</span>';
        }
        html +=  '<span instant-icon>Booking confirmation</span>';
        html += '</li>';
        html += '</ul>';
        html += '<div class="group">';
        html += cost;
        /*if( hasLiked(data.id) ){
         html += '<button type="" value="'+data.id+'" class="btn-wish btn-2 btn-like like">Wishlist</button>';
         } else {
         html += '<button type="" value="'+data.id+'" class="btn-wish btn-2 btn-like">Wishlist</button>';
         }*/
        html += '<div class="view"><a href="/retreat/'+data.property_url.url+ '" title="" target="_blank"  class="btn-blue btn-2 ">View</a></div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
    });
    $("div#wrap-wish").append($(html));
    $(html).fadeIn();
    marginLeft();
    $(".descrip-vrt h2.title").each(function () {
        if(($(this).height()==90 && $(this).children('a').height()==41) ||
            ($(this).height()==82 && $(this).children('a').height()==37) ||
            ($(this).height()==74 && $(this).children('a').height()==33)||
            ($(this).height()==64 && $(this).children('a').height()==27)
        ){
            $(this).css("width","120%");
        }
    });

    // getPrices();
//loadOwlCarouselSearch();
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",").replace('.00','');
}
function hasLiked(id)
{
    if( wishlist_stored.indexOf(parseInt(id)) != -1 )
    {
        return true;
    }
    return false;
}
function hasLikedBookonLine(id)
{

    var online =getSession();
    if(online!=null)
    {
        if(online.indexOf(parseInt(id)) != -1 )
        {
            return true;

        }
        return false;
    }
    getbookOnline();

}
function getSession()
{
    var session=null;
    if(localStorage.Online)
    {
        var session = JSON.parse(localStorage.Online);
    }
    return session;
}
function getbookOnline()
{

    $.ajax({
        dataType: "json",
        url: "//sjp.impartmedia.com/be/getOperatorsDetailsShort?callback=?",
        data: {
            q: 212
        },
        success: function(r) {

            if(r!=null)
            {
                var online=[];
                if(r!=null)
                {
                    for(i=0;i<r.length;i++)
                    {
                        if(r[i].IsGoldMedalToday==true)
                        {
                            online.push(r[i].OperatorID);
                        }
                    }
                }
                localStorage.Online=JSON.stringify(online);

            }

        },
        error : function () {
            getbookOnline();
        }
    });
}

    
    
   
    


