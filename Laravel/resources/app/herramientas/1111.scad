//////////////////////////////////////
name = "Alejandro"; 
height= 23;
long= 75 ; 
thicknessb= 7;
thicknessn= 2 ;
use<C:/Users/lo36p/Desktop/The club3D/1/diver codes/fuentes/Gothica-Bold.ttf>

font = "Gothica-Bold";
////////////////////////////////////



$fn = 50;

r = 2 ;

p1 =  [-r-2.6,r,0];
p2 =  [-r-2.6,height-r,0];
p3 = [long-r-2.6,r,0];
p4 =[long-r-2.6,height-r,0];

p5 =[0,+3,thicknessb];


difference()
{
hull()
{
    translate(p1)
    cylinder(r = r, h = thicknessb);
    translate(p2)
    cylinder(r = r, h = thicknessb);
    translate(p3)
    cylinder(r = r, h = thicknessb);
    translate(p4)
    cylinder(r = r, h = thicknessb);  
}
translate([-2.5,(height/2),0])cylinder(d = 4, h = thicknessb);
}

translate(p5)
linear_extrude(thicknessn)
offset(.001)
{
resize(newsize=[(long-r-4),(height-3),thicknessn])
text(name, size = 1,font = font );
}