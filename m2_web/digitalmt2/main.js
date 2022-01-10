$(document).ready(function () {  

    $("#stat").load("status.php");

    $.history.init(pageload);      
    $('a[rel=loader]').click(function () {  
        var hash = this.href;  
        hash = hash.replace(/^.*#/, '');  
        $.history.load(hash);
        $('#content').hide();  
        getPage();  
        return false;  
    });   
});  
      
  
function pageload(hash) {  
    if (hash) getPage();
}  
          
function getPage() {  
    var data = 's=' + document.location.hash.replace(/^.*#/, '');  
	var data2_1 = document.location.hash.replace(/^.*#*&/, '');
	var data2_2 = document.location.hash.replace(/^.*#/);
	var data2 = data2_2.replace("&"+data2_1,'').replace("undefined","");
    $.ajax({   
        url: "page.php",    
        type: "GET",          
        data: data,       
        cache: false,  
        success: function (html) { 
			$('#clearcenter').html("");
            $('#clearcenter').hide(); 
            $('#clearcenter').html(html);
            $('#clearcenter').fadeIn('slow');  
			
        }         
    });  
} 

function refreshServerStatus() {
	$('#status').html("<center><img src='img/loader.gif' /></center>");
	$.ajax({
		url: "status.php",
		type: "GET",
		data: "",
		cache: false,
		success: function (html) {
			$('#status').html(html);
		}
	});
}