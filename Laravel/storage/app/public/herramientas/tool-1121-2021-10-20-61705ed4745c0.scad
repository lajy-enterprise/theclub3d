//////////////////
name = "Hilary";
text1 = "1010101010";
height= 30; 
long=45; 
thicknessb= 3;
thicknessn= 3;

use<fonts/fonts.scad>
font = "Pacifico-Regular";
///////////////////

k = "h1.svg";
$fn = 74;

module pt4()
{
difference()
{  

translate([0,0,0])
linear_extrude(height = thicknessb+thicknessn)
offset(r=1.5) 
resize(newsize = [50,30,thicknessb])
import(file = k);
    
    
color("green") 
translate([0,0,thicknessb])  
resize(newsize = [50,30,thicknessb+thicknessn])
linear_extrude(height = thicknessb)
import(file = k);
    


}


color("red")
translate([5,30/2,thicknessb])
resize([38,30/4,thicknessn])
linear_extrude(height = thicknessn) 
text(name, size = 50, direction ="ltr",spacing = 1,font = font );

color("red")
translate([5,7,thicknessb])
linear_extrude(height = thicknessn) 
offset(.001)
{
resize([38,30/5,thicknessn])
text(text1, size = 50, direction ="ltr",spacing = 1,font = font );
}

}

resize(newsize = [long,height,thicknessb+thicknessn])
pt4();