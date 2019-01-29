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
	
	// method declaration   
	public function display()
	{
		echo "</br>". $this->getx()."  ".$this->gety()."  ".$this->getdirection(). "</br>";
	}
		
	// move method. Depending on the direction that the rover is facing, this method moves it one space forward.			
	public function move()
	{
		
		switch ($this->properties['direction']) 
		{
	 	 
			    case "N":
			       // echo "Moving One Space North </br>";
			       
			        if($this->bounds["y"]< ($this->properties['y']+1))
			        {
						echo "</br>Attempting to make an illigal move. Rover has reached the end of the grid. </br>";
										
					}else
					{
						$this->sety(++$this->properties['y']);
					}
			        echo  $this->display()." </br>";
			        break;
			        
			    case "E":
			      //  echo "Moving One Space East </br>";
			  
			  	   if($this->bounds["x"]< ($this->properties['x']+1))
			        {
						echo "</br>Attempting to make an illigal move. Rover has reached the end of the grid. </br>";
										
					}else{
			            $this->setx(++$this->properties['x']);
			        }
			             
			        echo  $this->display()." </br>";
			        break;
			        
			    case "S":
			        //echo "Moving One Space South </br>";
			        
			    	if(0 > ($this->properties['y']-1))
			        {
						echo "</br>Attempting to make an illigal move. Rover has reached the end of the grid. </br>";
					
					}else{
						$this->sety(--$this->properties['y']);
					}
			        
					echo  $this->display()." </br>";
			        break;
			        
			    case "W":
			       // echo "Moving One Space West </br>";
			        
			         if(0 > ($this->properties['x']-1))
			        {
						echo "</br>Attempting to make an illigal move. Rover has reached the end of the grid. </br>";
					
					}else {
			             $this->setx(--$this->properties['x']);
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
	 		switch ($this->properties['direction']) 
	 		{
			    case "N":
			       $this->setdirection("W");
			     
			        break;
			    case "E":
			        $this->setdirection("N");
			        
			        break;
			    case "S":
			        $this->setdirection("E");
			         
			        break;
			    case "W":
			        $this->setdirection("S");
			         
			        break;
	 	
	 		}
	 
	 }
	
	// This is turning right
	 function switchRight()
	 {
	 		switch ($this->properties['direction']) 
	 		{
			    case "N":
			       $this->setdirection("E");
			        break;
			    case "E":
			        $this->setdirection("S");
			        break;
			    case "S":
			        $this->setdirection("W");
			        break;
			    case "W":
			        $this->setdirection("N");
			        break;
			}
	 }
	
		
		
}


?>