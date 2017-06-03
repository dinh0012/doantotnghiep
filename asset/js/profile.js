/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * js render html
 * @version 1.0.0
 */
var n={};
$(document).ready(function(){
   
    
    getPrice(operatorID);
    $('.success').hide();
  
    $(document).on('change','#slt-children',function(){
        getSearchPrice(operatorID)
    }
);
            
    $(document).on('change','#slt-adults', function(){
        getSearchPrice(operatorID)
    }
     
);
    $(document).on('change','#slt-infants',function(){
        getSearchPrice(operatorID)
    }
);
    $(document).on('change','#slt-nights',function(){
        getSearchPrice(operatorID)
    }
);
    $(document).on('click','.btn-book-now',function(){
        getSessionCart();
    });
    
}
);
$('#slt-date').datepicker("option", "onSelect", function(dateText, inst){
    getSearchPrice(operatorID);
});             
/**
 *@parama int
 *@return function event
 **/    
function setQuantity(number)
{
      
    $(document).on('change','.spf-'+number+'',function (){ 
        
        var quantity=$('.spf-'+number+'').val();
        var price = $('.price-hide-'+number+'').text();
        var price_quantity=quantity*price;
        $('.price-'+number+'').text('$'+price_quantity);
    });
         
}   
/**
 *@param int
 *@return function event
 **/    
function setBook(number)
{
      
    $(document).on('click','.btn-book-'+number+'',function (){ 
        
        var quantity=$('.spf-'+number+'').val();
        var price = $('.price-hide-'+number+'').text();
        //var price_quantity=quantity*price;
        var adults= $('#slt-adults').val();
        var check_in = $('#slt-date').val();
        var check_out=$('.date-out-'+number+'').text();
        var roomid=$('.room-id-'+number+'').text();
        var name=$('.name-'+number+'').text();
        $('#book-quantity').text(quantity);
        $('#book-price').text('$'+price);
        $('#book-adults').text(adults);
        $('#book-in').text(check_in);
        $('#book-out').text(check_out);
        $('#book-name').text(name);
        $('#book-roomid').text(roomid);
        $('#book-operator').text(operatorID);
        
      
    });
         
}   
/**
 *@param object
 *@return HTML
 **/    
