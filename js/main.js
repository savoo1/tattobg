document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    const target = document.querySelector(this.getAttribute("href"));

    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
      });
    }
  });
});

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
