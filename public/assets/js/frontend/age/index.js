$("#day").keypress(function (e) {
  return onlyNumber(e, this, 2);
});

$("#month").keypress(function (e) {
  return onlyNumber(e, this, 2);
});

$("#year").keypress(function (e) {
  return onlyNumber(e, this, 4);
});

function isAdult(day, month, year) {
  var today = new Date();
  try {
    if (
      parseInt(day) > 0 &&
      parseInt(day) <= 31 &&
      parseInt(month) > 0 &&
      parseInt(month) < 13 &&
      parseInt(year) > today.getFullYear() - 110 &&
      parseInt(year) < today.getFullYear()
    ) {
      const birthDay = new Date(`${month}/${day}/${year}`);
      const diffTime = Math.abs(today - birthDay);
      const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

      if (diffDays > 6570) {
        return true;
      }
    }
  } catch (e) {
    console.log(e);
  }
  return false;
}

function checkValidDate() {
  let day = $("#day").val();
  let month = $("#month").val();
  let year = $("#year").val();

  if (isAdult(day, month, year)) {
    $(".btn-continue").addClass("active");
    $(".invalid-feedback").hide();
  } else {
    $(".btn-continue").removeClass("active");
  }
}

function checkAge() {
  event.preventDefault();

  let day = $("#day").val();
  let month = $("#month").val();
  let year = $("#year").val();

  if (isAdult(day, month, year)) {
    $("#ageForm").submit();
  } else {
    $(".invalid-feedback").show();
  }
}
