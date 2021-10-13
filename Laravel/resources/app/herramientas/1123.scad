/////////////////////////////////
name = "Scott";
text2 ="1010101010";
height= 45; 
long= 45 ; 
thicknessb=5 ;

use<C:/Users/lo36p/Desktop/The club3D/1/diver codes/fuentes/DancingScript-VariableFont_wght.ttf>
font = "DancingScript-VariableFont_wght";
/////////////////////////////

stl = "p4.stl";
$fn = 74;

module pt4 ()
{
difference()
{
rotate([0,180,0])
translate([0,0,-6])
import(file = stl,convexity = 5);

translate([-49,22,1])
linear_extrude(6)
{
resize(newsize=[48,20,6])
text(name, size = 1,font = font);
}

translate([-43,3,1])
linear_extrude(6)
{
resize(newsize=[35,10,6])
text(text2, size = 1,font = font );
}
}
}
resize(newsize=[long,height,thicknessb])
pt4();


//color("blue")
//translate([-49,22,1])
//cube([50,20,6]);


//color("green")
//translate([-45,-2,1])
//cube([41,20,6]);
