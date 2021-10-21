/////////////
letter= "G";// letra
height= 80; 
long= 80 ;  
thickness= 40 ;
dist_p =6;
dist_b = 7;

use<fonts/Gothica-Bold.ttf>

font = "Gothica-Bold";
///////////
 j = dist_p;

$fn = 74;

difference()
{
linear_extrude(height = thickness) 
{
offset(r = j)
    resize([long,height,thickness])
    text(letter, size = long, direction = "ltr",  spacing = 1,font = font  );
}

color("red")
translate([0,0,dist_b])
linear_extrude(height = thickness) 
{
    resize([long,height,thickness])
    text(letter, size = long, direction = "ltr",  spacing = 1, font = font );
}
}