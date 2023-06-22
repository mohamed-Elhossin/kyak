$(function () {




  $('#contact-us .buttonI').click(function (e) {
    e.preventDefault();

    var name = $("#contact-us input[name='name']").val();
    var phone = $("#contact-us input[name='phone']").val();
    var email = $("#contact-us input[name='email']").val();
    var text = $("#contact-us textarea[name='text']").val();

    console.log(name);

    if (name == null || name == "" || phone == null || phone =="" || email =="" || text == null || text ==""){
      $('#contact-us form').prepend('<div class="alert alert-danger">All faileds mustn`t empty </div>');

    } else{
      $.ajax({
        type: "POST",
        url: "../moaz/oper/register.php",
        data: "name=" + name+ "&phone=" + phone + "&email=" +email + "&text=" + text,
        success: function(data) {
          $('#contact-us form').prepend('<div class="alert alert-success">Thanks, your message has been' +
          ' sent</div>');
          console.log(data);
        },
        error: function (data) {
          $('#contact-us form').prepend('<div class="alert alert-danger">Sorry, somethings is wrong</div>');
          console.log(data);
        }
      });
    }
  });
});