
/* Clear form button */
function clearForm(form) {

  var elements = form.elements; 

  form.reset();

  for(i=0; i<elements.length; i++) {

    field_type = elements[i].type.toLowerCase();

    //alert(field_type);

    switch(field_type) {
      case "text": 
      case "password": 
      case "textarea":
      case "hidden":
        elements[i].value = ""; 
        break;
      case "radio":
      case "checkbox":
        if (elements[i].checked) {
        elements[i].checked = false; 
        }
        break;
      case "select-one":
      case "select-multiple":
        elements[i].selectedIndex = -1;
        break;
      default: 
        break;
    }
  }
}

/* Расширенный поиск */

/*$('#extended-search').hide();
$('#extended-search-header').click(function(){
  $('#extended-search').slideToggle(250);
});*/

/*$('#th-list-results').hide();

$('#th-large').click(function(){
  $('#th-list-results').hide(5000); 
  $('#th-large-results').show(5000);
});

$('#th-list').click(function(){
  $('#th-large-results').hide(5000);
  $('#th-list-results').show(5000);
});*/

/* Disable form after submit press */
$(function(){
  $('form').submit(function(){
    $('select').each(function(){
      if($(this).val()==''){
        $(this).attr('disabled','disabled');
      }
    });
    $('input').each(function(){
      if($(this).val()==''){
        $(this).attr('disabled','disabled');
      }
    });
  });
});

/* Автодополнение поля поиска */
/* http://api.jqueryui.com/autocomplete/ */

$(function() {
  $("#search-field").autocomplete({
    minLength: 2,
    source: '/search/autocomplete',
    select: function(event, ui) {
      $('#search-field').val(ui.item.value);
      $('#search-form').submit();
    }
  })
});

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

/*
  Source: https://gist.github.com/soufianeEL/3f8483f0f3dc9e3ec5d9
  Exemples : 
  <a href="posts/2" data-method="delete" data-token="{{csrf_token()}}"> 
  - Or, request confirmation in the process -
  <a href="posts/2" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">
  */

  $(function() {

    var laravel = {
      initialize: function() {
        this.methodLinks = $('a[data-method]');
        this.token = $('a[data-token]');
        this.registerEvents();
      },

      registerEvents: function() {
        this.methodLinks.on('click', this.handleMethod);
      },

      handleMethod: function(e) {
        var link = $(this);
        var httpMethod = link.data('method').toUpperCase();
        var form;

      // If the data-method attribute is not PUT or DELETE,
      // then we don't know what to do. Just ignore.
      if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
        return;
      }

      // Allow user to optionally provide data-confirm="Are you sure?"
      if ( link.data('confirm') ) {
        if ( ! laravel.verifyConfirm(link) ) {
          return false;
        }
      }

      form = laravel.createForm(link);
      form.submit();

      e.preventDefault();
    },

    verifyConfirm: function(link) {
      return confirm(link.data('confirm'));
    },

    createForm: function(link) {
      var form = 
      $('<form>', {
        'method': 'POST',
        'action': link.attr('href')
      });

      var token = 
      $('<input>', {
        'type': 'hidden',
        'name': '_token',
        'value': link.data('token')
      });

      var hiddenInput =
      $('<input>', {
        'name': '_method',
        'type': 'hidden',
        'value': link.data('method')
      });

      return form.append(token, hiddenInput)
      .appendTo('body');
    }
  };

  laravel.initialize();

})();
