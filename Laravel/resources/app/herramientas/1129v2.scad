///////////
sc = "s3.svg";
////////

difference()
{
stl = "caset1.stl";
translate([0,-26,0])
import(file = stl,convexity = 5);
    
color("red")
translate([9,13,10])
cube([76.8,17,10]);
}

translate([4,10,5])
resize(newsize = [77,14,10])
linear_extrude(height = 5)
		import(file = sc);