/////////////
text1= "love";// palabra
height= 100; 
long= 250; 
thickness= 15 ;
dist_pared =5;
dist_base = 3;
///////////
use<fonts/DancingScript-VariableFont_wght.ttf>

//p = dist_pared/2;
p = dist_pared;
$fn = 74;

difference()
{

color("blue")
linear_extrude(thickness)
{
offset(r = p)
resize([long,height,thickness])
text(text1, size = 50, font= "DancingScript-VariableFont_wght");
 
}

translate([0,0,dist_base])
linear_extrude(thickness)
{
resize([long,height,thickness])
text(text1, size = 50, font= "DancingScript-VariableFont_wght");
 
}
}

