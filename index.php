<?php
	require("connection.php");
	require("process.php");

  session_start();
?>

<!doctype html>

<html>

  <head>
    <title>Country Info</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  
   <script type="text/javascript">
    $(document).ready(function(){
      $("#getCountry").on('submit', function(){
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function(data){
          console.log(data);

          var html = "<div id='country_info'><p><strong>Country: </strong>"  + data.country_info.Name + "</p>" +
          "<div><p><strong>Continent: </strong>"  + data.country_info.Continent + "</p>" +
          "<div><p><strong>Region: </strong>"  + data.country_info.Region + "</p>" +
          "<div><p><strong>Population: </strong>"  + data.country_info.Population + "</p>" +
          "<div><p><strong>Life Expectancy: </strong>"  + data.country_info.LifeExpectancy + "</p>" +
          "<div><p><strong>Government Form: </strong>"  + data.country_info.GovernmentForm + "</p>" +
          "</div>";

          $("#countryInfoDiv").html(html);
        }, "json");
        return false;
      });
    });
</script>



  </head>


  <body>
<div id="wrapper">
  <div id="header">
  	<form  id ="getCountry" action="process.php" method="POST">
  		<span id="select_country">Select country:</span>
  		<select name="country_name">

  			<?php

  			$countries = new Country();

  			$country_list = $countries -> get_countries();

  			foreach ($country_list as $country){
  				echo "<option>" . $country['Name'] . "</option>";
  			}

  			?>


  		</select>

  		<input type="submit" value="Check info">

  	</form>
  </div>
<h1>Country Information</h1>
  	<div id="countryInfoDiv">
      <p>Select a country from a drop-down above and information about that country will show here.


  	</div>

  </div>
  <div id="footer">
     <p> By: David Ethier, 2013, OOP, AJAX, JQuery, MySQL DB</p>
    </div>

  </body>

</html>