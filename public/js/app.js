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
