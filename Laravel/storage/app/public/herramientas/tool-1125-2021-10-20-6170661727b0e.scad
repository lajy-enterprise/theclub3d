////////////
x= 90;
z = 50;
dist_pared =7;
hoyo_agua = 4; // diametro
/////////////
hoyos = 3; // diametro

p1 = [x/2,(x/2),0];
j = x /3;
k =x/8 ;
p2 =[j,x/2+k,-1];
p3=[x-j,x/2+k,-1];

p4=[x/2,x/2,dist_pared];

p5=[-3,x/2,dist_pared-3];

p6=[x/2,x/2,dist_pared+(hoyo_agua/2)];

$fn = 74;


/// exagon
difference()
{
translate(p1)
color("blue")
cylinder(h = dist_pared ,d =x,$fn =6);

translate(p2)  
cylinder(h =dist_pared+3, d=hoyos  ); 
   
translate(p3)  
cylinder(h =dist_pared+3, d=hoyos  ); 
}
/// triangulo
difference()
{
translate(p4)
cylinder(z-dist_pared,x/2,00,$fn=6);
    
translate(p4)
color("red")
cylinder(z-(dist_pared*2),(x/2)-dist_pared,00,$fn=6);
    
translate(p5)
cube([x+6,x/2,z]); 
 /// agua 
translate(p6)  
rotate([90,0,0])
cylinder(h =x/2, d=hoyo_agua  ); 
}

