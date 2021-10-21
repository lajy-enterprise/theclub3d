///////////
name = "Alan Garcia";  
height= 25; 
long= 65; 
thicknessb= 8 ;
thicknessn= 1 ;
use<fonts/fonts.scad>
font = "Kalam-Regular";
/////////////



$fn = 74;
p1 =[long-height,0,0];
p2 =[(height/2),(height/2),0];
p3 = [5,(height/2),0];
p4=[6,(height/2)-1,thicknessb];


difference()
{
    
hull()
{
    translate(p1)
    cube([height,height,thicknessb]);
    
    translate(p2)
    cylinder(h = thicknessb,d=height);
    
}

translate(p3)
cylinder(h = thicknessb,d =3);

}

translate(p4)
linear_extrude(thicknessn)
offset(.001)
{
resize(newsize=[long-8,height-6,thicknessb])
text(name, size = 1,valign = "center",spacing =.9,font = font);
}

