/***********************************************
* Encrypt Email script- Please keep notice intact
* Tool URL: http://www.dynamicdrive.com/emailriddler/
* **********************************************/
function MailLink(who) {
	var emailriddlerarray='';
	switch (who) {
		case 'PM': emailriddlerarray=[112,105,112,101,109,97,106,111,114,64,109,115,97,112,100,46,111,114,103]; break;
		case 'DM': emailriddlerarray=[100,114,117,109,109,97,106,111,114,64,109,115,97,112,100,46,111,114,103]; break;
		case 'BM': emailriddlerarray=[98,117,115,105,110,101,115,115,109,97,110,97,103,101,114,64,109,115,97,112,100,46,111,114,103]; break;
		case 'WM': emailriddlerarray=[119,101,98,109,97,115,116,101,114,64,109,115,97,112,100,46,111,114,103]; break;
		}
	var encryptedemail=''; //variable to contain encrypted email 
	for (var i=0; i<emailriddlerarray.length; i++) {
		encryptedemail+=String.fromCharCode(emailriddlerarray[i]);
		}
	document.write('<a href="mailto:'+encryptedemail+'?subject=Email from MSAPD.org">'+encryptedemail+'</a>')
	}