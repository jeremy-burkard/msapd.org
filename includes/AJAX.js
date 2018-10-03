var xmlhttp = false;

function CreateRequest() {
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else if (window.ActiveXObject) {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	else {
		alert("Your browser does not support XMLHTTP!");
	}
}

function LoadGallery(gallery) {
	var galleryid = gallery;
	CreateRequest();

	xmlhttp.onreadystatechange=function() {
		if(xmlhttp.readyState==4) {
			document.getElementById("slideshow").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","AJAXPages/loadGallery.php?galleryid="+galleryid,true);
	xmlhttp.send(null);
}

function AuthenticateUser(UserID, Password) {
	document.getElementById("loginResponseText").innerHTML="Processing...";
	if(UserID=="") {
		document.getElementById("loginResponseText").innerHTML="Please enter your user ID and try again.";
		return false;
	}
	if(Password=="") {
		document.getElementById("loginResponseText").innerHTML="Please enter your password and try again.";
		return false;
	}

	var userid = UserID;
	var password = hex_sha1(Password);
	CreateRequest();
		
	xmlhttp.onreadystatechange=function() {
		if(xmlhttp.readyState==4) {
			if(xmlhttp.responseText=="Verified") {
				window.location="http://localhost/msapd/member";
			}
			else {
				document.getElementById("loginResponseText").innerHTML=xmlhttp.responseText;
			}
		}
	}
	xmlhttp.open("GET","AJAXPages/authenticateUser.php?userid="+userid+"&password="+password,true);
	xmlhttp.send(null);
}

function Logout() {
	CreateRequest();
		
	xmlhttp.onreadystatechange=function() {
		if(xmlhttp.readyState==4) {
			window.location="http://localhost/msapd/member/authenticate.php";
		}
	}
	xmlhttp.open("GET","AJAXPages/logout.php",true);
	xmlhttp.send(null);
}


function SendPassword(UserID) {
	document.getElementById("passwordResponseText").innerHTML="Processing...";
	var userid = UserID;
	if(userid=="") {
		document.getElementById("passwordResponseText").innerHTML="Please enter your user ID and try again.";
		return false;
	}
	CreateRequest();
		
	xmlhttp.onreadystatechange=function() {
		if(xmlhttp.readyState==4) {
			document.getElementById("passwordResponseText").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","AJAXPages/sendPassword.php?userid="+userid,true);
	xmlhttp.send(null);
}