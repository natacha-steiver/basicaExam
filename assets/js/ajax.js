//var $ = require('jquery');
$('.pager').on('click',function(e){
  e.preventDefault();

   var nbreWorks = $('.col-sm-6').length;
  var url = $(this).attr('data-url');
  $.ajax({
      url: url,
      method: 'get',
      data: {
        offset: nbreWorks
      },
      success: function(reponseSrv){
    $('ul header').css('display','none');
    $('.cs-style-3').find("div:nth-last-of-type(1)").after(reponseSrv).hide().slideDown();
      },
      error: function(){
        window.alert("Problème durant la transaction...");
      }
  });
});
