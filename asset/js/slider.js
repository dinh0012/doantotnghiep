$(document).ready(function(){
    //slide product
   
  sliderHomePage();
  loadSL();
  //showSliderDetail(); 
});

$(document).on("click", '.addToCart', function () {
	if ( $(window).width() < 420 )
    {
    	$('.checkout-icon').css('display', 'none');
    }
});

$(document).on('click', '.btn-like', function(e) {
	e.preventDefault();
	var elm = $(this);
	if ( elm.attr("ajax") == "true" )
	{
		return false;
	}
	elm.attr("ajax", "true");
    $(this).toggleClass('like');
    var property_id= $(this).val();
   
    $.ajax({
        url: '/site/wishlist',
        type: 'GET',
        data: {
            'property_id': property_id
        },
        dataType: 'json',
        success: function(data) {
            if(data.status)
            {
                $('li span.btn-heart').removeClass('hide');
                $('li.wishlis-li').removeClass('hide');
                $('li span.btn-heart').addClass('like');
                $('.profile').addClass('hide');
                loadIcon();
                $('li.sub-nav').addClass('fav');
            }
            else
            {
                $('li.sub-nav').removeClass('fav');
                $('li span.btn-heart').addClass('hide');
                $('li span.btn-heart').removeClass('like');
                $('li.wishlis-li').addClass('hide');
                $('.profile').removeClass('hide');
                $('.checkout-icon').css('display', 'none');
            }
            elm.attr("ajax", "false");
        },
        error: function() {
        	elm.attr("ajax", "false");     
        }
    }); 
});


function loadSL()
{
    $('.wrap-slider-top').removeClass('hide');
    $('.slide-featured').removeClass('hide');
    slider();
}
function slider()
{
    var owlslider = $(".slide-featured");

    owlslider.on('initialize.owl.carousel initialized.owl.carousel ' +
                 'initialize.owl.carousel initialize.owl.carousel', function(e) {
            // Set height for img slider in earch page
        if(!!navigator.userAgent.match(' Safari/') && !!navigator.userAgent.match(' Version/6.2')) {
            $(".slide-vrt").each(function(){
                $(this).find('.owl-item').first().css('margin-right','-1px');
            })
        }
    });
    owlslider.owlCarousel({
        items : 3,
        loop:true, 
        nav:true, 
        dots:false,
        lazyLoad:true,
        responsiveClass:true, 
        navText: [
        "<i class='ion-ios-arrow-back'></i>",
        "<i class='ion-ios-arrow-forward'></i>"
        ],
        responsive:{
            0:{
                items:1
            },

            678:{
                items:2
            },

            960:{
                items:2
            },

            1024:{
                items:3
            }
        }
    });
    $('.container h2.head-1').removeClass('hide');
}

var slider;
function showSliderDetail()
{
    $('.detail-property ').removeClass('hide');

        var owl = $('.slide-property');
        if(!owl.hasClass('hide'))
        {
            owl.on('refresh.owl.carousel refreshed.owl.carousel' + 'changed.owl.carousel' , function(e) {
                var figHeight = $(this).find("figure").width()*5/7;
                $(this).find("figure").css({
                    'height':figHeight ,
                    'overflow': 'hidden'
                });
                $(this).find('img').each (function (){
                    var scale = $(this).height()/$(this).width();
                    if (scale > (5/7)) {
                        $(this).css({
                            'height':'auto',
                            'width': '100%'
                        });
                    } else {
                        $(this).css({
                            'height':'100%',
                            'width': 'auto'
                        });
                    }
                });   
            });

            $(".slide-property").owlCarousel({
                items : 3,
                startPosition	: 0,
                loop:true, 
                nav:true, 
                dots:false,
                responsiveClass:true,
                navText: [
                    "<i class='ion-ios-arrow-back'></i>",
                    "<i class='ion-ios-arrow-forward'></i>"
                ],
                responsive: {
                    0:{
                        items:1,
                        startPosition	: 0
                    },
                    678:{
                        items:2,
                        startPosition	: 0
                    },

                    960:{
                        items:2,
                        startPosition	: 0
                    },

                    1024:{
                        items:3,
                        startPosition	: 0
                    }
                },
                start : 1,
                onInitialized	: function (event)
                {
                	slider = this;
                	if ( slider.viewport() >= 678 )
            		{
                		slider.prev();
            		}
                }
            });

        }
    
}
function sliderHomePage()
{
     var slideVrt = $('.slide-vrt').owlCarousel({
        items : 1,
        loop:true, 
        nav:true,
        dots:false,
        lazyLoad:true,
        responsiveClass:true, 
        navText: [
        "<i class='ion-ios-arrow-back'></i>",
        "<i class='ion-ios-arrow-forward'></i>"
        ]
    });    
    $('#wrap-top').removeClass('hide');
    
}

function loadIcon() {
     var check = $('.btn-heart').hasClass('like');
     if( $('.checkout').length > 0 || check == true)
     {
         var length =  $(window).width();
         if(length < 450 ) {
            $('.checkout-icon').css('display', 'none');
         }
         
     }else {
         $('.checkout-icon').css('display', 'none');
     }
     
}
