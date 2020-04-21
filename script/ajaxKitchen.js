// First initial call
ajaxFunction("View All");

function ajaxFunction(choice)
{
	var httpxml;
	try  {
		// Firefox, Chrome, Opera 8.0+, Safari
		httpxml=new XMLHttpRequest();
	}
	catch (e)  {
		// Internet Explorer
		try    {
			httpxml=new ActiveXObject("Msxml2.XMLHTTP");
		}
	catch (e)    {
			try      {
			httpxml=new ActiveXObject("Microsoft.XMLHTTP");
			}
		catch (e)      {
		alert("Your browser does not support AJAX!");
			return false;
			}
		}
	}
  
	function stateChanged(){
				/*An Ajax http request has 5 states as your reference documents:
				0   = UNSENT  open() has not been called yet.
				1   = OPENED  send() has been called.
				2   = HEADERS_RECEIVED    send() has been called, and headers and status are available.
				3   = LOADING Downloading; responseText holds partial data.
				4   = DONE    The operation is complete. State 4 means that the request had been sent, 
					the server had finished returning the response and the browser had finished downloading 
					the response content. So, it is right to say that the AJAX call has completed.*/
		if(httpxml.readyState==4){ 
            //alert(httpxml.responseText);
            
			//var myObject = JSON.parse(httpxml.responseText);

			//var state1=myObject.value.state1;

            document.getElementById("your_div").innerHTML=httpxml.responseText;

			//////////////////////////

			//var city1=myObject.value.city1;
			//alert(city1); 
			///////////////////////////
			//document.getElementById("txtHint").innerHTML=myObject.value.city1;
		}
	}

    //
    httpxml.open("GET","./products/kitchenGet.php?q="+choice,true);
    httpxml.send();
	httpxml.onreadystatechange=stateChanged;

}