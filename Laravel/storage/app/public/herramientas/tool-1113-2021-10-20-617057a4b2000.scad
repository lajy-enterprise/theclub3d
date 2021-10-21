/////////////////////
name = "JUAN EDU"; // CAPITAL 
height= 20; 
long= 56 ; 
thicknessb= 5 ;
thicknessn= 2 ;

use<fonts/fonts.scad>
font = "Pacifico-Regular";
////////////



p1=[4,(9/2),0];
k = (height/2)-3;

$fn = 74;

difference()
{
union()
{
cube([long,height,thicknessb],center=false);
translate([0,height/2,0])
cylinder(h=thicknessb, r=(height/2), center=false) ; 
}

intersection()
{
translate([0,height/2,0])
cylinder(h=thicknessb, r=k, center=false) ;
translate([-k,3,0])
cube([k,k*2,thicknessb],center=false);
}
}

translate([0,3,thicknessb])
linear_extrude(thicknessn)
offset(.001)
{
resize(newsize=[long-3,height-6,thicknessb])
text(name, size = 1, font = font );

}

