function onClick(e) {
  e.preventDefault();
  grecaptcha.enterprise.ready(async () => {
    const token = await grecaptcha.enterprise.execute("6LdohdUpAAAAALdpkQQHV9lesdL1OmG0frovF2eW", { action: "LOGIN" });
  });
}

$(".scroll").click(function (e) {
  e.preventDefault();
  var nameof = "." + $(this).attr("name");
  $("html, body").animate(
    {
      scrollTop: $(nameof).offset().top - 120,
    },
    1000
  );
});
$(".stopDefault").click(function (e) {
  e.preventDefault();
});

// form submited
$(".form-submit").click(function (e) {
  e.preventDefault();

  const captchaResponse = grecaptcha.getResponse();

  if ($(".quote-form-inputs")[0].checkValidity()) {
    var contact_form = {
      name: $(".contact-name").val(),
      email: $(".contact-email").val(),
      phone: $(".contact-phone").val(),
      service: $(".contact-service").find(":selected").text(),
      date: $(".contact-date").val(),
      artist: $(".contact-artist").find(":selected").text(),
      message: $(".contact-message").val(),
    };
    console.log(contact_form);

    if (captchaResponse.length > 0) {
      $.ajax({
        type: "POST",
        url: "../php/contact-form.php",
        data: contact_form,
        dataType: "json",
        success: function (data) {
          if (data.status == "success") {
            return true;
          }
        },
      });
    }

    location.reload();
  } else {
    $(".quote-form-inputs input").each(function (index) {
      if (!$(this)[0].validity.valid) {
        $(this).css("border", "1px solid red");
      }
    });
    $(".quote-form-inputs select").each(function (index) {
      if (!$(this)[0].validity.valid) {
        $(this).parent().find(".form-input").css("border", "1px solid red");
      }
    });
    if (!$(".quote-form-inputs textarea")[0].validity.valid) {
      $(".quote-form-inputs textarea").css("border", "1px solid red");
    }
  }
});

$(".quote-form-inputs input").on("keyup", function () {
  if ($(this)[0].validity.valid) {
    $(this).css("border", "1px solid #fff");
    if ($(this).hasClass("silver-border")) {
      $(this).css("border", "1px solid #a1a1a1");
    }
  }
});
$(".quote-form-inputs textarea").on("keyup", function () {
  if ($(this)[0].validity.valid) {
    $(this).css("border", "1px solid #fff");
    if ($(this).hasClass("silver-border")) {
      $(this).css("border", "1px solid #a1a1a1");
    }
  }
});
$(".quote-form-inputs select").on("change", function () {
  if ($(this)[0].validity.valid) {
    $(this).parent().find(".form-input").css("border", "1px solid #fff");
  }
});
