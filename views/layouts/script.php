<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="assets/js/sweetalert.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/nouislider.min.js"></script>
<script src="assets/js/countdown.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="assets/js/gmaps.min.js"></script>
<script src="assets/js/main.js"></script>


<script>
window.onload = () => {
    if ($("#overlay")) {
        setTimeout(function() {
            $("#overlay").addClass('animate__animated animate__fadeOut');

            setTimeout(function() {
                $("#overlay").remove();
            }, 1000);
        }, 200);
    };
    if ($("#clockdiv")) {
        var deadline = new Date("<?php echo getDealId(1)['end_time'];?>");
        initializeClock('clockdiv', deadline);
    }


};
$(function() {
    $(".addtocart").on('click', function() {
        let e = this;
        let id = $(e).attr('value');
        let size = $(e).prev().children("select").val();
        console.log(size);
        $.ajax({
            type: "POST",
            url: 'shop.php?action=addToCart&id=' + id + '&quantity=1&size=' + size,
            success: function(data) {
                $("#linkToCart").text('Giỏ hàng (' + data + ')');
            }
        });
        $(e).children('.ti-bag').removeClass('ti-bag').addClass(
            'ti-check animate__animated animate__headShake');
        $(e).children('p').text("Đã thêm");
        setTimeout(function() {
            $(e).children('.ti-check').removeClass(
                'ti-check animate__animated animate__headShake').addClass('ti-bag');
            $(e).children('p').text("Thêm vào giỏ");
        }, 1000);
    });

    $(".deleteItem").on('click', function() {
        var e = this;
        var id = $(e).data('value');
        var size = $(e).data('size');

        $.ajax({
            type: "POST",
            url: 'cart.php?action=deleteItem&id=' + id + '&size=' + size,
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                e.closest('tr').remove();
                $('.cart-total').text(data[1] + "");
            }
        });
    });
});

function quantityUpdate(e, id, size) {
    $.ajax({
        type: "GET",
        url: 'cart.php?action=updateCartAJAX&id=' + id + '&size=' + size + '&quantity=' + e.value,
        success: function(data) {
            data = JSON.parse(data);
            $('#product-' + id + '-' + size + ' .total').text(data[0] + "");
            $('.cart-total').text(data[1] + "");
        }
    });
}

function addOrder() {
    swal({
            title: "Xác nhận?",
            text: "Hãy kiểm tra kỹ thông tin đơn hàng trước khi đăng đặt hàng!",
            icon: "warning",
            buttons: {
                cancel: "Kiểm tra lại",
                catch: {
                    text: "Đặt hàng",
                    value: "add",
                },
            },
        })
        .then((value) => {
            if (value == "add") {
                let form = $("#add-order");
                let url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(response) {
                        console.log(response);
                        let data = JSON.parse(response);
                        if (data.status == 200) {
                            swal(data.title, data.message, "success").then((value) => { location.reload() });
                        } else {
                            swal(data.title, data.message, "error");
                        }
                    }
                });

            }
        });

}
</script>