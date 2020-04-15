$(document).ready(function() {
    //code for vendor dependent item select box
    $('select[name="vendor"]').on('change', function(){
        //alert('helllllllo');
        var vendorId = $(this).val();
        //console.log(vendorId);
        if(vendorId) {
            $.ajax({
                url: '/items/'+vendorId,
                type:"GET",
                dataType:"json",
                
                success:function(data) {

                    $('select[name="item"]').empty();
                    $('select[name="item"]').append('<option value="">--Select Item --</option>');
                    $.each(data, function(key, value){

                        $('select[name="item"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
            });
        } else {
            $('select[name="item"]').empty();
            $('select[name="item"]').append('<option value="">--This vendor has no item--</option>');
        }

    });
}); 