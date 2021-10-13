/////////////
name = "OSIEL C"; // CAPITAL 
height=20; 
long= 45; 
thicknessb= 6 ;


use<C:/Users/lo36p/Desktop/The club3D/1/diver codes/fuentes/AbrilFatface-Regular.ttf>

font = "AbrilFatface-Regular";
///////////////////////////

p1=[4,(9/2),0];

$fn = 50;


translate([0,7,0])
linear_extrude(thicknessb)
offset(.001)
{
resize(newsize=[long,height,thicknessb])
text(name, size = 1, font = font );
}
difference()
{ 
cube([long+2,9,thicknessb],center=false);
translate(p1)
cylinder(h=thicknessb, r=2, center=false) ;   
}