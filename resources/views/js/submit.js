    function SubmitFormData(result) {
    var name = $("#name").val();
    var name2 = $("#name2").val();
    var name3 = $("#name3").val();
    var name4 = $("#name4").val();
    var name5 = $("#name5").val();
    var name6 = $("#name6").val();
    var name7 = $("#name7").val();
    var name8 = $("#name8").val();
    var name9 = $("#name9").val();
    $.post("submit4.php", { name:name,name2: name2, name3: name3, name4: name4, name5:name5, name6:name6,name7:name7,name8:name8,name9:name9},//post method used in jquery for post request after that there is this is the data to be send to the server 
     function(data) {// this is the function to be executed when the request succeds 
     $('#'+ result).html(data);
     $('#myForm')[0].reset();
     });

    }


   /*  function SubmitFormData(result,inputname) {
    var name = $("#" + inputname).val();
    $.post("submit4.php", { name:name},//post method used in jquery for post request after that there is this is the data to be send to the server 
     function(data) {// this is the function to be executed when the request succeds 
     $('#'+ result).html(data);
    // $('#myForm')[0].reset();
     });*/