// Gọi đến 1 thẻ
const $$$ = document.querySelector.bind(document);

// Gọi đến nhiều thẻ
const $$$$ = document.querySelectorAll.bind(document);


// Gọi đến thẻ input có type = checkbox
// console.log(checkInputsCombo);
const checkInputs = $$$$('.checkbox__input');
// Lấy độ dài của biến checkInputs khi gọi để sử dụng vòng lặp

const checkboxInput = $$$$('.checkbox__input-checkbox');
const radioInput = $$$$('.checkbox__input-radio');

// Tạo mảng trống để add và delete
//  thông tin sản phẩm vào khi nhấn input
let checkValues = [];
let checkTrue = [];

let totalPrices = 0;

const app = {
    hanldeCheckBox() {
        this.hanldeClick(checkboxInput, radioInput);
    },

    hanldeCheckRadio() {
        this.hanldeClick(radioInput, checkboxInput);
    },

    hanldeClick(input, typeInput) {
        let lengthInput = input.length;
        for( let i = 0; i < lengthInput; i++ ) {
            input[i].onchange = () => {
                // Gọi đến thẻ label(thẻ chứa input) khi click vào 1 thẻ input nhất định
                const divServiceItemCheck = typeInput[0].closest('.service__item');
                const list__services = divServiceItemCheck.parentElement;
                const rowCombos = input[i].closest('.row');
                const getTitle = rowCombos.previousElementSibling;
                console.log(getTitle.innerText);
                
                if(input[i].checked === true) {
                    checkTrue.push(input[i].checked);
                }else {
                    checkTrue.pop();
                }

                if(getTitle.innerText == "Combo") {
                    if(checkTrue.length > 1) {
                        checkTrue.shift();
                    }  
                }else {}

                this.hanldeDeleteCheckedRadio(checkTrue);

                // Xử lý phần chọn tối đa 2 dịch vụ
                for (const index in checkTrue) {
                    if(checkTrue.length > 2) {
                        console.log(index);
                        input[i].checked = false;
                        alert('Bạn chỉ được chon tối đa 2 dịch vụ');
                        checkTrue.pop();
                        break;
                    }                
                }
                
                for(const index in typeInput) {
                    if (checkTrue.length == 0) {
                        typeInput[index].disabled = false;
                        list__services.classList.remove('input-opacity');
                    }else {
                        typeInput[index].disabled = true;
                        list__services.classList.add('input-opacity');
                    }
                }

            }
        }
    },

    hanldeDeleteCheckedRadio(checkTrue) {
        let lengthInputRadio = radioInput.length;
        for (let i = 0; i < lengthInputRadio; i++) {
            radioInput[i].onclick = () => {
                if(radioInput[i].checked === true) {
                    for (const index in radioInput) {
                        radioInput[index].checked = false;
                        checkTrue.pop();
                    }
                    radioInput[i].checked = true;
                    checkTrue.pop();
                }else {}
            }
        }
    },

    renderBill(values, totalPrices) {
        const infoPayPro = $$$('.main__receipt--wrap');
        const infoTotal = $$$('.total');
        infoPayPro.innerHTML = '';
        if(typeof values === 'object') {

            const formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                minimumFractionDigits: 0
            });

            for (let key in values) {
                infoPayPro.innerHTML += `
                <div class="have__service">
                    <p class="status__receippt">${values[key].name ? values[key].name : 'No service'}</p>
                    <p class="have__service-price">${formatter.format(values[key].price)}</p>
                </div>
                `
            }
        }
        if(values.length == 0) {
            infoPayPro.innerHTML += `
                <div class="none__service">
                    <p class="status__receippt">No services selected yet</p>
                </div>
            `
        }

        totalPrices = totalPrices.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
        infoTotal.innerHTML = `
            <p class="total__text">Total</p>
            <p class="total__price">${totalPrices ? totalPrices : '0'} </p>
        `;
    },
    start() {
        this.hanldeCheckBox();
        this.hanldeCheckRadio();
    }

}
app.start();