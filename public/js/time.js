$(document).ready(function() {

    $("#date").change(function(){
        const date = $("#date").val();
        $.ajax({
            url: "ajax.php?gettime",
            type: "POST",
            data: {
                date: date
            },
            cache: false,
            success: function(data) {
                console.log(data);
                $("#list_time").html(data);
            }
        })
    })

})