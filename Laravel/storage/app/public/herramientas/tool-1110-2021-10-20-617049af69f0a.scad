/////////variables a modificar 
name = "SOFIA "; // CAPITAL 
height= 15; // min 15
long= 50; // min 30 
thicknessb= 7 ;
/////////////

///// inicio del programa, apartir de aqui nada se modifica
y1 = height /2;
x1 = long - 5 ;
y2 = height - 4 ;

$fn = 50;

translate([-2,y1,0])
{
difference() 
{
cylinder(h=thicknessb, r=4, center=false) ;
cylinder(h=thicknessb, r=2, center=false) ;
}
}


difference()
{
cube([long,height,thicknessb],center=false);
translate([3,2,0])cube([x1,y2,thicknessb]);
}



translate([3.2,1.7,0])
linear_extrude(thicknessb)
resize(newsize=[(x1-1.5),(y2+1),thicknessb])
text(name, size = 1 );


