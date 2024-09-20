function updateContainerClass() {
  if ($(window).width() < 1200) {
    $("#promo.container").removeClass("container");
    $("#banner.container-md").removeClass("container-md");
    $("#carousel-dalam.rounded-4").removeClass("rounded-4");
    $(".promo").addClass("container-fluid"); 
    $(".brand.container").removeClass("container"); 
    $(".brand").addClass("container-fluid"); 
  } else {
    $("#carousel-dalam").addClass("rounded-4");
    $("#banner").addClass("container-md");
    $(".promo.container-fluid").removeClass("container-fluid");
    $("#promo").addClass("container");
    $(".brand.container-fluid").removeClass("container-fluid");
    $(".brand").addClass("container");
  }
  if ($(window).width() < 992) {
    $("#beranda.container").removeClass("container");
    $("#beranda").addClass("container-fluid");
  } else {
    $("#beranda.container-fluid").removeClass("container-fluid");
    $("#beranda").addClass("container");
  }
  if ($(window).width() < 400) {
    $("#pf.container-fluid").removeClass("container-fluid");
    $("#footer.rounded-top-5").removeClass("rounded-top-5");
  } else {
    $("#pf").addClass("container-fluid");
    $("#footer").addClass("rounded-top-5");
  }
}
updateContainerClass();
$(window).resize(function () {
  updateContainerClass();
});

$(document).on("mouseenter", ".zoom", function () {
  $(this).addClass("zoomed");
});

$(document).on("mousemove", ".zoom.zoomed", function (e) {
  let $this = $(this);
  let imageWidth = $this.width();
  let imageHeight = $this.height();
  let imageOffset = $this.offset();
  let mouseX = e.pageX - imageOffset.left;
  let mouseY = e.pageY - imageOffset.top;
  let originX = (mouseX / imageWidth) * 50;
  let originY = (mouseY / imageHeight) * 50;
  
  $this.css({
    "transform-origin": `${originX}% ${originY}%`,
  });
});

$(document).on("mouseleave", ".zoom", function () {
  $(this).removeClass("zoomed");
  $(this).css("transform-origin", "center center");
});

$(".img-kecil").on("click", function () {
  if ($(this).hasClass("img-kecil")) {
    $(".img-utama").attr("src", $(this).attr("src"));
  }
});

