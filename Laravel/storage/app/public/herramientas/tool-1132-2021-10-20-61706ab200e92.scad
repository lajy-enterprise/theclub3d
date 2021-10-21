////////////////////
text1 ="GAMER ZONE";
height= 30; 
long= 140;
thicknessb= 7 ;
use<fonts/fonts.scad>
font = "FredokaOne-Regular";
/////////////////////

resize(newsize=[long,height,0])
linear_extrude(thicknessb)
text (text1,font =font);