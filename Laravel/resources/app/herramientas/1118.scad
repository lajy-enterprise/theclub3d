/////////////////////////
name = "Zac"; // primera capital
height= 10; 
long= 30;
thicknessb= 6 ;
thicknessn= 2 ;
////////////////////////

$fn = 74;

difference()
{
linear_extrude(height = thicknessb+thicknessn) 
{
offset(2.8)
    resize([long,height,thicknessb+thicknessn])
    text(name, size = long, direction = "ltr",  spacing = 1 );
}

color("red")
translate([0,0,thicknessb])
linear_extrude(height = thicknessn)
{
resize([long,height,thicknessn])
    text(name, size = long, direction = "ltr",  spacing = 1 );
}
}


difference()
{
hull()
{
translate([0,height/2,0])
cylinder(r = 4 , h =thicknessb);

translate([-4,height/2,0])
cylinder(r = 4 , h =thicknessb);
}

translate([-4,height/2,-1])
cylinder(r = 2 , h =thicknessb+thicknessn);

}