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

    
    // checked book
    const bookApp = document.querySelector('#bookapp');
    bookApp.onsubmit = function(e) {
        let checkServices = document.getElementsByName('choose_service[]');
        // console.log(checkServices);
        let checkComboes = document.getElementsByName('choose_combo');
        let checkBox = [...checkServices, ...checkComboes];
        for (i = 0; i < checkBox.length; i++) {
                var checked = (checkBox[i].checked||checked===true)?true:false;
            }
            
        if (checked == false) {
            alert('Vui lòng chọn dịch vụ')
            e.preventDefault();
            return false;
        } else {
            document.querySelector('#book').onclick = () => reloadP();
            return true;
        }
          
    }
    

function reloadP() {
    sessionStorage.setItem("reloading", "true");
    document.location.reload();
}

