$(".js-flatpickr").each(function() { 
   var flatpickr = $(this).prop('name');
   window[flatpickr] = $(this).flatpickr(JSON.parse($('input[name=__flatpickr_options_' + $(this).prop('name') + ']').val()));  
});