function renderhtml(object,Room)
{
   
    console.log(Room);
    var data= object.length;
    var html='';
    for(i=0;i<data;i++)
    {
       
        var quantity='';
       
        for( noroom =1; noroom <=parseInt(object[i].NoRooms); noroom++)
        {
            if(noroom==1)
            {
                quantity+='<option selected="selected">'+noroom+'</option>';  
            }
            else
            {
                quantity+='<option>'+noroom+'</option>';
            }
            
        } 
        var Facilities=object[i].Facilities;
        var strF='';
        for(f=0;f<Facilities.length;f++)
        {
            if(f<15)
            {
                strF+=' <span>'+Facilities[f]+'</span>' ;
            }
             
        }
        if(Room['RoomID'].indexOf(object[i].RoomID)!=-1)
        {    
           
           
            var index=Room['RoomID'].indexOf(object[i].RoomID);
            var Day_out= Room['DaysCost'][object[i].RoomID];
            var legDayOut=Day_out.length;
            var check_out = getArrayTostring(Day_out[legDayOut-1].Date,'T');
            html += 
                '<div class="room-detail">'
            // hide field get save booking
                +'<label class="date-out-'+i+' hide">'+check_out[0]+'</label>'
                +'<label class="room-id-'+i+' hide">'+[object[i].RoomID]+'</label>'
                +'<label class="operatorid-'+i+' hide">'+operatorID+'</label>'
                +'<div class="room clearfix">'
                +'<div class="photo">'
                +'<a href="" title="">';
            var check_img=object[i].Pictures[0];
            if(typeof(check_img)=='undefined')
            {
                html+='<img src="/uploads/gallery/a.jpg" alt="">';
            }
            else
            {
                html+='<img src="'+object[i].Pictures[0]+'" alt="">';
            }
                               
            html+= '</a>'
                +'</div>'
                +'<div class="caption">'
                +' <h3><a href="#" title="">Features Include: '+object[i].Name+'</a></h3>'
                            
                +'<div class="descrip"><lable class="name-'+i+' hide">'+object[i].Name+'</lable>'
                +object[i].Description 
                +'</div>'
                +'<ul class="intro-room">'
                +'<li>'
                +'<span class="title">Maximum Guests:</span>'
                +'<span>'+object[i].NoPersons+'</span>'
                +'</li>'
                +'<li>'
                +'<span class="title">Configuration:</span>'
                +'<span>'+ object[i].RoomConfig+'</span>'
                +'</li>'
                                   
                +'</ul>'
                +'<div class="bx-tag">'
                +strF
                +'</div>'
                +'</div>'
                +'</div>'
                +'<div class="price-grid clearfix">'
                +'<label  class="price-hide-'+i+' hide">'+Room['price'][index]+'</label>'
                +getPriceCaculator()
                +'<div class="sold-price price-'+i+'">$'
                +Room['price'][index]                    
                +'</div>'
                +'<div class="quan-now">'
                +'<div class="quantity">'
                +'<label class="text">quantity</label>'
                +'<div class="select-rv">'
                +' <span class="form-control spl-val-'+i+'"></span>'
                +'<select class="form-control spf-'+i+'">'
                +quantity
                +'</select>'
                +'</div>'
                +'</div>';
            var check=Room['IsConstrained'][object[i].RoomID];
            if(check==true)
            {
                html+='   <button type="button" class="btn-green btn-1 btn-book-'+i+'" data-toggle="modal" data-target="#book-now">Book Now</button>';
            }
            else{
                html+='   <button type="button" class="btn-green btn-1"  style="background: #A9B2A9;">Change Days</button> ';
            }
            html+='</div>'
                +' </div>'
                +'</div>';
        }
    }
    $('#list-room').html(html);
    setTimeout(function(){
        $('.loading_handle').hide()
    }, 500);
    setTimeout(function(){
        $('#list-room').show()
    }, 600);
    
    $('.select-rv').each (function (){ 
        var spanTxt = $(this).find('span.form-control');
        $(this).change(function() {
            var str = "";
            $(this).find("option:selected").each(function() {
                str += $( this ).text() + " ";
            });
            spanTxt.text( str );
        }).trigger( "change" );
    });
    for(i=0;i<data;i++)
    { 
        setQuantity(i);
        setBook(i);
    }
     
    function getPriceCaculator()
    {
        var caculator='';
      
        caculator+='<div class="content">'
            + '<div class="priceGrid clearfix">'
            +   '<table>'
            +     '<thead>'
            +       '<tr>'
            +         '<td>'
            +          '<p><span class="">Wed</span></p>'
            +         '<p><span class="day">25</span></p>'
            +        '<p><span class="">Mar</span></p>'
            +       '<p><span class="sold">Sold</span></p>'
            +    '</td>'
            +         '<td>'
            +          '<p><span class="">Wed</span></p>'
            +         '<p><span class="day">25</span></p>'
            +        '<p><span class="">Mar</span></p>'
            +       '<p><span class="sold">Sold</span></p>'
            +    '</td>'
            +   '<td>'
            + '</tr>'
            +'</thead>'
            +'</table>'
            +' </div>'
            +'</div>'
        return caculator;
    }
}
/**
 *@param int
 *@return API JSON
 **/  
function getRoomOperatorID(vic,operatorid,price)
{
    var cost=new Array();
    cost['price']=  [];
    cost['RoomID']=[];
    cost['IsConstrained']=[];
    cost['DaysCost']=[];
    var listPrice=price.RoomData;
    for(i=0;i<listPrice.length; i++)
    {
        cost['price'][i]=listPrice[i].Availability.Cost;
        cost['RoomID'][i]=listPrice[i].RoomID;
        cost['IsConstrained'][listPrice[i].RoomID]=listPrice[i].Availability.IsConstrained;
        cost['DaysCost'][listPrice[i].RoomID]=listPrice[i].Availability.Days;
    }
    var childrens=$('#slt-children').val();
    var nights=$('#slt-nights').val();
    var adults=1;//$('#slt-adults').val();
    var infants=$('#slt-infants').val();
    var date =$('#slt-date').val();
    
    $.ajax({
        dataType: "json",
        url: "//sjp.impartmedia.com/be/getAccomRoomsDetails?callback=?",
        data:{
            q:vic,
            operators:operatorid,
            period:nights,
            adults:adults,
            children:childrens,
            infants:infants,
            date:date
        },
        beforeSend: function() {
            $('.loading_handle').show();
        },
        success: function(r) {
                       
            renderhtml(r[0].Rooms, cost)
          
        },
         error : function () {
           getRoomOperatorID(vic,operatorid,price)
        }
    })



}     
/**
 *@param int
 *@return API JSON
 **/   
