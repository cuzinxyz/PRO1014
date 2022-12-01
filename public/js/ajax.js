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
                // console.log(data);
                $("#list_time").html(data);
            }
        })
    })

    // lấy thời gian người dùng chọn sau đó đổ ra danh sách nhân viên
    $("#list_time").change(function() {
        const date = $("#date").val();
        const time = $('input[name=choose_time]:checked', '#bookapp').val();
        console.log(time);
        const datetime = date + " " + time;
        console.log(datetime);
        $.ajax({
            url: "ajax.php?getstylist",
            type: "POST",
            data: {
                datetime: datetime
            },
            cache: false,
            success: function(data) {
                $("#list_stylist").html(data);
            }
        })
    })
 
})