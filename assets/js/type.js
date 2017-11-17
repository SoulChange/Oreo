var typed = new Typed('.oreo-slogan', {
              strings: ["Welcome to Oreo official page", "Welcome to Oreo official page"],
              typeSpeed: 30,
              backSpeed: 0,
              backDelay: 5000,
              startDelay: 1000,
              cursorChar: '',
              fadeOut: false,
              loop: false,
              onComplete: function(self) { secongType() }
             });
function secongType()
{
  var typed2 = new Typed('.oreo-description', {
      strings: ['Oreo: <i>Your base to be monster on Back-End developpment</i>', 'Oreo: are build with <strong>PHP Oriented Object</strong>', 'Oreo: are build for <strong>You</strong>'],
      typeSpeed: 50,
      backSpeed: 60,
      cursorChar: '',
      smartBackspace: true,
      loop: false,
      onComplete: function(self) { showStartBtn() }
    });

}

function showStartBtn()
{
  $('.oreo-start').html("<a href='' class='btn bg-black'>Start now</a>")
}
