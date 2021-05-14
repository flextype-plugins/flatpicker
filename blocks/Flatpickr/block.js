$(".js-flatpickr").each(function() { 
   $(this).flatpickr(JSON.parse($('input[name=__flatpickr_options_' + $(this).prop('name') + ']').val()));  
});