<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"></meta>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/main.css">
  <link rel="stylesheet" type="text/css" href="./css/table.css">
  <link rel="stylesheet" type="text/css" href="./css/overlay.css">
  <title>Лабораторная работа №1</title>
  <link href="./image/icon.png" rel="Shortcut Icon">
  <script src="./js/validation.js"></script>
  <script src="./js/overlay.js"></script>
</head>

<body>
  <div id="about__panel" class="overlay" style="height: 0%;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
      <a>Анисимова Мария</a>
      <a>группа P3210</a>
    </div>
  </div>
  <header class="header">
    <div class="header__block__img">
      <img class="header__icon" onclick="showNav()" src="./image/bear.png">
    </div>
    <div class="header__block__var">
      Вариант 28001
    </div>
    <div class="header__block__author">
      Анисимова Мария, P3210
  </header>
  </div>

  <div class="all__site__wrap">
    <div class="wrap__img__graph">
      <img class="graph__image" src="./image/areas.png">
    </div>
    <div class="wrap__content">
      <form name="form" action="action.php" onsubmit="return isFormValid()" method="get">
        <select class="select input__global--margin input__global--size" id="coordinate_x">
          <option value="" disabled selected>Choose 'x' coordinate</option>
          <option value="-3">-3</option>
          <option value="-2">-2</option>
          <option value="-1">-1</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <input class="input__text input__global--margin input__global--size" placeholder="enter 'y' coordinate" type="text" name="coordinate_y"
          id="coordinate_y" onclick="charCheck()" />
        <select class="select input__global--margin input__global--size" id="radius">
          <option value="" disabled selected>Choose radius</option>
          <option value="1">1</option>
          <option value="1.5">1.5</option>
          <option value="2">2</option>
          <option value="2.5">2.5</option>
          <option value="3">3</option>
        </select>
        <button type="submit" class="btn btn--font input__global--margin input__global--size">press me </button>
      </form>
    </div>
    <div class="wrap__table table ">
      <div class="row header__table">
        <div class="cell">
          X
        </div>
        <div class="cell">
          Y
        </div>
        <div class="cell">
          R
        </div>
        <div class="cell">
          Result
        </div>
      </div>
      <?php
          if (isset($answer)) {
              echo $answer;
          }
      ?>
        <div class="row">
          <div class="cell" data-title="X">
            -2
          </div>
          <div class="cell" data-title="Y">
            2
          </div>
          <div class="cell" data-title="R">
            1.5
          </div>
          <div class="cell" data-title="Result">
            Success
          </div>
        </div>
        <?php
        if (isset($errorMsg)) {
              echo $errorMsg;
          }
        ?>
    </div>
  </div>

  <footer class="footer">
    <div class="footer__links__block">
      <p>You should follow me at:</p>
      <a href="https://vk.com/i___mishkamashka___i">
        <img class="footer__icon" src="./image/vk.d89817ac.svg">
      </a>
      <a href="https://github.com/mishkamashka">
        <img class="footer__icon" src="./image/github.svg">
      </a>
    </div>
  </footer>

</body>

</html>