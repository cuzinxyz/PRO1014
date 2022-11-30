$(document).ready(function() {
   
    $("#search").keyup(function() {
        var search = $('#search').val();
        //Validating, if "name" is empty.
        if (search == "") {
            $("#display").html("");
        }
        else {
            //AJAX is called.
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    search: search
                },
                success: function(html) {
                    console.log(html);
                    $("#searchResult").html(html);
                }
            });
        }
    });

})