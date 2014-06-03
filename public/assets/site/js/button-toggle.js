$(document).ready(function() {
    $('#button1').click(function() {
      $('.button1-form').slideToggle(800);
      $('.button2-form').slideUp(800);
      $('.button3-form').slideUp(800);
      $('.button4-form').slideUp(800);
      $('.button5-form').slideUp(800);
      /*$('.button-space').toggle();
      $('#button2').toggle();
      $('#button3').toggle();
      $('#button4').toggle();
      $('#button5').toggle();*/
    });
    $('#button2').click(function() {
      $('.button1-form').slideUp(800);
      $('.button2-form').slideToggle(800);
      $('.button3-form').slideUp(800);
      $('.button4-form').slideUp(800);
      $('.button5-form').slideUp(800);
      /*$('.button-space').toggle();
      $('#button1').toggle();
      $('#button3').toggle();
      $('#button4').toggle();
      $('#button5').toggle();*/
    });
    $('#button3').click(function() {
      $('.button1-form').slideUp(800);
      $('.button2-form').slideUp(800);
      $('.button3-form').slideToggle(800);
      $('.button4-form').slideUp(800);
      $('.button5-form').slideUp(800);
      /*$('.button-space').toggle();
      $('#button1').toggle();
      $('#button2').toggle();
      $('#button4').toggle();
      $('#button5').toggle();*/
    });
    $('#button4').click(function() {
      $('.button1-form').slideUp(800);
      $('.button2-form').slideUp(800);
      $('.button3-form').slideUp(800);
      $('.button4-form').slideToggle(800);
      $('.button5-form').slideUp(800);
      /*$('.button-space').toggle();
      $('#button1').toggle();
      $('#button2').toggle();
      $('#button3').toggle();
      $('#button5').toggle();*/
    });
    $('#button5').click(function() {
      $('.button1-form').slideUp(800);
      $('.button2-form').slideUp(800);
      $('.button3-form').slideUp(800);
      $('.button4-form').slideUp(800);
      $('.button5-form').slideToggle(800);
      /*$('.button-space').toggle();
      $('#button1').toggle();
      $('#button2').toggle();
      $('#button3').toggle();
      $('#button4').toggle();*/
    });
});