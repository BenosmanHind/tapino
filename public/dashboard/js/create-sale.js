
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('.total-price').val('0.00');   
  });

let tab = [];
var j = 1 ;

$(".product-select").on('click', function() {
    var id = $(this).attr("data-id");
    var name = $(this).attr("data-name");
    var price = $(this).attr("data-price");
    var parent = $(this).attr("data-parent");
    var qte = $(this).attr("data-qte");
    
        
            
    var test = false;
    for (let i in tab) {
        if(tab[i] == id){
            test = true ; 
        }
    }
    if(test == false){
        tab.push(id);
        var $tr = ' <tr > ' +
                
                '<td>'+name+'</td>'+
                '<td>'+parent+'</td>'+
                '<input type="hidden" data-id='+id+' value='+price+' name="prices['+j+']" >'+ 
                '<input type="hidden"  value='+id+' name="product[]" >'+ 
                '<td> <input id="'+id+'" data-price='+price+'  name="qtes[]" type="number" class="form-control qte-inp" value="1" max="'+qte+'" min="1" ></td>'+
                '<td class="item-price"><b id="price'+id+'">'+price+'</b></td>'+
                '<td data="data-id"><a href="#" class="delete-item-order"><i class="fa fa-times" aria-hidden="true"></i></a></td>'
                    
                '</tr>'
        $('#items-add').append($tr);
        $('.total-price').val(parseInt($('.total-price').val()) +parseInt(price) ).number(true, 2);
        j++;

    }
    else{
        $('#'+id).attr('value', parseInt($('#'+id).val())+1);
        $('#price'+id).html(parseInt($('#'+id).val())*price);
        $('.total-price').val(parseInt($('.total-price').val()) + parseInt(price)).number(true, 2);
    
        
    }
    
});

$(".table-order").on('click','.delete-item-order',function(e) {

    var id =  $(this).closest('tr').find("input").attr("data-id");
    var text = $(this).parent().prev().text();
    $('.total-price').attr('value',parseInt($('.total-price').val())  - parseInt(text));
    $(this).closest("tr").remove();

    for (let i in tab) {
        if(tab[i] == id){
            tab[i] = 0 ; 
        }
    }

    

});

/* Get user from customerProvider */
$(".select-customer").on('change',function() {
    var id = $(this).val();
    $.ajax({
            url: '/dashboard-provider/sale/get-customer/'+id,
            type: "GET",
            success: function (customer) {
                $('.total-orders').val(customer[0]).number(true, 2);
                $('.credit').val(customer[1]).number(true, 2);
            }
        });
});

/* change qte calcul */

$(".table-order").on('change','.qte-inp',function(e) {

    total = 0 ;
    sum = 0 ;

    //change input value with the new one
    var id = $(this).attr('id');
    var price = $(this).attr("data-price");
    $('#price'+id).html(parseInt($('#'+id).val())*price);

    // The .each() method is unnecessary here:
    $( ".item-price" ).each(function() {
        
        total= total + parseInt($(this).text());
    });

    $('.total-price').val(total);
});


$("#ten-promo").on('click', function() {
    var price = $('#total-promo').val();
    $('#total-promo').val(price - price*10 / 100)
});

$("#twenty-promo").on('click', function() {
    var price = $('#total-promo').val();
    $('#total-promo').val(price - price*20 / 100)
});

$("#reset-promo").on('click', function() {
    var price = $('#total-price').val();
    $('#total-promo').val(price);
});




