//////////////////
text1 = "MOM"; //mayus
height= 40;
long= 100 ; 
thicknessb= 60 ;
use<fonts/fonts.scad>
font = "AbrilFatface-Regular";
//////////////////


p1=[5,4,10];
p2=[9,10,15];
p3 = [60,12,45];

$fn = 74;

c_size_1 = [140-8,70-6,90 -20];
c_size_2 = [140-16,70-10,90 -30];

module p_t ()
{
difference()
{
difference()
{
union()
    {
linear_extrude(90)
resize(newsize=[140,70,90 ])
text(text1, size = 1, font = font);

translate(p1)
color ("blue")
cube(c_size_1);
}
translate(p2)
cube(c_size_2);
}
translate(p3)
rotate([90,0,0])
cylinder(h=20, d  = 7);
}
}
resize(newsize=[long,height,thicknessb])
p_t();