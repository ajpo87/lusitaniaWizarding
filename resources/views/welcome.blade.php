<!DOCTYPE html>
<html>
<title>LusitaniaWizarding</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
<style>
body, html {
  height: 100%;
  font-family: "Nunito", sans-serif;
}
h2{
	color:goldenrod;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url('images/hogwarts.jpg');
  min-height: 100%;
}

.menu {
  display: none;
}
</style>
<body>
<!-- Links (sit on top) -->
<div class="w3-top">
  @if (Route::has('login'))
  <div class="w3-row w3-padding w3-black">
    @auth
	<div class="w3-col s3">
      <a href="{{ url('/home') }}" class="w3-button w3-block w3-black">HOME</a>
    </div>
	@else
    <div class="w3-col s3">
      <a href="{{ route('login') }}" class="w3-button w3-block w3-black">LOGIN</a>
    </div>
	@if (Route::has('register'))
    <div class="w3-col s3">
      <a href="{{ route('register') }}" class="w3-button w3-block w3-black">REGISTER</a>
    </div>
	@endif
	@endauth
    <div class="w3-col s3">
      <a href="{{route('portugal')}}" class="w3-button w3-block w3-black">Portugal Wizarding</a>
    </div>
  </div>
   @endif
</div>

<!-- Header with image -->
<div class="bgimg w3-display-container w3-grayscale-min" id="home">
  
  <div class="w3-display-middle w3-center">
    <h2>Lusitania Wizarding</h2>
	<h4 style="color:white"> Magic is where you create it </h4>
  </div>
</div>
<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

</body>
</html>