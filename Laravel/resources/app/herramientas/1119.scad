/////////variables a modificar 
name = "Iram"; // primera capital
height= 30; 
long= 85 ; 
thicknessb= 5 ;
thicknessn= 3 ;
/////////////


///// inicio del programa, apartir de aqui nada se modifica
use<C:/Users/lo36p/Desktop/The club3D/1/diver codes/fuentes/DancingScript-VariableFont_wght.ttf>


$fn = 74;

linear_extrude(height = thicknessb) 
{
offset(3)
    resize([long,height,thicknessb])
    text(name, font = "DancingScript-VariableFont_wght", size = long, direction = "ltr",  spacing = 1 );
}
translate([0,0,thicknessb ])
 color("red")
linear_extrude(height = thicknessn) 
offset(.5)
resize([long,height,thicknessn])
text(name, font = "DancingScript-VariableFont_wght", size = long, direction = "ltr",  spacing = 1 );

difference()
{
hull()
{
translate([long/3,4,0])
cylinder(d = 7 , h =thicknessb);

translate([-4,4,0])
cylinder(d = 7 , h =thicknessb);
}

translate([-4,4,-1])
cylinder(d= 3 , h =thicknessb+2);

}