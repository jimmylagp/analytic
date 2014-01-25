function resizeChart() {
  var canvas = document.getElementsByClassName("charts");

  //set new sizes                 
  var new_canvasWidth = Math.max((canvas[0].parentNode.clientWidth), 800);
  var new_canvasHeight = 400;

  //only redraw if the size  has changed
  if ((new_canvasWidth != canvas[0].width) || (new_canvasHeight != canvas[0].height)) {
    canvas[0].width = new_canvasWidth;
    canvas[0].height = new_canvasHeight;
    new Chart(canvas[0].getContext("2d")).Line(lineChartData,options);
  }
}

//resizeTracker, clearTimeout, and setTimeout are used to only fire the resize event after the user has finished resizing; rather than firing lots of times unnecessarily while resizing.
var resizeTracker;
window.addEventListener('resize', (function() {
  clearTimeout(resizeTracker);
  resizeTracker = setTimeout(resizeChart, 100);
}), false);

resizeChart();


/*Functionality*/

$('#add-sargument input[type="text"]').on('keyup', function(){
  if ($(this).val() == "") {
    $('#add-sargument input[type="submit"]').attr("disabled", "disabled");
  }else{
    $('#add-sargument input[type="submit"]').removeAttr("disabled");
  }
});

$('#add-sargument input[type="submit"]').on('click', function(){
  $('#add-sargument span').removeClass("hide");
  
  $.post($('#add-sargument').attr("action"), { argument: $('#add-sargument input[type="text"]').val() }, function(data,status){
    if(status == 'success'){
      $('#add-sargument span').addClass("hide");
      $('#add-sargument input[type="text"]').val("");
    }
  });

  return false;
});

$('#arguments a.update').on('click', function(){
  var link = $(this);
  var text = $(this).parents('tr').children('td').first().html();
  $(this).parents('tr').children('td').first().html( text + " (Please wait...)" );

  $.post( 
    $(this).attr("href"), 
    { up_argument: text, id_argument: $(this).attr("data-id") }, 
    function(data,status){
      
      if(status == 'success'){
        link.parents('tr').children('td').first().html(text);
      }

    }
  );

  return false;
});

$('a.deletes').on('click', function(){
  console.log(1);

  return false;
});
