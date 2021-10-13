/////////////////////
name = "Gerard and Sara";  
height= 24; 
long= 78; 
thicknessb= 12 ;
use<C:/Users/lo36p/Desktop/The club3D/1/diver codes/fuentes/CoveredByYourGrace-Regular.ttf>
font = "CoveredByYourGrace-Regular";
///////////////




$fn = 74;
p1 =[long-height,0,0];
p2 =[(height/2),(height/2),0];
p3 = [5,(height/2),0];
p4=[6,(height/2)-1,4];


difference()
{
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
linear_extrude(thicknessb)
offset(.001)
{
resize(newsize=[long-8,height-6,thicknessb])
text(name, size = 1,valign = "center",font = font);
 }
}