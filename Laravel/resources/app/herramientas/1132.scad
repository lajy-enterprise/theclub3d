////////////////////
text1 ="GAMER ZONE";
height= 30; 
long= 140;
thicknessb= 7 ;
use<C:/Users/lo36p/Desktop/The club3D/1/diver codes/fuentes/FredokaOne-Regular.ttf>
font = "FredokaOne-Regular";
/////////////////////

resize(newsize=[long,height,0])
linear_extrude(thicknessb)
text (text1,font =font);