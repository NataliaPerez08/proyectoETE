$.ajax({
    type: "POST",
    url:"../dynamics/php/index.php",
    data: $("#form").serialize(),
    success: function(data){
        //console.log("idn: "+data);
        $("#prm").html(data);
    }
});


function register(){
    console.log("d")
}

$("#res").click(register)