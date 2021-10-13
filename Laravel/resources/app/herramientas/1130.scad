//////////////////
k = "66.svg";
x =80;
y =80;
z =17;
////////////////

resize(newsize = [x,y,z])
linear_extrude(height = 10)
		import(file = k);
        
//hull()
//{
//resize(newsize = [x,y,5])
//linear_extrude(height = 5)
//		import(file = k);
        
//}