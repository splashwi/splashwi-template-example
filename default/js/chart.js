jQuery(document).ready(function($){
  $('.pie_progress').asPieProgress({
      namespace: 'pie_progress'
  });

  // Example with grater loading time - loads longer
  $('.pie_progress--slow').asPieProgress({
      namespace: 'pie_progress',
      goal: 1000,
      min: 0,
      max: 1000,
      speed: 200,
      easing: 'linear'
  });
$( document ).ready(function() {
$('.pie_progress').asPieProgress('start');
});
/*
  $('#button_start').on('click', function(){
      $('.pie_progress').asPieProgress('start');
  });
  $('#button_finish').on('click', function(){
       $('.pie_progress').asPieProgress('finish');
  });
  $('#button_go').on('click', function(){
       $('.pie_progress').asPieProgress('go',50);
  });
  $('#button_go_percentage').on('click', function(){
      $('.pie_progress').asPieProgress('go','50%');
  });
  $('#button_stop').on('click', function(){
      $('.pie_progress').asPieProgress('stop');
  });
  $('#button_reset').on('click', function(){
      $('.pie_progress').asPieProgress('reset');
  });
*/
});
