<?php


class Rover
{
	
	//properites
	public $properties =array("x"=>0,"y"=>0,"direction"=>"UN");
	public $bounds = array("x"=>0,"y"=>0);


// Set methods
     public function setx($x_value)
     {
	 	$this->properties['x'] = strtoupper($x_value);
	 }
	 
	 public function sety($y_value)
     {
	 	$this->properties['y'] =strtoupper($y_value);
	 }
	
	public function setBounds($bound_value)
	{
		$this->bounds["x"]=$bound_value[0];
		$this->bounds["y"]=$bound_value[1];
	}
	
	
	public function setname($name_value)
    {
	 	$this->properties['name'] =$name_value;
	}
	 
	public function setdirection($direction_value)
    {
	 	$this->properties['direction'] =strtoupper($direction_value);
	}
	 
	
	//Get methods
	 public function getx()
     {
	 	return $this->properties['x'];
	 }
	public function gety()
     {
	 	return $this->properties['y'];
	 }
	
	public function getname()
     {
	 	return $this->properties['name'];
	 }
	public function getdirection()
     {
	 	return $this->properties['direction'];
	 }
	 public function getBounds()
	 {
	 	return $this->bounds;
	 }
	
	// method declaration   
	public function display()
	{
		echo  $this->getx()."  ".$this->gety()."  ".$this->getdirection(). "</br>";
	}
		
	// move method. Depending on the direction that the rover is facing, this method moves it one space forward.			
	public function move()
	{
		$canmove =true;
		
		switch ($this->properties['direction']) 
		{
	 	 
			    case "N":
			       
			        if($this->checkCollision()==true)
				        {
						    if($this->bounds["y"]< ($this->gety()+1))
					        {
								echo "</br>Attempting to make an illegal move. Rover has reached the end of the grid. </br>";
												
							}else
							{
								$this->sety($this->gety()+1);
							}
						}
				
			        echo  $this->display()." </br>";
			        break;
			        
			    case "E":
       
			        if($this->checkCollision()==true)
			        {
			  
				  	   if($this->bounds["x"]< ($this->getx()+1))
				        {
							echo "</br>Attempting to make an illegal move. Rover has reached the end of the grid. </br>";
											
						}else{
				            $this->setx($this->getx()+1);
				        }
				    }    
				        echo  $this->display()." </br>";
			        break;
			        
			    case "S":

			        if($this->checkCollision()==true)
				        {
				        
				    	if(0 > ($this->gety()-1))
				        {
							echo "</br>Attempting to make an illegal move. Rover has reached the end of the grid. </br>";
						
						}else{
							$this->sety($this->gety()-1);
						}
				    }
						echo  $this->display()." </br>";
			        break;
			        
			    case "W":
		       
			        if($this->checkCollision()==true)
			        {
			        
				         if(0 > ($this->getx()-1))
				        {
							echo "</br>Attempting to make an illegal move. Rover has reached the end of the grid. </br>";
						
						}else {
				             $this->setx($this->getx()-1);
				        }
			         }   
			        echo  $this->display()." </br>";
			        break;
		}	
		
	}	

	//This function handles switching directions
    public function switchDirection($switch_value)
    {
				
				switch ($switch_value) 
				{
				    case "L":
				      
				        $this->switchLeft(); 
				    	break;
				    case "R":
				     
				        $this->switchRight();
				    	break;	
			   }
	
	}

	//This is turning left	
	public function switchLeft()
	 {
	 		switch ($this->getdirection()) 
	 		{
			    case "N":
			       $this->setdirection("W");
			       echo  $this->display()." </br>";
			        break;
			    case "E":
			        $this->setdirection("N");
			        echo  $this->display()." </br>";
			        break;
			    case "S":
			        $this->setdirection("E");
			        echo  $this->display()." </br>"; 
			        break;
			    case "W":
			        $this->setdirection("S");
			        echo  $this->display()." </br>"; 
			        break;
	 	
	 		}
	 
	 }
	
	// This is turning right
	 function switchRight()
	 {
	 		switch ($this->getdirection()) 
	 		{
			    case "N":
			       $this->setdirection("E");
			       echo  $this->display()." </br>";
			        break;
			    case "E":
			        $this->setdirection("S");
			        echo  $this->display()." </br>";
			        break;
			    case "S":
			        $this->setdirection("W");
			        echo  $this->display()." </br>";
			        break;
			    case "W":
			        $this->setdirection("N");
			        echo  $this->display()." </br>";
			        break;
			}
	 }
	
	
	function checkCollision()
	{

      

		switch ($this->getdirection()) 
		{
	 	 
			    case "N":
			       
			       //Check if there is an obsicle above the possible move
			        foreach($_SESSION['RoverCollection'] as $rover)
			        {
						if(($rover->getx() == $this->getx()) && (($rover->gety()) == ($this->gety()+1)))
						{
							echo "</br>There is another rover in your way. Moving was not possible.";
						return FALSE;
						break;
						}
							
						
					}
			        return true;
					break;
			    case "E":
			      //  echo "Moving One Space East </br>";
			      
			      
			      //Check if there is an obsicle to the right of the possible move
			        foreach($_SESSION['RoverCollection'] as $rover)
			        {
			        
						if(($rover->gety() == $this->gety()) && (($rover->getx()) == ($this->getx()+1)))
						{
							echo "</br>There is another rover in your way. Moving was not possible.";
						return FALSE;
						break;
						}
					}
		         return true;
					break;
			    case "S":
			     
			     //Check if there is an obsticle at the bottom of the possible move
			           foreach($_SESSION['RoverCollection'] as $rover)
			        {
						if(($rover->getx() == $this->getx()) && (($rover->gety()) == $this->gety()-1))
						{
							echo "</br>There is another rover in your way. Moving was not possible.";
						return FALSE;
						break;
						}
					}
					 return true;
					break;
			        
			    case "W":
			       
			       
			          foreach($_SESSION['RoverCollection'] as $rover)
			        {
			        	
			        	
			        	
						if(($rover->gety() == $this->gety()) && (($rover->getx()) == $this->getx()-1))
						{
							echo "</br>There is another rover in your way. Moving was not possible.";
						return FALSE;
						break;
						}
					}
			         return true;
					break;
		}	
		
	
	}

		
}


?>
