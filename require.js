
var end = function(x){

      var body = document.body;
      body.innerHTML = x + '<div>Нажмите <a href="index.php">здесь</a>, чтобы вернуться на гланую</div>';
 
}

var addToDb = function(){
   
    var form = document.querySelector('form');
    var formData = new FormData(form);
    
    var request = new XMLHttpRequest();
    
        request.onreadystatechange = function(){
         console.log(request.readyState);   
        if(request.readyState == 4){
           var response = request.responseText;
                end(response);
        }
    }
    
    request.open('POST', 'test.php');
    request.send(formData);
    

};

window.onload = function(){
    if (document.getElementById('formsend')){
        var button = document.getElementById('formsend');
        button.onclick = function(){
        addToDb();
        }
    }
}

