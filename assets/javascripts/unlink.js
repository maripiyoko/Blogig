$(document).ready(function(){

  url_check();

});

var url_check = function(){
  var url = location.href;
  $('a').each(function(){
    var color;
    if(url.indexOf("Blogig/articles") != -1 ||
       url.indexOf("Blogig/users") != -1 )
    {
      color='#ffffff';
    }
    else if(url.indexOf("Blogig/blogs") != -1 ||
            url.indexOf("Blogig") != -1 )
    {
      color='#007d7d';
    }
    if($(this).attr('href') == url)
    {
      $(this).addClass('unlink').css('color',color);
    }
  })
};
