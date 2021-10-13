///////////
letter= "P"; // MAYUscula
height= 50;
long= 55 ; 
thicknessb= 50 ;
dis_p =5 ;
hoyos = 3; // diametro
hoyo_agua = 5; // diametro
use<C:/Users/lo36p/Desktop/The club3D/1/diver codes/fuentes/New Telegraph.ttf>
font = "New Telegraph";
//////////////////


k = long / 3 ;


y1  = height - (hoyo_agua+4); // cuatro 

x1 = long -(dis_p*2);
y2 = height;
z1 = thicknessb -(dis_p*2);
$fn = 74;

difference()
{

union()
{
 difference()
    {
translate([0,0,thicknessb-10])
rotate([10,0,0])
linear_extrude(14)
resize(newsize=[long,height,thicknessb ])
text(letter, size = 1,font = font );
 // bajo 
translate([0,-50,0])
color("blue")
cube([long +20,50,thicknessb+30]);
         
    }
    
///cuadro ex
translate([0,0,0])
 color("green")
cube ([long,y1,thicknessb]);
}


//cuadro in
translate([dis_p,dis_p,dis_p])
color("red")
cube ([x1 ,y2,z1]);
    
translate([long/2,height/2,thicknessb/2])
rotate([90,0,0])
cylinder(h =height, d=hoyo_agua );     
 
}
///tornilllos 
difference()
{
translate([0,y1,0])
cube([long,hoyo_agua+4,dis_p]);

translate([k-(hoyos/2),y1+3,-1]) //3
color("blue")
cylinder(h =dis_p+3, d=hoyos  ); 

translate([long-(k-(hoyos/2)),y1+3,-1])  // 3 
color("blue")
cylinder(h =dis_p+3, d=hoyos  );
   
}
