$(document).ready(function () {
    $('#example').DataTable({
        paging: true,
        ordering: false,
        info: false,
    });
});

$('#data').DataTable( {
    data: data,
    columns : [
    { data: "number" },
    { data: "firstname" },
    { data: "lastname" },
    {
    "data": null,
    "render": function ( data, type, row, meta ) {
    return '<a href="'+data['number']+'">View Detail</a>'; }
    },
    ]
    });

// zoom in
var zoom = document.querySelector(".zoom-1");
var image = document.querySelector(".image-zoom");
var ratio = 2;

image.addEventListener("mousemove", function(e) {
  var x = e.pageX;
  var y = e.pageY;
  var xZoom = x + 20;
  var yZoom = y - 170;
  zoom.style.left = `${xZoom}px`;
  zoom.style.top = `${yZoom}px`;
  zoom.style.backgroundPosition = `-${xZoom}px -${yZoom}px`;
  zoom.style.visibility = "visible";
});

image.addEventListener("mouseout", function(e) {
  zoom.style.visibility = "hidden";
});

function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}