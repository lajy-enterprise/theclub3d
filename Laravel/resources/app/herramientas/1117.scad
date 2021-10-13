/////////////////////////
name = "Alex"; // primera capital
height= 20;
long= 50 ; 
thicknessb= 3 ;
thicknessn= 5 ;
//use<C:/Users/lo36p/Desktop/The club3D/1/diver codes/fuentes/NothingYouCouldDo-Regular.ttf>
//font = "NothingYouCouldDo-Regular";
////////////////////////

$fn = 74;

linear_extrude(height = thicknessb) 
{
offset(2.3)
    resize([long,height,thicknessb])
    text(name, size = long, direction = "ltr",  spacing = 1 );
}

color("red")
translate([0,0,thicknessb])
linear_extrude(height = thicknessn)
{
    offset(-.3){
resize([long,height,thicknessn])
    text(name, size = long, direction = "ltr",  spacing = 1 );
    }
}

difference()
{
translate([0,0,thicknessb])
linear_extrude(height = thicknessn) 
{
offset(2.3)
    resize([long,height,thicknessn])
    text(name, size = long, direction = "ltr",  spacing = 1);
}
translate([0,0,thicknessb])
linear_extrude(height = thicknessn) 
{
offset(1)
    resize([long,height,thicknessn])
    text(name, size = long, direction = "ltr",  spacing = 1);
}
}

////////// ojo
difference()
{
hull()
{
translate([2,height/2,0])
cylinder(r = 4 , h =thicknessb);

translate([-3,height/2,0])
cylinder(r = 4 , h =thicknessb);
}

translate([-3,height/2,-1])
cylinder(r = 2 , h =thicknessb+thicknessn);

}
