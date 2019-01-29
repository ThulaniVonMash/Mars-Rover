<?php include 'classes.php';?>
<!--
Author: w3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Exert Design Multi Purpose Category Bootstrap Responsive web Template | Home :: W3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Exert Design Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <!-- //online-fonts -->
</head>

<body>

    <section class="main-banner" id="home">
        <div class="header-top-w3layouts text-right">
          
        </div>
        <div class="container">
            <div class="baner-info-w3ls text-left">
                <h1><a href="index.html">Thulani Mashiane</a></h1>
                <h6 class="mx-auto mt-4">VELOCITY Developer Assesment:</br> Mars Rover</h6>
                <a class="btn btn-primary mt-lg-5 mt-3 agile-link-bnr scroll" href="#about" role="button">Get Started</a>
                <div class="banner-high-lights text-left">
                    <div class="rotate">
                        <a href="#about" class="scroll">
                               <span class="fa fa-long-arrow-down"></span>                 
						</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- what we do -->
    <section class="wedo py-lg-5 py-5" id="about">
        <div class="container py-lg-5">
            <div class="text-center">
                <h3 class="tittle_head">Mars Rover Instructions </h3>
                <p class="main_p mt-4 mb-4 pt-2 text-center mx-auto">A squad of robotic rovers are to be landed by NASA on a plateau on Mars. </br>

This plateau, which is curiously rectangular, must be navigated by the rovers so that their on board cameras can get a complete view of the surrounding terrain to send back to Earth.</br>

A rover's position is represented by a combination of an x and y co-ordinates and a letter representing one of the four cardinal compass points. The plateau is divided up into a grid to simplify navigation. An example position might be 0, 0, N, which means the rover is in the bottom left corner and facing North.</br>

In order to control a rover, NASA sends a simple string of letters. The possible letters are 'L', 'R' and 'M'. 'L' and 'R' makes the rover spin 90 degrees left or right respectively, without moving from its current spot.</br>

'M' means move forward one grid point, and maintain the same heading. </p>
            </div>
           
        </div>
    </section>
    <!-- //what we do -->
    <!-- banner-bottom1 -->
    <section class="banner-bottom" id="news">
        <div class="banner-top row middle-grids">
            <div class="col-lg-4 advantage-grid-info1">
                <div class="advantage_left2 text-center">

                </div>
            </div>
            <div class="col-lg-8 advantage-grid-info">
                <div class="advantage_left">
                    <h3>The program takes in a text file as input. Please view the example input file carefully before submittimg a file					</h3>
                   <p>Click the Choose File Button.</p>
					<form action="index.php" method="post">
					  <input type="file" name="inputFile" accept=".txt">
					  <input type="submit">
					</form>
					
                </div>
            </div>
        </div>
    </section>  

</body>

</html>

<?php
$boundsCheck =false;
$startCheck =false;
$directionsCheck =false; 

$RoverCollection = array();
$MaxNumofRovers=0;


	 //RedIn File & Check Input
		if  (isset($_POST["inputFile"]))
		{
			$inputText = $_POST["inputFile"];
			
			$myfile = fopen($inputText, "r") or die("Unable to open file!");
			
			
			
			//Read in the File
			$graphSize= explode(" ",trim(fgets($myfile)));
			
			//Read in first line of file
			
			$boundsCheck = checkbounds($graphSize);
			
			$MaxNumofRovers = $graphSize[0]*$graphSize[1];
			$count=0;
	
			while(!feof($myfile)) 
			{
			//to check for blank lines 
			$line = fgets($myfile);
			
					if(!(strlen($line)<1))
					{
							//This means starting position of a rover
							if (($count%2) ==0)
						{
									
							$startArray = explode(" ",trim(fgets($myfile)));
							 if ($boundsCheck)
							 {
							 	 $startCheck =checkStartPosition( $startArray, $graphSize);
									
							 }
								
								$count++;
						}else
						{
							//check the movement instructions
					 		$instructionsString = trim(fgets($myfile));
								if($startCheck)
								{
									
									$directionsCheck =checkMoveInstructions($instructionsString);
								}
												
					            if($startCheck==true && $directionsCheck==true && $boundsCheck==true)
					            {
									 initializeRover($graphSize,$startArray,$instructionsString );	 
									 
								}	else
								{
									echo "A Rover was not loaded Successfully";
								}	
							
							$count++;
						}
						
					}
	
					echo "</br></br>";
			}
		
		    //Close myfile
			fclose($myfile);
			
		}

