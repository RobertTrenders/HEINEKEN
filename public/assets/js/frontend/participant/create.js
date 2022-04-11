$("#phone").keypress(function (e) {
  return onlyNumber(e, this, 13);
});

$("#dni").keypress(function (e) {
  return onlyNumber(e, this, 8);
});

$("#name").keypress(function (e) {
  return onlyText(e, this);
});

$("#last_name").keypress(function (e) {
  return onlyText(e, this);
});

//DISABLE MOUSE WHEEL ON INPUT TYPE NUMBER
$("form").on("focus", "input[type=number]", function (e) {
  $(this).on("wheel.disableScroll", function (e) {
    e.preventDefault();
  });
});

$("form").on("blur", "input[type=number]", function (e) {
  $(this).off("wheel.disableScroll");
});

//DISABLE PASTE DATA
$("form").on("paste", "input[type=number]", function (e) {
  e.preventDefault();
});

$("form").on("paste", "input[type=text]", function (e) {
  e.preventDefault();
});

$("form").on("paste", "input[type=email]", function (e) {
  e.preventDefault();
});

$(".btn-submit").click(function () {
  $("#ajax-loader").show();
});