function applyFilters() {
  var minHarga = $("#minHarga").val();
  var maxHarga = $("#maxHarga").val();
  var rangeStok = $("#rangeStok").val();
  var ratingOrder = $("#ratingOrder").val();
  var category = $(".kotak-kategori.terpilih").data("category");
  var keyword = $("#search-input").val();

  $.ajax({
    url: "index.php",
    method: "GET",
    data: {
      minHarga: minHarga,
      maxHarga: maxHarga,
      rangeStok: rangeStok,
      ratingOrder: ratingOrder,
      category: category,
      search: keyword,
    },
    success: function (response) {
      $("#displayProduk").html(response);
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
}

function filterProducts() {
  var minHarga = $("#minHarga").val();
  var maxHarga = $("#maxHarga").val();
  var rangeStok = $("#rangeStok").val();
  var ratingOrder = $("#ratingOrder").val();

  $.ajax({
    url: "index.php",
    method: "GET",
    data: {
      minHarga: minHarga,
      maxHarga: maxHarga,
      rangeStok: rangeStok,
      ratingOrder: ratingOrder,
    },
    success: function (response) {
      $("#displayProduk").html(response);
    },
  });
}

$("#minHarga, #maxHarga, #rangeStok, #ratingOrder").on("input change", function () {
  applyFilters();
});

$("#resetFilter").on("click", function () {
  $("#minHarga").val("");
  $("#maxHarga").val("");
  $("#rangeStok").val("500");
  $("#ratingOrder").val("asc");
  $("#search-input").val("");
  $(".kotak-kategori").removeClass("terpilih");
  applyFilters();
});

$(".kotak").on("click", function () {
  $(".kotak-kategori").removeClass("terpilih");
  $(this).find(".kotak-kategori").addClass("terpilih");
  applyFilters();
});


$("#search-input").on("input", function () {
  var keyword = $(this).val(); 
  if (keyword.length > 0) {
    applyFilters();
  } else {
    getAllProducts();
  }
});

function getAllProducts() {
  $.ajax({
    url: "index.php",
    method: "GET", 
    data: {
      allProducts: true,
    },
    success: function (response) {
      $("#displayProduk").html(response);
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
}

function addToCart(productId, userId) {
  $.ajax({
    url: "controller/cartcontroller.php",
    type: "POST",
    data: { action: "add", product_id: productId, user_id: userId },
    dataType: "json",
    success: function (response) {
      console.log(response);
      console.log(response.product.ide);
      if (response.success) {
        updateCart(response.product);
        updateCartCount(response.cart_count);
        const myModal = new bootstrap.Modal(
          document.getElementById("modalBerhasil")
        );
        myModal.show();
      } else {
        alert("Gagal menambahkan produk ke keranjang.");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Status: " + textStatus);
      console.log("Error Thrown: " + errorThrown);
      console.log("Response Text: " + jqXHR.responseText);

      alert("Terjadi kesalahan. Coba lagi.");
    },
  });
}

function updateCart(product) {
  const existingItem = $(
    `#keranjang .cart-item[data-kode-barang="${product.kode_barang}"]`
  );
  const gambarArray = product.url_gambar.split(",");
  if (existingItem.length > 0) {
    existingItem.find(".jumlah").text(`X ${product.quantity}`);
  } else {
    const cartItem = `
            <div class="container-fluid border-bottom py-2 cart-item" data-kode-barang="${product.kode_barang}"  data-harga="${product.harga}">
                <div class="d-flex justify-content-between">
                    <div class="d-flex column-gap-0 column-gap-sm-1 column-gap-md-5">
                        <input type="checkbox" class="cart-checkbox" onchange="updateSelectedItems()">
                        <div>
                            <img src="asset/uploads/${gambarArray[0]}" alt="Product Image">
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="cart-item-title">${product.nama_barang}</div>
                            <div class="cart-item-price text-secondary">Rp. ${product.harga}</div>
                            <div class="cart-item-price text-secondary">Varian: ${product.varian}</div>
                            <div class="cart-item-price text-secondary">Stok: ${product.jumlah_stok}</div>
                        </div>
                    </div>
                    <div class="d-flex text-nowrap  align-items-center justify-content-center">
                        <p class="fw-bold jumlah fs-5">X ${product.quantity}</p>
                         <button class="btn w-100 mb-3" id="hapuscart" data-product-id="${product.id}"><i class="bi fw-bold bi-trash3"></i></button>
                    </div>
                </div>
            </div>
        `;
    $("#keranjang").append(cartItem);
  }
}

function updateSelectedItems() {
  let selectedItemCount = 0;
  let totalPrice = 0;

  $("#keranjang .cart-checkbox:checked").each(function () {
    const cartItem = $(this).closest(".cart-item");
    const itemPrice = parseFloat(cartItem.data("harga"));
    const itemQuantity = parseInt(
      cartItem.find(".jumlah").text().replace("X ", "")
    );

    selectedItemCount += itemQuantity;
    totalPrice += itemPrice * itemQuantity;
  });

  $("#selectedItemsCount").text(`Selected Item (${selectedItemCount})`);
  $("#totalPrice").text(`Rp. ${totalPrice.toLocaleString()}`);
}

function tampilkanModalPembelian() {
  let selectedItems = [];
  let totalQuantity = 0;
  let totalPrice = 0;
  $("#keranjang .cart-checkbox:checked").each(function () {
    const cartItem = $(this).closest(".cart-item");
    const itemName = cartItem.find(".cart-item-title").text();
    const itemPrice = parseFloat(
      cartItem
        .find(".cart-item-price")
        .eq(0)
        .text()
        .replace("Rp. ", "")
        .replace(",", "")
    );
    const itemQuantity = parseInt(
      cartItem.find(".jumlah").text().replace("X ", "")
    );

    selectedItems.push({
      name: itemName,
      quantity: itemQuantity,
      price: itemPrice,
    });

    totalQuantity += itemQuantity;
    totalPrice += itemPrice * itemQuantity;
  });

  if (selectedItems.length === 0) {
    alert("Pilih setidaknya satu item untuk melanjutkan pembelian.");
    return;
  }

  let modalItemsList = $("#modalItemsList");
  modalItemsList.empty(); 

  selectedItems.forEach((item) => {
    modalItemsList.append(
      `<li>${item.name} - ${item.quantity} pcs - Rp. ${(
        item.price * item.quantity
      ).toLocaleString()}</li>`
    );
  });

  $("#modalTotalQuantity").text(totalQuantity);
  $("#modalTotalPrice").text("Rp. " + totalPrice.toLocaleString());

  // Tampilkan modal
  if (totalQuantity != 0 && totalQuantity != null) {
    const myModal = new bootstrap.Modal(
      document.getElementById("exampleModal")
    );
    myModal.show();
  }
}

$("#beliSekarangBtn").click(function () {
  tampilkanModalPembelian();
});
function updateCartCount(count) {
  if (count > 0) {
    $(".bi-cart2").append(
      '<span class="position-absolute  start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 13px; top: 16px;">' +
        count +
        "</span>"
    );
  } else {
    $(".bi-cart2 .badge").remove();
  }
}

$(document).on("click", "#hapuscart", function () {
  const productId = $(this).data("product-id");
  var iduser = sessionStorage.getItem("userId");
  const userId = iduser;

  if (productId && userId) {
    $.ajax({
      url: "controller/cartcontroller.php", 
      type: "POST",
      data: {
        action: "remove",
        product_id: productId,
        user_id: userId,
      },
      dataType: "json", 
      success: function (response) {
        if (response.success) {
          $(`.cart-item[data-product-id="${productId}"]`).remove();
          fetchCartCount(userId);
          setTimeout(() => {
            location.reload();
          }, 90);
        } else {
          console.log("Gagal menghapus item dari keranjang.");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error Status: " + textStatus);
        console.log("Error Thrown: " + errorThrown);
        console.log("Response Text: " + jqXHR.responseText);
      },
    });
  } else {
    console.log("Error: Produk ID atau User ID tidak ditemukan.");
  }
});

function fetchCartCount(userId) {
  if (userId) {
    $.ajax({
      url: "controller/cartcontroller.php",
      type: "GET", 
      data: { action: "count", user_id: userId },
      dataType: "json",
      success: function (response) {
        updateCartCount(response.cart_count);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error Status: " + textStatus);
        console.log("Error Thrown: " + errorThrown);
        console.log("Response Text: " + jqXHR.responseText);
      },
    });
  } else {
    console.log("Error: User ID is missing.");
  }
}

function fetchCart(userId) {
  $.ajax({
    url: "controller/cartcontroller.php", // URL untuk memproses keranjang
    type: "POST",
    data: { action: "get", user_id: userId }, 
    dataType: "json",
    success: function (response) {
      console.log(response);
      if (response.success) {
        response.cart_items.forEach(function (product) {
          updateCart(product); 
        });
      } else {
        alert("Gagal mengambil data keranjang.");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error Status: " + textStatus);
      console.log("Error Thrown: " + errorThrown);
      console.log("Response Text: " + jqXHR.responseText);
      alert("Terjadi kesalahan. Coba lagi.");
    },
  });
}

$(document).ready(function () {
  var userId = sessionStorage.getItem("userId");
  fetchCartCount(userId);
  fetchCart(userId);
});
