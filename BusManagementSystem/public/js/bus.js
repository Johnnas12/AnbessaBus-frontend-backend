function showRoute() {
  var routeLine = document.querySelector('.route-line');
  var busIcon = document.querySelector('.bus-icon');

  var routeContainerWidth = document.querySelector('.route-container').offsetWidth;
  var destinationPosition = routeContainerWidth - busIcon.offsetWidth;

  busIcon.style.left = '0';
  routeLine.style.backgroundColor = '#00ff00';

  function animateBus() {
    busIcon.style.left = destinationPosition + 'px';
    routeLine.style.backgroundColor = '#ff0000';


        setTimeout(function() {
            busIcon.style.left = '0';
            routeLine.style.backgroundColor = '#00ff00';
            animateBus(); // Repeat the animation
            }, 1000);
  }
  animateBus();
}

showRoute();
