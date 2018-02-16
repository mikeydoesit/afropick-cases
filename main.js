$(document).ready(function () {
  var contentPlacement = $('#top').position().top + $('#top').height()

  $('#products').css('margin-top', contentPlacement)
  $('#product-page').css('margin-top', contentPlacement)

  $('.btt').click(function () {
    $('body,html').animate(
    {scrollTop: 0})
  })
})
