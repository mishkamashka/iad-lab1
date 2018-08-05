function isFormValid() {
  var y = document.getElementById('coordinate_y').value;
    if (y == "") {
        alert("Не введено значение координаты У");
        return false;
    }
    if (!isNumeric(y) || y < -3 || y > 5) {
      alert("Значение координаты У должно быть числом в диапазоне [-3..5]");
      return false;
    }
    return true;
}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function charCheck() {
  document.getElementById("coordinate_y").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("1234567890.-".indexOf(chr) < 0)
        return false;
    }
}
