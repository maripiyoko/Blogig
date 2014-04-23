$(function() {

  $('.editable-item').on('click', '.view', function(e) {
    $(this).slideToggle();
    var $pair = $(this).closest('.editable-item').find('.edit');
    $pair.slideToggle().find('textarea').focus();
    //console.log('click view');
  });

  $('.editable-item').on('blur', '.edit', function(e) {
    $(this).slideToggle();
    var $pair = $(this).closest('.editable-item').find('.view');
    $pair.slideToggle();
    //console.log('blur edit');
  });
});