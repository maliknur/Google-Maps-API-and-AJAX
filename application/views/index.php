<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Google Map</title>

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="../assets/stylesheets/style.css">
    <script>
      $(document).ready(function(){
      
       $('form').submit(function(){
       	
       	 $.post('map/direction', $(this).serialize(), function(res) {
       
       	 var html_str = "";

         var counter=0;

         html_str +="<h3>Direction from " +res.routes[0].legs[0].start_address+ " to " +res.routes[0].legs[0].end_address+ "</h3>" 
         for (var i =0; i < res.routes[0].legs[0].steps.length; i++) {
    
        counter++;
        html_str += "<p>"+counter+". "+res.routes[0].legs[0].steps[i].html_instructions+"</p>";


         };


         

         $('#results').html(html_str);

  
          
        }, 'json');


       	return false;

       });


      });


    </script>
	
</head>

<body>
<div class="wrapper">
<h1>Google Map v 1.0</h1>

<form>

	<div>
		<label for="text">From:</label>
			<input type="text" name="origin"  placeholder="Montain View" value="Mountain View">
	</div>
	<div>
	<label for="text">To:</label>
			<input type="text" name="destination" placeholder="Seattle" value="Seattle">

	</div>

		<input type="submit" value="Get Directions">



</form>

</div>




<div id="results">
</div>

</body>
</html>