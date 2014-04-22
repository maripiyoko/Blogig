$(function() {

  $('#title').keyup(function(e) {
    var text = $(this).val();
    var formatted = '<h1>' + text + '</h1>';
    $('.preview-title').text('').append(formatted);
  });

  $('#content').keyup(function(e) {
    var text = $(this).val();
    var formatted = marked(text);
    $('.preview-content').text('').append(formatted);
  });
});