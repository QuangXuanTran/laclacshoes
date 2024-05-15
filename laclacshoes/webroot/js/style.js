
$(document).ready(function(){
    var submit= $("button#tru");
    submit.click(function(){
        if($('input#soluong').val() >=2){
            $('input#soluong').val(parseInt($('input#soluong').val())-1);
        }else{
            $('input#soluong').val(parseInt($('input#soluong').val()));
        } 
        return false;
    });
});
$(document).ready(function(){
    var submit= $("button#cong");
    submit.click(function(){

        if($('input#soluong').val() <=9){
            $('input#soluong').val(parseInt($('input#soluong').val())+1);
        }else{
            $('input#soluong').val(parseInt($('input#soluong').val()));
        } 
        return false;
    });
});

$(document).ready(function(){
    var submit= $("input#Apply_Coupon");
    submit.click(function(){
        var id=$('input#Coupon').val();
        $('span#coupon2').text('Đã áp dụng mã : ' + id);
        var datas = {
            functionName: 'check_coupon',
            id: id
        };
        $.ajax({
            url: 'model/database.php',
            type: 'POST',
            data: datas,
            success: function(response) {
              // Kết quả trả về từ hàm PHP
                sotien = response.replace(/"/g, '');
                $('span#coupon_apply').text(sotien);
                var subtotal = $('span#subtotal').text().replace(/,/g, '');
                var sotien1 = $('span#coupon_apply').text().replace(/,/g, '');
                var total = (parseInt(subtotal) - parseInt(sotien1)).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                $('span#total').text(total);
                $('input#tongtien').val((parseInt(subtotal) - parseInt(sotien1)));
                $('input#tiensale').val(parseInt(sotien1));
               
            },
            error: function(xhr, status, error) {
                console.error(error); // Xử lý lỗi nếu có
            }
        });
    });
});


$(document).ready(function(){
    var submit= $("button#xemthem");
    console.log('ok');
    submit.click(function(){
        var datas=$('form#load_sp').serialize();
        
        $.ajax({
            type    :   'POST',
            url     :   'model/database.php',
            data    :   datas,
            success :   function(data){
                if(data == 'false'){
                    alert('lỗi thử lại sao');
                }else{           
                    $("#data_sp").html(data);
                    
                }
            }
        });
        $('input#page').val(parseInt($('input#page').val())+1);
        return false;
    });
});

function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var eyeIcon = document.querySelector(".toggle-password svg");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.add("visible");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("visible");
    }
}
// Khởi tạo bản đồ và đặt tọa độ trung tâm ở Hồ Chí Minh
var map = L.map('map').setView([10.762622, 106.660172], 13);

// Thêm tile layer (hiển thị bản đồ nền)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

// Thêm marker (đánh dấu vị trí trên bản đồ)
L.marker([10.762622, 106.660172]).addTo(map)
    .bindPopup('Lac Lac shoes ');

