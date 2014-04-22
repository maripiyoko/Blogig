$(function() {
  $('#add_comment').click(function(e) {
    $('#new_comment').slideToggle();
    $(this).find('span').toggle();
  });
});