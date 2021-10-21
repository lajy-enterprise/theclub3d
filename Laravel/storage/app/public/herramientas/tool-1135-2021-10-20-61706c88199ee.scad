///////////////////////
text1= "Feliz dia";
height= 17; 
long= 70; 
thicknessb= 5 ;//mayor a 3 
use<fonts/fonts.scad>
font = "Minecraftia";
/////////////////////

$fn = 74;

difference()
{
union()
     {
linear_extrude(height = thicknessb) 
{
offset(r = .5)
    resize([long,height,thicknessb])
    text(text1, size = long, direction = "ltr",  spacing = 1,font = font );
}
color("green")
translate([0,0,thicknessb-2.7])
linear_extrude(height = 2.7) 
{
offset(r =2.5)
    resize([long,height,thicknessb])
    text(text1, size = long, direction = "ltr",  spacing = 1,font = font );
}
}

color("red")
translate([0,0,0-1])
linear_extrude(height = thicknessb+2) 
{
offset(r = .0100)
    resize([long,height,thicknessb])
    text(text1, size = long, direction = "ltr",  spacing = 1,font = font );
}}




