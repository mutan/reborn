/* Вывод изображения карты при наведении на название-ссылку карты. */
$(function () {
  $('[data-toggle="card-popover"]').popover({
  	trigger: 'hover',
  	placement: 'right',
  	html: true,
  	boundary: 'window',
  	fallbackPlacement: 'clockwise',
  	container: 'body',
  })
})
