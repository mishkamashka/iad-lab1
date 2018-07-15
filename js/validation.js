function validateForm() {
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
