function roadline_tra(roadinfo_path,l) {
	var tra_dir;
	for (var i = 0;i < roadinfo_path.length;i++) {
		
		var sn = roadinfo_path[i];
		if(i != roadinfo_path.length-1) {
			var en = roadinfo_path[i+1];
			tra_dir= getnode_dir(sn.lng,sn.lat,en.lng,en.lat)-Math.PI/2;
			}
		//alert(tra_dir);	
		var sx_offset = Math.cos(tra_dir)*l;
		var sy_offset = Math.sin(tra_dir)*l;
		sn = new AMap.LngLat(sn.lng+sx_offset,sn.lat+sy_offset);
		roadinfo_path[i] = sn;
		
		}
	}
function testfun (ta) {
	var i = ta[1];
	i = 8;
	ta[1]=i;
	}
function getnode_dir(nod1_x,nod1_y,nod2_x,nod2_y) {
	var tra_dir = Math.acos((nod2_x-nod1_x)/Math.sqrt(Math.pow(nod2_y-nod1_y,2)+Math.pow(nod2_x-nod1_x,2)));
	if((nod2_y-nod1_y) < 0)
		tra_dir=0-tra_dir;
	return tra_dir;
	}

