# Mars-Rover

Challenge Discription:
A squad of robotic rovers are to be landed by NASA on a plateau on Mars.  This plateau, which is curiously rectangular, must be navigated by the rovers so that their on board cameras can get a complete view of the surrounding terrain to send back to Earth.  A rover's position is represented by a combination of an x and y co-ordinates and a letter representing one of the four cardinal compass points. The plateau is divided up into a grid to simplify navigation. An example position might be 0, 0, N, which means the rover is in the bottom left corner and facing North.  In order to control a rover, NASA sends a simple string of letters. The possible letters are 'L', 'R' and 'M'. 'L' and 'R' makes the rover spin 90 degrees left or right respectively, without moving from its current spot.  'M' means move forward one grid point, and maintain the same heading.

Developer Assumpions for the problem:
1) If the next move for the rover is not possible (due to collision with other rover or edge of the grid is reached), that move will be skipped.

Installation:

1) In your Web Server (e.g. XXAMP) make sure you have PHP4 or higher installed.
2) To install simply copy/upload the Rover Folder into the "public_html" or "htdocs" folder of your web environment.
3) On your browswer, call up the landing page by using the UR: "www.[*Your Environment e.g. localhost*]/Rover"


Running the Rover:

1) Create an input file similar to the one described in https://code.google.com/archive/p/marsrovertechchallenge/
example:
5 5   

1 2 N

LMLMLMLMM

3 3 E

MMRMMRMRRM

Input file explained:
1) The first line of input is the upper-right coordinates of the plateau, the lower-left coordinates are assumed to be 0,0.

2) The rest of the input is information pertaining to the rovers that have been deployed. Each rover has two lines of input. The first line gives the rover's position, and the second line is a series of instructions telling the rover how to explore the plateau.

The position is made up of two integers and a letter separated by spaces, corresponding to the x and y co-ordinates and the rover's orientation.

3) Each rover will be finished sequentially, which means that the second rover won't start to move until the first one has finished moving.

4) Only one grid is allowed per input file!


Expected Output Example:

Rover succesfully loaded.
The initial position:
1 2 N
1 The move L results in position: 1 2 W

2 The move M results in position: 0 2 W

3 The move L results in position: 0 2 S

4 The move M results in position: 0 1 S

5 The move L results in position: 0 1 E

6 The move M results in position: 1 1 E

7 The move L results in position: 1 1 N

8 The move M results in position: 1 2 N

9 The move M results in position: 1 3 N

Rover Final location:
1 3 N


Rover succesfully loaded.
The initial position:
3 3 E
1 The move M results in position: 4 3 E

2 The move M results in position: 5 3 E

3 The move R results in position: 5 3 S

4 The move M results in position: 5 2 S

5 The move M results in position: 5 1 S

6 The move R results in position: 5 1 W

7 The move M results in position: 4 1 W

8 The move R results in position: 4 1 N

9 The move R results in position: 4 1 E

10 The move M results in position: 5 1 E

Rover Final location:
5 1 E

Output Explained:
1) Line one will indicate whether the rover was loaded successfully or not.
2) Let next lines will log the journey the rover took
3) Finally the final location of the rover is shown


Desclaimer: I downloaded, and modified the template used for the presentation. I use this template under the free use licence of w3layouts.
