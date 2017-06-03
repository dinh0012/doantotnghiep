//select2
    var query = {};
    function formatState (item, term)
    {
        var text = item.text;
        var match = text.toUpperCase().indexOf(term.toUpperCase());
        if(item.element && item.element.attributes.level) {
            if(term.length == 0 && item.element.attributes.level.nodeValue >= 3){
                return null;
            } else {
                if (match < 0) {
                    return $('<div class="select2-result-label first subregion level'+item.element.attributes.level.nodeValue+'"><div class="searchRegionImage"></div>' + text + '</div>');
                }
                 var $result = $('<div class="select2-result-label subregion level'+item.element.attributes.level.nodeValue+'"><div class="searchRegionImage"></div>' + text.substring(0, match) + '</div>');

                var $match = $('<span class="select2-rendered__match"></span>');
                $match.text(text.substring(match, match + term.length));
                $result.append($match);
                $result.append(text.substring(match + term.length));
                return $result;
            }
        }
        return null;
    }

    $(".js-search").select2({
        multiple:true,
        templateResult: function (item) {
            var term = query.term || '';
            var $result = formatState(item, term);
            return $result;
        },
        language: {
            searching: function (params) {
                query = params;
                return 'Searching...';
            }
        }
    }).on("change", function(e){
        $('.select2-selection__rendered').addClass('noIcon');
        var list = $(this).val();
        var chklevel = $(".js-states");
        var getlevel = chklevel.find("option[value='"+list+"']");
        var kqlevel = getlevel.attr("level");
        $('input.select2-search__field').remove();
        //code redirect to url search page
        if(kqlevel != 4)
        {
            var url = '/search?&search-form[locations]='+list[list.length - 1];
            setTimeout(function() {
                window.location.href= url;
            },500);

        }else{
            var url = '/retreat/'+list[list.length - 1];
            setTimeout(function() {
                window.location.href= url;
            },500);
        }
    });
    var $states = $(".js-source-states");
    var statesOptions = $states.html();
    $states.remove();
    $(".js-states").append(statesOptions);
    $(document).on('click touchmove','.search-link', function()
    {
        $('#search2').toggle();
        if(!$('#search2').is(':visible'))
        {
            $('.search-link').removeClass('icon-blue');
            $('body > .select2-container--default').hide();
            $('.select2-selection__rendered').addClass('noIcon');
            if($(window).width() < 640)
            {
                if(!$('.select2-container--open').is(':visible') || !$('#search2').is(':visible'))
                {
                        $('body').removeClass('no-scroll');
                }
                else
                {
                        $('body').addClass('no-scroll');
                }
            }

        }
        else
        {
            $('.select2-selection__rendered').removeClass('noIcon');
            $('.search-link').addClass('icon-blue');

            if($('#select2-label-search').length)
            {
                $('#select2-label-search').show();
            }
            else
            {
               // $('input.select2-search__field').parent().append('<span id="select2-label-search">Enter Country, Region or Property</span>');

            }
        }
        var check = $('.select2-selection__choice');
        if( check.length )
        {
            $('.select2-selection__rendered').addClass('noIcon');
        }
        return false;
    });

    $(document).on('click','body .select2-results__options li', function(){

    });

    $(document).on('click', '.select2', function(){
        var h1 = $("#search3");
        if($(window).width() > 768){
            var h1 = $("#search3");
            var h1top = h1.offset().top   - 13 ;
            $('.select2-dropdown').css({'margin-top':+h1top+'px'});
        }
    });
    $(document).on('click touchmove', 'body',function(e)
    {
        if($(window).width() <= 640) {
            if(!$('.select2-container--open').is(':visible') || !$('#search2').is(':visible')) {
                $('body').removeClass('no-scroll');
            } else {
                $('body').addClass('no-scroll');
            }
        }
        if ($(e.target).hasClass('select2-search__field') || $(e.target).hasClass('search-link') ||
            $(e.target).hasClass('select2-no-result') || !$('input.select2-search__field').length) {
            return false;
        }
        var $search = $('#search2');
        if(!$search.is(':visible')) {
            $('.search-link').removeClass('icon-blue');
            $('.select2-selection__rendered').removeClass('noIcon');
            $search.hide();
        } else {
            $('.search-link').addClass('icon-blue');
            if (!$search.find('.select2-container--open').length) {
                $search.hide();
                $('.search-link').removeClass('icon-blue');
            }
        }
    });
    /**
    * Event forcus for field search
    */
    $('input.select2-search__field').focus(function(e)
    {
        e.preventDefault();
        if(!$('#search2').is(':visible')) {
            $('.search-link').removeClass('icon-blue');
        } else {
            $('.search-link').addClass('icon-blue');
        }
        if($(window).width() <= 639) {
            if(!$('.select2-container--open').is(':visible') || !$('#search2').is(':visible')) {
                $('body').removeClass('no-scroll');
            } else {
                $('body').addClass('no-scroll');
            }
        }
        $('.select2-result-hide').remove();
        $('body > .select2-container--default').show();
        $('.select2-selection__rendered').addClass('noIcon');
       // $('#select2-label-search').hide();
        // calculate height for result search
        if($(window).width() <= 639) {
            var height = $(window).height() - $('#header').height() - $('.select2-search').height();
            $('ul.select2-results__options').css({'display':'block','height':'100vh','height':'78%','overflow':'auto','maxHeight':'none'});
        }
    })
    $('input.select2-search__field').on('keyup keypress keydown', function() {
        $('.select2-result-hide').remove();
    });