function checkbounds($bounds)
{

		//First check if there are only two co ordinates
		if ( sizeof($bounds) !=2 )
		{
			echo "There are too many or too few variables in the graph bounds. Please corrent and reload the file. Please check your input and try again.";
			return false;
		}else
		{
			//Second check if both co ordinates are numbers
					
			if (is_numeric($bounds[0]) !=1 || is_numeric($bounds[1]) !=1  )
			{
				echo "Both co_ordinates of the bounds need to be numbers. Please check your input and try again.  ". $bounds[0]."   ".$bounds[1]."  @@  ".is_numeric($bounds[1]);
				
				return false;
			}else
			{
				//Lastly check if both co ordinates are positive integers
				if ((  $bounds[0] >0 ) && ($bounds[1] >0)  )
				{
					return true;
				}else
				{
					echo "Both co_ordinates of the bounds need to be positive numbers i.e greater than 0. Please check your input and try again.";
				}
			}
			
		}
		
}
		
function checkStartPosition($arrayStart,$arrayBounds)
{
	
			//Check if the start position is in bounds
		  if( (($arrayStart[0] < $arrayBounds[0] ) && ($arrayStart[1] < $arrayBounds[1]))  )
		  {
		  	
		  	//Check if not negative co ordinates
		  	if((($arrayStart[0] >-1 ) && ($arrayStart[1] > -1)))
		  	{
				
				//check if numbers are numeric
					if((is_numeric($arrayStart[0]) ==1 ) &&  (is_numeric($arrayStart[1]) ==1))
					{
						//Check if the direction is NEWorS
						if(preg_match("/[^NESW]/", strtoupper(trim($arrayStart[2])) )) 
						{
								echo "The initial direction for the rover must be either N, E, S or W. Please check your input and try again.";
								return false;				
							
						}else
						{
						return true;
						}
						
						
					}else
					{
						echo "The start position must contain a number for both co ordinates. Please check your input and try again.";
					}
				
				
			}else
			{
				echo "The start position cannot have negative values. Please check your input and try again.";
			}
		  	
		  }else
		  {
		  		echo "The start position entered is not with in the bound of the grid. Please check your input and try again.";
		  }
			
			
		return false;
	

}	
	
function checkMoveInstructions($moveInstructions)
{
	   
	    
		if (preg_match("/[^LMR]+/", strtoupper($moveInstructions))) 
		{
			
			echo "Directions may only be indicated by the letters L R and M. Please check your input and try again.";
	 		return false;   
		}else 
		{
	
	  		return true;
		}
	
}

function  initializeRover($graphSize,$startArray,$instructionsString )
{
	$rover = new Rover;
	$rover->setBounds($graphSize);
	$rover->setx($startArray[0]);
	$rover->sety($startArray[1]);
	$rover->setdirection($startArray[2]);	
	
	echo "</br>Rover succesfully loaded. The initial position: </br>";
	$rover->display();
	
	processMoves($rover,$instructionsString);
	
}

function processMoves($rover,$move_instructions)
{

	for($i=0; $i<strlen($move_instructions); $i++)
	{
			   		   		
	   		if(strcmp($move_instructions[$i],"L")==0 || strcmp($move_instructions[$i],"R")==0)
	   		{
				$rover->switchDirection($move_instructions[$i]);
			}else
			{
				  $rover->move();
			}
   
   }
	echo "</br>Rover Final location </br>";
	$rover->display();

}

?>
