///////////////////
name = "Michelle"; 
height= 21; 
long= 63; 
thicknessb= 4 ;
thicknessn= 10 ;
use<fonts/fonts.scad>
font = "Caveat-VariableFont_wght";
//////////////////////



$fn = 74;
x1 = height/2;
y1 = long -(2*x1);


p1 =[0,x1,0];
p2 =[y1,x1,0];
p3 =[0-(x1/1.8),x1,0];
p4 =[1-(x1/2),3,thicknessb];

difference()
{
    
hull()
{
translate(p1)
cylinder(h=thicknessb,r = x1 ,center = false);

translate(p2)
cylinder(h=thicknessb,r = x1 ,center = false);
}

translate(p3)
cylinder(h=thicknessb,r = 2 ,center = false);
}

translate(p4)
linear_extrude(thicknessn)
offset(.001)
{
resize(newsize=[long-x1-3,height-6,thicknessb])
text(name, size = 1,font = font );
}