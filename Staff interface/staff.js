function renderTime (){
    // date
    let mydate = new Date();
    let year = mydate.getYear();

      if (year < 1000){
        year += 1900
      }
    let day = mydate.getDay();
    let month = mydate.getMonth();
    let daym = mydate.getDate();
    let dayarray = new Array ("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
    let montarray = new Array ("January","February","March","April","May","June","July","August","September","October","November","December");
      // date end

      // time
      let currentTime = new Date();
      let currentHours = currentTime.getHours();
      let currentMinutes = currentTime.getMinutes();
      let currentSeconds = currentTime.getSeconds();
         if(currentHours == 24){
            currentHours = 0;
         } else if (currentHours > 12){
            currentHours -= 0;
         }
         if(currentHours < 10){
            currentHours = "0" + currentHours;
         }
         if (currentMinutes < 10){
            currentMinutes = "0" + currentMinutes;
         }
         if (currentSeconds < 10){
            currentSeconds = "0" + currentSeconds;
         }

         var myClock = document.getElementById ("clock-display");
         myClock.textContent = "" + dayarray[day] + " " + daym + " " + montarray[month] + " " + year + " | " + currentHours + ":" + currentMinutes + ":" + currentSeconds;
         myClock.innerText ="" + dayarray[day] + " " + daym + " " + montarray[month] + " " + year + " | " + currentHours + ":" + currentMinutes + ":" + currentSeconds;
        
         setTimeout("renderTime()",1000);
       
}
renderTime();


//////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function() {
    var timeout; // Timeout variable to delay AJAX calls

    $("#search").on("input", function() {
        clearTimeout(timeout);

        var query = $(this).val();
        if (query.trim() === '') {
            $("#search-results").html('');
            return;
        }

        timeout = setTimeout(function() {
            $.ajax({
                url: "search.php",
                method: "POST",
                data: { query: query },
                success: function(data) {
                    $("#search-results").html(data);
                }
            });
        }, 300); // Delay for 300 milliseconds to reduce server load
    });

    $("#search-results").on("click", ".select-product", function() {
        var productId = $(this).data("id");

        $.ajax({
            url: "get_product.php",
            method: "POST",
            data: { productId: productId },
            success: function(data) {
                $("#selected-products-body").append(data);
                updateTotalPrice();
                $("#search").val("");
                $("#search-results").html("");
            }
        });
    });

    $("#selected-products-body").on("change", ".quantity input", function() {
        var quantity = parseInt($(this).val());
        var price = parseFloat($(this).closest("tr").find(".price").text());
        var totalPrice = quantity * price;
        $(this).closest("tr").find(".total-price").text(totalPrice.toFixed(2));
        updateTotalPrice();
    });

    $("#selected-products-body").on("click", ".remove-product", function() {
        $(this).closest("tr").remove();
        updateTotalPrice();
    });

    $("#purchase-btn").on("click", function() {
        $.ajax({
            url: "purchase.php",
            method: "POST",
            data: { selectedProducts: getSelectedProducts() },
            success: function() {
                $("#selected-products-body").html("");
                updateTotalPrice();
                alert("Purchase successful!");
            }
        });
    });

    function updateTotalPrice() {
        var totalPrice = 0;
        $("#selected-products-body tr").each(function() {
            totalPrice += parseFloat($(this).find(".total-price").text()) || 0;
        });
        $("#total-price").val(totalPrice.toFixed(2));
    }

    function getSelectedProducts() {
        var selectedProducts = [];
        $("#selected-products-body tr").each(function() {
            var productId = $(this).find(".product-id").text();
            var productName = $(this).find(".product-name").text();
            var quantity = parseInt($(this).find(".quantity input").val());
            selectedProducts.push({ productId: productId, productName: productName, quantity: quantity });
        });
        return selectedProducts;
    }
});
