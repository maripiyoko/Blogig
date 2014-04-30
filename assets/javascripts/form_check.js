$(function() {
  $('input.check_unique').keyup(function(e) {
    var min = parseInt($(this).data('min'));
    var max = parseInt($(this).data('max'));
    var text = $(this).val();
    var len = text.length;
    console.log('len='+len);
    if(len > min && len <= max) {
      console.log('TODO check= '+text);
    }

  });
});