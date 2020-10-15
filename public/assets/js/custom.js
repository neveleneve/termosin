function jumlahbelanja(id) {
    var u = document.getElementById("hiddentotal");
    var w = document.getElementById("total");

    var v = document.getElementById("subtotal"+id);
    var z = document.getElementById("hiddensubtotal"+id);

    var x = document.getElementById("jumlah"+id);
    var y = document.getElementById("harga"+id);
    var badge = document.getElementById("badge"+id);

    var subtotal = 0;
    if (x.value >= 10) {
        subtotal = (x.value * y.value) - (0.4 * x.value * y.value);
        badge.hidden = false;
        badge.textContent = 'Diskon 40%';
    }else if (x.value >= 5) {
        subtotal = (x.value * y.value) - (0.15 * x.value * y.value);
        badge.hidden = false;
        badge.textContent = 'Diskon 15%';
    }else{
        subtotal = x.value * y.value;
        badge.hidden = true;
        badge.textContent = '';
    }
    z.value = subtotal;
    v.textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(subtotal);
    var sum = 0;
    $('.subtotal').each(function(){
        sum += parseFloat(this.value);
    });
    u.value = sum;
    w.value = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(sum);
}

function transaction(name) {
    var input = document.getElementById('input'+name);
    var output = document.getElementById('output'+name);
    output.value = input.value;
}
