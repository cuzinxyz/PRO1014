

    function myFunction() {
        Toastify({
            text: "Đặt lịch thành công!",
            duration: 9000,
            destination: "/",
            newWindow: true,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #6274E7, #8752A3)",
            },
            onClick: function() {} // Callback after click
        }).showToast();
    }
    window.onload = function() {
        var reloading = sessionStorage.getItem("reloading");
        if (reloading) {
            sessionStorage.removeItem("reloading");
            myFunction();
        }
    }
    
    function reloadP() {
        sessionStorage.setItem("reloading", "true");
        document.location.reload();
    }
