window.onload = function(){
    var arr = $$(".mail1");
    var inbox = $("inbox");
	var composeButton = $("compose");
    for (var i = 0; i<arr.length; i++){
        inbox.className = "tab";
        arr[i].onclick = function(){
            $("inlay").style.display = "none";
            $("email").className = "";
            new Ajax.Request('emails.php',{
        	method: 'get',
        	parameters: {id: this.id },
		    onSuccess: displayMessage,
		    onFailure: failureFunction});
        };
    }
    inbox.onclick = function(){
        $("email").className = "hide";
        $("inlay").style.display = "block";
        $("com").className = "hide";
        inbox.className = "tab1";
        composeButton.className = "tab";
        window.location.reload();
    }
    
    function displayMessage(response){
        $("email").innerHTML = response.responseText;
    }
    
    function failureFunction(response){
        alert("server error");
    }
	composeButton.onclick = function(){
        $("inlay").style.display = "none";
        $("com").className = "";
        composeButton.className = "tab1";
        inbox.className = "tab";
	};
};