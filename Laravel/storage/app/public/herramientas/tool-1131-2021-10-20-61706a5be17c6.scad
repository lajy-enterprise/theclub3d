//////////////////
k = "4.svg";
x =55;
y =70;
z =15;
split = 6;
base = 3 ;
////////////////

//j = split /2;


module svg_m ()
{


translate([0,0,0])
linear_extrude(height = z)
    offset(split)
    resize(newsize = [x,y,z])
		import(file = k); 
}

difference(){
svg_m ();

color("red")
translate([0,0,base ])
linear_extrude(height = z)
resize(newsize = [x,y,z])
		import(file = k);
}
