$(document).ready(function() {
  if ($('#testimonials').length > 0) {
    $('#testimonials').quotator();
  }
  $('a[@rel*=lightbox]').lightBox();
});
