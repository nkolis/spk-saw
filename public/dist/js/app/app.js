

$('#modal-alternatif button[data-dismiss="modal"').click(() => {
    $("#modal-alternatif .modal-body").html('');
})

$('button[data-target="#modal-kriteria"]').click(function() {
    $('form').attr('action', 'kriteria/tambahKriteria');
    $('h4.modal-title').text('Tambah Kriteria');
    $('button[name=submit]').text('Kirim');
    $('#inputNamaKriteria').attr('placeholder', 'Nama Kriteria');
    $('#inputBobot').attr('placeholder', 'Bobot');
    $('#inputTipe').val('benefit');

})

$('.editkriteria').click(function() {
    const id = $(this).data('idkriteria');
    $('form').attr('action', 'kriteria/editKriteria');
    $('form').append(`<input type="hidden" id="id_kriteria" name="id_kriteria" value="${id}">`);
    $('#inputIdKriteria').attr('disabled', '');
    
    $('h4.modal-title').text('Edit Kriteria');
   
    $('#inputIdKriteria').val(id)
    $('button[name=submit]').text('Update');

    $.ajax({
        url: `/kriteria/id/${id}`,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        type: "post",
        success: function(data) {
            const kriteria = data.kriteria;
            kriteria.forEach(value => {
                $('#inputNamaKriteria').attr('placeholder', value.nama_kriteria);
                $('#inputBobot').attr('placeholder', value.bobot);
                $('#inputTipe').val(value.tipe);
            });
        }
    });

})

$('.hapuskriteria').click(function(){
    const id = $(this).data('idkriteria');
    $.ajax({
        url: 'kriteria/delete/id/'+id,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        type: 'post',
        success: function(data){
            console.log(data)
        }
    });
});

$('#modal-kriteria button[data-dismiss="modal"').click(() => {

})



$('a[data-target="#modal-alternatif"]').click(function() {
    const id = $(this).data('id');
    $.ajax({
        url: `/alternatif/detail/id/${id}`,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function(data) {
            for (key in data.alternatif[0]) {
                const value = data.alternatif[0][key];
                key = key.replace('_', ' ').toLowerCase().replace(/\b[a-z]/g, function(letter) {
                    return letter.toUpperCase();
                });
                $("#modal-alternatif .modal-body").append(
                    `<div class="row"><div class="col-md-4">${key}</div><div>:</div> <div class="col-md-4">${value}</div></row>`
                );
            }

        }
    });
})

