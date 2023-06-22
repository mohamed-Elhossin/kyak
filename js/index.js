$(function () {
  $('[data-toggle="tooltip"]').tooltip();
  $(".testmontis .owl-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    items: 1,
    smartSpeed: 5000,
    animateOut: 'flipInX',
    animateIn: 'slideOutDown'
    
  });
  $('.slideri .owl-carousel').owlCarousel({

    loop: true,
    autoplay: true,
    items: 1,
    smartSpeed: 1500,
  });
  $('.halls-test .owl-carousel').owlCarousel({

    loop: true,
    autoplay: true,
    items: 4,
    smartSpeed: 1500,
  });
  
  $('.slider-content .owl-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    items: 1,
    smartSpeed: 1500,
    // animateIn: 'zoomIn',
    // animateOut: 'zoomOut'
  });
  
  $(".del-Comment").click(function (e) {
    e.preventDefault();

    var value_del = $(this).data("del");

    if (confirm("Are you sure ?")) {

      $.ajax({
        type: 'POST',
        url: route,
        data: { id: value_del },
        success: function (data) {
          
          $("#" + value_del).fadeOut(1500);
          
          alert("Delete successfully");
          console.log(data);
        },
        error: function () {
          alert("sorry, something is wrong");
        }
      });
    }
  });
  
  $(".item-one").mouseover(function(){
    $(this).children().find('img').css({ 'transform': 'scale(1.2)'});
  });

  $(".item-one").mouseleave(function(){
    $(this).children().find('img').css({ 'transform': 'scale(1)'});
  });

  var d = new Date();

  var month = d.getMonth()+1;
  var day = d.getDate();

  var thisday = d.getFullYear() + '-' +
      (month<10 ? '0' : '') + month + '-' +
      (day<10 ? '0' : '') + day;

  $('#nymte').on('keyup',function () {
      if ($("#nymte").val() == "") {
        
        $("#label-cardnumber").html("0000 0000 0000 0000");
      } else {
        $("#label-cardnumber").html($('#nymte').val());

      }
  });
  $('#cvss').on('keyup',function () {
      if ($("#cvss").val() == "") {
        
        $("#cvsId").html("000");
      } else {
        $("#cvsId").html($('#cvss').val());

      }
  });
  $('#dateM').on('change',function () {
      
        $("#dateId").html($('#dateM').val());

  });

  $('input[type=date]').on('change',function(){
    var selectData = $(this).val();
    if (selectData > thisday) {
      
    } else {
      alert('This date is over');
      
    }

  });


})