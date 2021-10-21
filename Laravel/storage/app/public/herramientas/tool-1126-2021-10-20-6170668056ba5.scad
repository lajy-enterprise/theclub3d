////////////////////////////////
sc = "s1.svg";
thicknessb= 2 ;
thicknessc= 2 ;
///////////////////////////////
height= 20; 
long= 70 ; 


p1=[2.5,2.5,0];
p2=[2.5,(height-8),0];
p3=[(long-2.5),2.5,0];
p4=[(long-2.5),(height-8),0];
p5=[3,7.5,-1];

$fn = 74;

x =long-5;
y =height-8;

color("red")
translate([1,-3,thicknessb])
resize(newsize = [x,y,thicknessc])
{
linear_extrude(height = 1)
		import(file = sc);
}

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