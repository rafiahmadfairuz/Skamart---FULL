function updateImageNumber() {
  const $carousel = $("#carouselExampleIndicators");
  const totalSlides = $carousel.find(".carousel-item").length;
  const activeIndex = $carousel.find(".carousel-item.active").index();
  if (totalSlides > 0) {
    $("#carouselImageNumber").text(`Image ${activeIndex + 1} / ${totalSlides}`);
  } else {
    $("#carouselImageNumber").text("Image 0 / 0");
  }
}

$("#imageInput").on("change", function () {
  let files = this.files;
  let filesLength = files.length;

  $("#carouselIndicators").empty();
  $("#carouselInner").empty();
  $("#carouselImageNumber").text("Image 0 / 0");

  if (filesLength !== 6) {
    $("#warningMsg").text("Masukkan tepat 6 gambar.");
    return;
  }

  let validImageTypes = ["image/jpeg", "image/png"];
  let allImagesValid = true;
  let loadedFilesCount = 0;

  $.each(files, function (index, file) {
    if ($.inArray(file.type, validImageTypes) < 0) {
      $("#warningMsg").text("Hanya file .jpg dan .png yang diperbolehkan.");
      allImagesValid = false;
      return false;
    }

    let reader = new FileReader();
    reader.onload = function (event) {
      let indicatorClass = index === 0 ? "active" : "";
      let itemClass = index === 0 ? "carousel-item active" : "carousel-item";

      $("#carouselIndicators").append(
        `<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${index}" class="${indicatorClass}" aria-current="${
          index === 0 ? "true" : "false"
        }" aria-label="Slide ${index + 1}"></button>`
      );

      $("#carouselInner").append(
        `<div class="${itemClass}">
          <img src="${event.target.result}" class="d-block w-100 gambar zoom" alt="Image ${index + 1}">
        </div>`
      );

      loadedFilesCount++;
      if (loadedFilesCount === filesLength) {
        $("#carouselExampleIndicators").carousel(0);
        updateImageNumber();
      }
    };
    reader.readAsDataURL(file);
  });
});

$("#carouselExampleIndicators").on("slid.bs.carousel", function () {
  updateImageNumber();
});

const $carousel = $("#carouselExampleIndicators");
const $imageNumber = $("#carouselImageNumber");
const totalSlides = $carousel.find(".carousel-item").length;

function updateImageNumberD() {
  const activeIndex = $carousel.find(".carousel-item.active").index();
  $imageNumber.text(`Image ${activeIndex + 1} / ${totalSlides}`);
}

updateImageNumberD();

$carousel.on("slid.bs.carousel", function () {
  updateImageNumberD();
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
