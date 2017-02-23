var target = new Array;
target.push(50.043495);
target.push(14.453175);

function watchPosition() {
	if (navigator.geolocation) {
        var position = navigator.geolocation.watchPosition(locate);
    } else {
      document.getElementById("demo").innerHTML = "Geolocation is not supported by this browser.";
    }
}

function locate(position) {
	var pos = new Array;
	pos["lat"] = position.coords.latitude;
	pos["long"] = position.coords.longitude;
	var dist = getDistance(pos, target);
	var azim = getAzimuth(pos, target);
	$('#demo').html("LAT: "+pos["lat"]+" LONG:"+pos["long"]+" Dist:"+dist+" Azimuth :"+azim);
	sendPosition(pos);
}

Math.radians = function(degrees) {
  return degrees * 0.0174532925199433;
};

Math.degrees = function(rad) {
  return rad * 180 / 3.1415926535897932;
};

function getDistance(pos, target) {
	var b = Math.radians(pos["lat"]);
	var c = Math.radians(target[0]);
	var d = Math.radians(target[0]-pos["lat"]);
	var e = Math.radians(target[1]-pos["long"]);
	var a = Math.sin(d/2) * Math.sin(d/2) +
	        Math.cos(b) * Math.cos(c) *
	        Math.sin(e/2) * Math.sin(e/2);
	var distance = 6371e3 * 2 * Math.atan2(Math.sqrt(a),Math.sqrt(1-a));
	return distance;
}

function getAzimuth(pos, target) {
	var b = Math.radians(pos["lat"]);
	var c = Math.radians(target[0]);
	var y = Math.sin(pos["long"]-target[1]) * Math.cos(c);
	var x = Math.cos(b)*Math.sin(c) -
        Math.sin(b)*Math.cos(c)*Math.cos(pos["long"]-target[1]);
	var azim = Math.degrees(Math.atan2(y, x));
	return azim;
}

function sendPosition(pos) {
    $.ajax({
    	url: './receive.php',
    	type: 'post',
    	data: {
	        user: navigator.appCodeName+navigator.appVersion,
	        lat: pos["lat"],
	        long: pos["long"]},       
   			success: function() {
        
    } 
    	});   
}
watchPosition();