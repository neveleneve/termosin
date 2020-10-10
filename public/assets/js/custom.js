function myFunction(id) {
    var x = document.getElementById("jumlah"+id);
    var y = document.getElementById("total"+id);
    var z = document.getElementById("harga"+id);
    y.value = x.value * z.value;
  }