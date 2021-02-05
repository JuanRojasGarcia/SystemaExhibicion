    $(document).ready(function(){

        $('input[type="radio"]').click(function() {
            if($(this).attr('id') == 'pay_3') {
                $('#btnSave').show(); 
                $('#btnNext').hide();
            
            }else if($(this).attr('id') == 'pay_6') {
                $('#btnSave').show(); 
                $('#btnNext').hide();
            }else if($(this).attr('id') == 'pay_9') {
                $('#btnSave').show(); 
                $('#btnNext').hide();
            }else{
                $('#btnSave').show(); 
                $('#btnNext').hide();
            }
        }); 
    });
