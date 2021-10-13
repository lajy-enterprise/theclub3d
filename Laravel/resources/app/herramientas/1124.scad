////////////
x= 90;
z = 60;
hoyo_agua = 6; // diametro
/////////////
hoyos = 6; // diametro
dist_pared =5;

/////////////

dim_2 = x-dist_pared;
dis_2 = dist_pared/ 2;


j = dim_2/ 3 ;
k=dim_2/8;


p1 = [x/2,(x/2),0];
p2 = [x/2,(x/2),-1];

/////////cubo bace 
c1x =dim_2;
c1y =(dim_2/2)+k ;//-3
c1z = dist_pared+2;
p3 = [dis_2,dis_2,-2];
/////////cubo altura
c2x =dim_2;
c2y =(dim_2/2);
c2z = dist_pared+3;
p4 = [dis_2,dis_2,z-dist_pared-1];

z2c = z /2;
p5 = [(x/2),(x/2),(z/2)]; // (z/2)

p6=[j,x/2,-2];
p7=[x-j,x/2,-2];

$fn = 74;

module f_C()
{
    difference()
    {
translate(p2)
    color("blue")
cylinder(h = z+2 ,d =dim_2,$fn =6);
    
translate(p3)
    color("red")
cube([c1x,c1y,c1z]);
    
translate(p4)
    color("red")
cube([c2x,c2y,c2z]);
    }
    
    
  translate(p5)
   rotate([90,0,0])
  cylinder(h =(x/2), d=hoyo_agua  );  
  
  translate(p6)  
  cylinder(h =z/2, d=hoyos  ); 
   
   translate(p7)  
  cylinder(h =z/2, d=hoyos  ); 
  
}

difference()
{
translate(p1)
cylinder(h = z ,d =x,$fn =6);
f_C();
}


//text1 = "opcion ";
//fond