// End Select Search
// Set Position for search form
function searchPosition() {

   if($(window).width() <= 479){
       $('#search2').css('left', $('.search-link').offset().left - $('#search2').width() + 55);
   }
    if($(window).width() < 640 )
    {
        var $search2 = $('#search2');
        var width = $search2.width();
        if(!$('#search2').is(':visible')){
            $search2.show();
            var width = $search2.width();
            var left =((width - 230) / 2) - 25;
            $search2.hide();
        }
        var left =((width - 230) / 2) - 25;
        $('.select2-selection__rendered').css('backgroundPosition', left + 'px 10px');
        var height = $(window).height() - $('#header').height() - $('.select2-search').height();
        $('ul.select2-results__options').css({'display':'block','height':'100vh','height':'78%','overflow':'auto','maxHeight':'none'});
    }
    else
    {
        $('.select2-selection__rendered').removeAttr('style');
        $('ul.select2-results__options').removeAttr('style');
    }
    return false;
}
$(document).ready(function(){
    $(document).on('keyup','.select2-search__field', function(){
        $('#select2-label-search').hide();
    });
    $('body .select2-results__options li').on('click', function(){
        alert(1);
        $('#select2-label-search').hide();
    });
    $('input.select2-search__field').attr('placeholder', 'Search by country, region or property');
    $('input.select2-search__field').attr('autocomplete','off');
    //$('input.select2-search__field').parent().append('<span id="select2-label-search">Where would you like to go?</span>');
	if(navigator.userAgent.match(/iPad/i) != null){

		var iOSKeyboardFix = {
		  targetElem: $('#header'),
		  init: (function(){
			$("input, textarea").on("focus", function() {
			  iOSKeyboardFix.bind();
			});
		  })(),

		  bind: function(){
				$(document).on('scroll', iOSKeyboardFix.react);
					 iOSKeyboardFix.react();
		  },

		  react: function(){

				  var offsetX  = iOSKeyboardFix.targetElem.offset().top;
				  var scrollX = $(window).scrollTop();
				  var changeX = offsetX - scrollX;

				  iOSKeyboardFix.targetElem.css({'position': 'fixed', 'top' : '-'+changeX+'px'});

				  $('input, textarea').on('blur', iOSKeyboardFix.undo);

				  $(document).on('touchstart', iOSKeyboardFix.undo);
		  },

		  undo: function(){

			  iOSKeyboardFix.targetElem.removeAttr('style');
			  document.activeElement.blur();
			  $(document).off('scroll',iOSKeyboardFix.react);
			  $(document).off('touchstart', iOSKeyboardFix.undo);
			  $('input, textarea').off('blur', iOSKeyboardFix.undo);
		  }
		};
	};
});
$(window).load(function() {
      searchPosition();
      /iP/i.test(navigator.userAgent) && $('*').css('cursor', 'pointer');
})
$(window).resize(function(){
      searchPosition();
});
window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload()
    }
};
$(window).scroll(function(){
    if($(window).width() > 1024){
        $('#search2').hide();
        $('.search-link').removeClass('icon-blue');
        $('input.select2-search__field').blur();
        $('body > .select2-container--default').hide();
        $('.select2-selection__rendered').removeClass('noIcon');
    }
});