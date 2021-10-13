/////////////////////////////////
name = "TOBY"; // mayuscula 
height= 26; 
long= 40; 
thicknessb= 7;
/////////////////////////////

svg = "h1.svg";

p1=[5.5,7.5,0];
x = 50- 8.3-2;
y = 30 - 10-4;

$fn = 74;
module tag_3()
{
    difference()
    {
translate([0,0,0])
linear_extrude(height = thicknessb)
resize(newsize = [50,30,thicknessb])
import(file = svg);
    
        
       color("red")   
translate ([6,8,-1])   
cube([38,15,thicknessb+3]);

    }

    
    
translate(p1)
linear_extrude(thicknessb)
resize(newsize=[x-2,y+1,6])
text(name, size = 1);
    
    
}
resize(newsize = [long,height,thicknessb])
tag_3();