function getPrice(operatorid) 
{ 
               
    var childrens=$('#slt-children').val();
    var nights=$('#slt-nights').val();
    var adults=1;
    var infants=$('#slt-infants').val();
    var date =$('#slt-date').val();
    $.ajax({
                    
        dataType: "json",
        url: "//sjp.impartmedia.com/be/getAccomRates?callback=?",
        data: {
            q: 212,
            operators:operatorid,
            period:nights,
            adults:adults,
            children:childrens,
            infants:infants,
            date:date,
            enforceBookingConditions:false
        },
        beforeSend: function() {
            $('.loading_handle').show();
        },
        success: function(r) {
                        
            if($.isEmptyObject(r)==false)
            {
                var u = r[0].Rooms;
                n.RoomData = u; 
                // console.log(n.RoomData);
                $('#list-room').hide();
                getRoomOperatorID(212,operatorid,n); 
                $('.success').hide();
                 
                    
            }
            else
            {
                $('tbody#tb-be').hide();
                $('.success').show();
            }
                        
        },
        error : function () {
            getPrice(operatorid) 
        }
    });
               
}
/**
 *@param int
 *@return API JSON
 **/  
function getSearchPrice(operatorid) 
{ 
               
    var childrens=$('#slt-children').val();
    var nights=$('#slt-nights').val();
    var adults=$('#slt-adults').val();
    var infants=$('#slt-infants').val();
    var date =$('#slt-date').val();
    $.ajax({
                    
        dataType: "json",
        url: "//sjp.impartmedia.com/be/getAccomRates?callback=?",
        data: {
            q: 212,
            operators:operatorid,
            period:nights,
            adults:adults,
            children:childrens,
            infants:infants,
            date:date,
            enforceBookingConditions:false
        },
        success: function(r) {
                      
            if($.isEmptyObject(r)==false)
            {
                var u = r[0].Rooms;
                n.RoomData = u; 
                //console.log(n.RoomData);
                $('#list-room').hide();
                getRoomOperatorID(212,operatorid,n);
                $('.success').hide();
                  
            }
            else
            {
                $('#list-room').hide();
                $('.success').show();
            }
        },
        error : function () {
            getSearchPrice(operatorid) ;
        }
    });
     
               
}
/*
 *@param int
 *@return string
 */
function getDayOfWeek(day)
{
    var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    var d = new Date();
    d.setDate(day);
    var day = days[ d.getDay() ];
    return  day;
}
/*
 *@param int
 *@return string
 */
function getMonthToDay(month){
    var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    var m = new Date();
    m.setMonth(month);
    var M = months[ m.getMonth ];
    return M; 
}
/*
 *@param string
 *@return array
 */
function getArrayTostring(str,key)
{
    var Arr= str.split(''+key+'');
    return Arr; 
}
/*
 *@param : null
 *@return object
 */

function SetCart(object)
{
    console.log(object);
    $.ajax({
        dataType: "json",
        url: "//sjp.impartmedia.com/cart/getBECart?callback=?",
        data: {
            q: true,
            key: object.SessionId
        },
        success: function(r) {
            booknow(object);
        }
    });
}

