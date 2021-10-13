///////////////////////////
text1= "Shady";
thicknessn=7;
dist= 48;

//////////////////////////
use<C:/Users/lo36p/Desktop/The club3D/1/diver codes/fuentes/Minecraftia.ttf>
font = "Minecraftia";



$fn = 64;
gro = 7;
p1 = [5,50,0];
p2 = [5,5,0];
p3 = [70-5,5,0];
p4 = [70-5,50,0];
p5 = [70/2,30,0];
p6 = [15,40,0];
p7 = [70-15,40,0];
p8 =[35,-30,gro];
p9=[-20,-100,-1];

p10=[-5+3,0+3,gro+dist];
p11=[-5+3,20-3,gro+dist];
p12=[75-3,0+3,gro+dist];
p13=[75-3,20-3,gro+dist];

gro2 = 4;
p14 =[-5+3,0+3,11+dist ];

difference()
    {
hull()
{
    translate(p1)
    cylinder(h = gro, r = 5,center = false );
    
    translate(p2)
    cylinder(h = gro, r = 5,center = false );
    
     translate(p3)
    cylinder(h = gro, r = 5,center = false );
    
    translate(p4)
    cylinder(h = gro, r = 5,center = false );
    
}
    //// tornilos 
    translate(p6)
    cylinder(h = gro, d = 3,center = false );
    
    translate(p7)
    cylinder(h = gro, d = 3,center = false );
}



difference()
{
translate(p8)
cylinder(h = dist, r = 50,center = false);
    
translate(p9)
cube([120,100,dist+10]);
}

hull()
{
    translate(p10)
    cylinder(h = gro2, r = 5,center = false );
    
    translate(p11)
    cylinder(h = gro2, r = 5,center = false );
    
     translate(p12)
    cylinder(h = gro2, r = 5,center = false );
    
    translate(p13)
    cylinder(h = gro2, r = 5,center = false );
    
}

translate(p14)
linear_extrude(thicknessn)
{
offset(0.001)
{
resize(newsize=[70,14,thicknessn])
text(text1, size = 1, font = font );
    }
    }
