// Gọi đến 1 thẻ
const $$$ = document.querySelector.bind(document);

// Gọi đến nhiều thẻ
const $$$$ = document.querySelectorAll.bind(document);


// Gọi đến thẻ input có type = checkbox
// console.log(checkInputsCombo);
const checkInputs = $$$$('.checkbox__input');
// Lấy độ dài của biến checkInputs khi gọi để sử dụng vòng lặp

const checkboxInput = $$$$('.checkbox__input.checkbox__input-checkbox');
const radioInput = $$$$('.checkbox__input.checkbox__input-radio');

// console.log(checkboxDisabaled);
// Tạo mảng trống để add và delete
//  thông tin sản phẩm vào khi nhấn input
let checkName = [];
let checkEmpty = [];
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
                const divServiceItem = input[i].closest('.checkbox__label');
                const divServiceItemCheck = typeInput[0].closest('.service__item');
                const list__services = divServiceItemCheck.parentElement;
                const divType = input[0].closest('.service__item');
                const divTypeParent = divType.parentElement;
                const getTitle = divTypeParent.previousElementSibling;
                // Từ thẻ label lấy được gọi đến thẻ chứa thông tin sản phẩm
                const serviceContent =  divServiceItem.lastElementChild;
                // Từ thẻ chứa thông tin sản phẩm gọi đến thẻ chứa tên và giá của sản phẩm
                const divPrice = serviceContent.firstElementChild;
                // Gọi tên của sản phẩm
                const checkNameService = divPrice.firstElementChild.innerText;
                // Gọi giá của sản phẩm
                const checkPrices = divPrice.lastElementChild;
                
                if(input[i].checked === true) {
                    checkTrue.push(input[i].checked);
                    checkName.push({name: checkNameService, price: checkPrices.innerText.replace(/[^0-9]/g, '')});
                }else {
                    list__services.classList.remove('input-opacity');
                    for (const index in checkName) {
                        if(checkName[index].name == checkNameService) {
                            checkName.splice(index, 1);
                            checkTrue.pop();
                            break;
                        }
                    }
                }


                if(getTitle.innerText == "Combo") {
                    if(checkName.length > 1) {
                        checkName.shift();
                    }  
                }else {}
                // Xử lý phần chọn tối đa 2 dịch vụ
                for (const index in checkName) {
                    if(checkName.length > 2) {
                        console.log(index);
                        input[i].checked = false;
                        alert('Bạn chỉ được chon tối đa 2 dịch vụ');
                        checkName.pop();
                        checkTrue.pop();
                        break;
                    }                
                }
                
                
                this.hanldeDeleteCheckedRadio(checkTrue);
                // Xử lý phần chọn Combo
                for(const index in typeInput) {
                    if (checkTrue.length == 0) {
                        typeInput[index].disabled = false;
                        list__services.classList.remove('input-opacity');
                    }else {
                        typeInput[index].disabled = true;
                        list__services.classList.add('input-opacity');
                    }
                }
                this.hanldDisplayPrice(checkName);

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

    hanldDisplayPrice(values) {
        if(values) {
            // Tính tổng giá của sản phẩm
            totalPrices = values.reduce( (acc, curr) => acc + Number(curr.price), 0);
        }else {}
        // Gọi hàm renderBill để hiển thị ra màn hình
        this.renderBill(values, totalPrices);
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
        this.renderBill([], 0);
    }

}
app.start();