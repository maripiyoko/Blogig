$(function() {
  $('body').on('click', '.submit', function() {
    $(this).closest('form').submit();
  });
});