function booknow(object)
{
    
    // var name =$('#book-name').text();
    var pr=$('#book-price').text();
    var price=getArrayTostring(pr,'$')
    var quantity=$('#book-quantity').text();
    var check_in=$('#book-in').text();
    //var check_out=$('#book-out').text();
    var adults= $('#book-adults').text();
    var roomid=$('#book-roomid').text();
    var operator=$('#book-operator').text();
    var period=$('#slt-nights').val();
    var children=$('#slt-children').val();
    var infants=$('#slt-infants').val();
    console.log(price);
    getInforCart(object.SessionId);
    var cartcontent=getInforCart(object.SessionId);
    var addCart={
                "type":"accommodation",
                "operatorId":operator,
                "id":roomid,
                "startdate":check_in,
                "period":period,
                "quotedprice":quantity*price[1],
                "adults":adults,
                "children":children,
                "infants":infants,
                "quantity":quantity

                };
    var param ={
                "key":object.SessionId,
                "controlId":212,
                "cartcontent": getContent(cartcontent,addCart)
                };
    console.log(param);
    var data = JSON.stringify(param);
    $.ajax({
        dataType: "json",
        url: "//sjp.impartmedia.com/cart/saveBECartPart?callback=?",
        data: {
            q:true,
            key:object.SessionId,
            partNo:1,
            totalParts:1,
            data:data
        },
        success: function(r) {
            console.log(r);
            var data=null;
            if(r.result==true)
            { 
                data=object.SessionId

            }
            localStorage.Key=data;
            location.href='http://local.retreats2.com/bookings';
            
        }
    });
}
/*
 *@param string key in bookeasy
 *@return object,HH
 **/
function getContent(cart,obj)
{
    var data= [];
    var cartObj=false;
    if(cart!=null)
    {
        for ( var i=0; i<cart.length;i++)
        {
               if(obj.id==cart[i].id)
               {
                    cartObj= true;
               }
               data[i]=cart[i];
                   
        }
        if(cartObj==false)
        {
             data[cart.length]=obj;
        }
       
      
    }
    else
    {
             data[0]=obj;
    }
   return data;
    
}
/*
 *@param string key in bookeasy
 *@return object,HH
 **/
function  SetInforCart(key)
{
    $.ajax({
        dataType: "json",
        url: "//sjp.impartmedia.com/cart/getBECart?callback=?",
        data: {
            q:true,
            key:key
                    
        },
        success: function(r) {
            if(!r.NoDataFound)
            {
                var data= r.cartcontent;
                localStorage.CartInfor= JSON.stringify(data);
            }
            else
            {
                localStorage.CartInfor=null;
            }
                 
        }
    });
}
/*
 *@param object
 *@return object,HH
 **/
function getInforCart(key)
{
    SetInforCart(key);
    var data =null;
    if(localStorage.CartInfor)
    {
        data=JSON.parse(localStorage.CartInfor);
        
    }
    return data;
}
// Get card session from server
function getSessionCart()
{
    var session = getSession();
    if ( session != null )
    {
        SetCart(session);
        return false;
    }
    $.ajax({
        dataType: "json",
        url: "//sjp.impartmedia.com/cart/getNewSession?callback=?",
        data: {
            q:true
        },
        success: function(obj) {
            localStorage.cartSession =  JSON.stringify(obj);
            SetCart(obj);
        }
    });
}

// Get session from local store
function getSession()
{
    var session=null;
    if(localStorage.cartSession)
    {
        var session = JSON.parse(localStorage.cartSession);
    }
    return session;
}


    function copy()
    {
        var rs={
            'roomID':roomid,
            'operatorID':operator,
            'name':name,
            'price':price,
            'quantity':quantity,
            'check_in':check_in,
            'check_out':check_out,
            'adults':adults
   
        }  ;
            
        var param ={
            "key":object.SessionId,
            "firstname":"firstname",
            "surname":"surname",
            "address":"test Address",
            "city":"test city",
            "state":"QLD","postcode":4563,
            "country":"test country",
            "phone":"phone",
            "mobile":"mobile",
            "email":"email",
            "comment":"test comment",
            "fax":"fax",
            "receiveENewsletter":false,
            "salutation":"salutation",
            "Referrer":"asdfasdf",
            "acceptCancellationPolicy":false,
            "controlId":212,
            "paymentInformation":{
                "type":"visa",
                "ccv":"123",
                "number":"1234567890",
                "expirymonth":1,
                "expiryyear":12,
                "name":"test"},
            "cartcontent":
                [{
                    "description":null,
                    "type":"accommodation",
                    "operatorId":29315,
                    "id":localStorage.Cart.roomID,
                    "startdate":"2015-06-17T14:08:32",
                    "period":1,
                    "adults":1,
                    "children":0,
                    "infants":0,
                    "concessions":null,
                    "students":null,
                    "observers":null,
                    "family":null,
                    "quantity":1,
                    "freight":null
                }
            ]
        };
    }
    function AddToCart()
    {
        
    }