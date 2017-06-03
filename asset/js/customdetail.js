/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor
 * @version 1.1
 * @Returm custom html page detail 
 */
var operator = localStorage.Operator;

$(document).ready(function () {
    
    checkData(operator);
    $(document).on('click touchstart','td.name .Description, td.name .more-be', function(e) {
    	
        e.preventDefault();
        var data = JSON.parse(localStorage["list_" + operator]);
        var elm = $(this).parents('td.name');
        if ( elm.attr("running") == 'true' || data == undefined || data == '' )
        {
            return false;
        }
        elm.attr("running", "true");
        var item = elm.parents("tr");
        var listItem= elm.parents("tbody").find("tr");
        var index = listItem.index(item);
        if (item.find(".more-be").length > 0 )
        {
            var elmObj = elm.data("toggleDesc");
            $.when(elmObj.toggle()).then(function () {
                elm.attr("running", "false");
              
            });
            return false;
        }
        $.when(loadData(operator, elm, index)).then(function (){
           var elmObj = elm.data("toggleDesc");
            $.when(elmObj.toggle()).then(function () {
                elm.attr("running", "false");          
            });
        });
    });
    
});



function loadData(operator, elm, index)
{   
    return $.ajax({
        dataType: "json",
        url: "//sjp.impartmedia.com/be/getAccomRoomsDetails?callback=?",
        data: {
            q: 212,
            operators:operator,
            product:'accom',
            InclAvailability:false,
            enforceBookingConditions:false,
            enforceEntirePeriod:false
        },
        success: function(r) {
            if(r.length != 0)
            {
                return _render(r[0],elm,index);
            }
        },
        error : function () {
            return false;
        }
    });
}

/**
 * Check Data
 * @param Integer operator
 */
function checkData(operator)
{    
    var data = localStorage["list_" + operator];
    if ( data != undefined && data != '' )
    {
        return JSON.parse(data);
    }
    return $.ajax({
        dataType: "json",
        url: "//sjp.impartmedia.com/be/getAccomRatesGrid?callback=?",
        data: {
            q: 212,
            operators:operator,
            product:'accom',
            InclAvailability:false,
            enforceBookingConditions:false,
            enforceEntirePeriod:false
        },
        success: function(r) {
            if ( r.length == 0)
            {
                return false;
            }
            var data= new Array();
           
            var item= r[0].Items;
            for(var i=0; i< item.length; i++)
            {
                data.push(item[i].Id);
            }
            localStorage["list_" + operator] = JSON.stringify(data);
            return data;
        },
        error : function () {
           return checkData(operator);
        }
    });
}


function hideJS()
{
     $('p.text-center img').show();
     $('#itemGadget').addClass('hide');
}

/**
 * Render data
 * @param Object r
 * @param Object elm
 * @param integer index
 */
function _render(r, elm, index)
{
   var r_sort = checkData(operator);
   //console.info(r_sort);
   
   var r_id = r_sort[index];
   var n = null;
   for(var i=0; i< (r.Rooms).length; i++)
   {
       if(r_id==r.Rooms[i].RoomID)
       {
           n =r.Rooms[i];
       }
   }
   var html = $('<div class="more-be" style="display:none" />');
   if(n!=null)
   {
       html.append('<p>'+n.Description+'</p>');
       if( n.Facilities.toString() != '' )
       {
           html.append('<b>Facilities</b><br/><p>'+n.Facilities.toString()+'</p>');
       }
   }
   elm.find($('.Description')).after(html);
   elm.toggleDesc();
   return elm;
}

$.fn.toggleDesc = function()
{
    var elm = $(this);
    var obj = {
        show : function () {
            return $.when(elm.find(".Description").slideDown(200)).then(function () {
                return elm.find(".more-be").slideUp(200);
            });
        },
        hide : function () {
            return $.when(elm.find(".more-be").slideDown(200)).then(function () {
               return elm.find(".Description").slideUp(200); 
            });
        },
        toggle  : function () {
            if ( elm.find(".Description").css("display") == 'none' )
            {
                return $.when(this.show()).then(function () {
                    return true;
                });
            } else {
                return $.when(this.hide()).then(function () {
                    return true;
                });
            }
        }
    };
    elm.data("toggleDesc", obj);
}

$(window).load(function(){
       $('p.text-center img').hide();
       $('#itemGadget').removeClass('hide');
      
 }
)
