<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	body, html {
    height: 100%
}

.bgimg {
    /* Background image */
    background-color:darkgray;
    /* Full-screen */
    height: 100%;
    /* Center the background image */
    background-position: center;
    /* Scale and zoom in the image */
    background-size: cover;
    /* Add position: relative to enable absolutely positioned elements inside the image (place text) */
    position: relative;
    /* Add a white text color to all elements inside the .bgimg container */
    color: white;
    /* Add a font */
    font-family: "Courier New", Courier, monospace;
    /* Set the font-size to 25 pixels */
    font-size: 25px;
}

/* Position text in the top-left corner */
.topleft {
    position: absolute;
    top: 0;
    left: 16px;
}

/* Position text in the bottom-left corner */
.bottomleft {
    position: absolute;
    bottom: 0;
    left: 16px;
}

/* Position text in the middle */
.middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

/* Style the <hr> element */
hr {
    margin: auto;
    width: 40%;
} 
		
	</style>
	 

</head>
<body>

</body>
</html>
 <div class="bgimg">
  <div class="middle">
    <h1>You cannot access this page! This page is only for '{{$user_type}}'</h1>
    <hr>
    <p>Sorry</p>
  </div>
</div> 