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