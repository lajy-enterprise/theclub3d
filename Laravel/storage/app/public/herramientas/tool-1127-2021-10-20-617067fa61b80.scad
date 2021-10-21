/////////////////
sc = "s2.svg"; 
thicknessb= 6 ;
//////////////////
height= 20; 
long= 70; 

p1=[2.5,2.5,0];
p2=[2.5,(height-8),0];
p3=[(long-2.5),2.5,0];
p4=[(long-2.5),(height-8),0];
p5=[2.5,7.5,-1];

x =long-5;
y =height-8;


    
$fn = 74;    

difference()
{
difference()
{
    
 hull()
 {
     translate(p1)
     cylinder(h=thicknessb,d = 5);
     translate(p2)
     cylinder(h=thicknessb,d = 5);
     translate(p3)
     cylinder(h=thicknessb,d = 5);
     translate(p4)
     cylinder(h=thicknessb,d = 5);
     
     
 }
 
  translate(p5)
  cylinder(h=thicknessb+2,r = 2);
 }
 
 color("blue")
 translate([1,-3,thicknessb/2])
resize(newsize = [x,y,thicknessb])
 {
linear_extrude(height = 1)
		import(file = sc);
 }
 }
        