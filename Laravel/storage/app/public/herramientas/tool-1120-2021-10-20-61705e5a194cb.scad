//////////////////
name = "Max";
text1 = "1010101010";
height= 28; 
long=45; 
thicknessb=3;
thicknessn= 4;

use<fonts/fonts.scad>
font = "Pacifico-Regular";
///////////////////

$fn = 74;
x = 50- 8.3;
y = 30 - 10;
y2 = y/2;
p2 =[4.2,16.8,thicknessb];
p3 =[4.2,6,thicknessb];
svg = "h1.svg";

z =thicknessb /2;
module bone ()
{
translate([0,0,z])
linear_extrude(height = z)
resize(newsize = [50,30,z])
import(file = svg);

translate([0,0,0])
linear_extrude(height = z)
offset(1)
resize(newsize = [50,30,z])
import(file = svg);
    
////////////////
translate(p2)
linear_extrude(thicknessn)
offset(.001)
{
resize(newsize=[x-2,y2-2,thicknessn])
text(name, size = 1, font = font  );
}

translate(p3)
linear_extrude(thicknessn)
offset(.001)
{
resize(newsize=[x-1,y2-2,thicknessn])
text(text1, size = 1, font = font  );
}
}

resize([long,height,thicknessb+thicknessn])
bone();
