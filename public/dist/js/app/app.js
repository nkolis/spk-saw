const base_url = 'http://localhost:5000';

$('a.nav-link').click(function(e){
    
    e.preventDefault()
    const url = $(this).attr('href');
    $(".container-fluid").load(`${url} .container-fluid`, function(){
        $("#default-datatable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "bDestroy": true
        })
        //.buttons().container().appendTo('#default-datatable_wrapper .col-md-6:eq(0)');
        $('#simple-datatable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "bDestroy": true
        });

        $('#simple-datatable2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "bDestroy": true
        });

        $('#simple-datatable3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "bDestroy": true
        });

    })
})
$(document).click(function(e){
    const target = e.target;
    const attrId = target.getAttribute('id');
   

    

// $('#modal-alternatif button[data-dismiss="modal"').click(() => {
//     $("#modal-alternatif .modal-body").html('');
// })

$('button[data-target="#modal-kriteria"]').click(function() {
    $('form').attr('action', `${base_url}/kriteria/tambahKriteria`);
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
        url: `${base_url}/kriteria/id/${id}`,
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
        url: `${base_url}/kriteria/delete/id/${id}`,
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

//subkriteria
$('#modal-subkriteria button[data-dismiss="modal"').click(() => {
   // $("#modal-subkriteria .modal-body").html('');
})

$('button[data-target="#modal-subkriteria"]').click(function() {
    $('form').attr('action', `${base_url}/subkriteria/tambahSubkriteria`);
    $('h4.modal-title').text('Tambah Subkriteria');
    $('button[name=submit]').text('Kirim');
    $('#nama_subkriteria').attr('placeholder', 'Nama Subkriteria');
    $('#bobot_subkriteria').attr('placeholder', 'Bobot');
})

$('.editsubkriteria').click(function() {
    const id = $(this).data('idsubkriteria');
    console.log(id);
    $('form').attr('action', `${base_url}/subkriteria/editSubkriteria`);
    $('form').append(`<input type="hidden" id="id_subkriteria" name="id_subkriteria" value="${id}">`);
    $('h4.modal-title').text('Edit Subkriteria');
   
    $('button[name=submit]').text('Update');

    $.ajax({
        url: `${base_url}/subkriteria/id/${id}`,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        type: "post",
        success: function(data) {
            console.log(data)
            const subkriteria = data.subkriteria;
            subkriteria.forEach(value => {
                $('#nama_subkriteria').attr('placeholder', value.nama_subkriteria);
                $('#bobot_subkriteria').attr('placeholder', value.bobot);
            });
        }
    });

})

//penduduk
// $('#modal-penduduk button[data-dismiss="modal"').click(() => {
//     $("#modal-penduduk .modal-body").html('');
// })

$('button[data-target="#modal-penduduk"]').click(function() {
    $('form').attr('action', `${base_url}/penduduk/tambahPenduduk`);
    $('h4.modal-title').text('Tambah Penduduk');
    $('button[name=submit]').text('Kirim');
    $('#nik').attr('placeholder', 'Nik');
    $('#nama').attr('placeholder', 'Nama');
    $('#jenkel').val('l');
    $('#alamat').attr('placeholder', 'Alamat');
})

$('.editpenduduk').click(function() {
    const id = $(this).data('idpenduduk');
    console.log(id);
    $('form').attr('action', `${base_url}/penduduk/editPenduduk`);
    $('form').append(`<input type="hidden" id="id_penduduk" name="id_penduduk" value="${id}">`);
    $('h4.modal-title').text('Edit Penduduk');
   
    $('button[name=submit]').text('Update');

    $.ajax({
        url: `${base_url}/penduduk/id/${id}`,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        type: "post",
        success: function(data) {
            console.log(data)
            const penduduk = data.penduduk;
            penduduk.forEach(value => {
                $('#nik').attr('placeholder', value.nik);
                $('#nama').attr('placeholder', value.nama);
                $('#jenkel').val(value.jenkel);
                $('#alamat').attr('placeholder', value.alamat);
            });
        }
    });

})


//alternatif

if(attrId == 'form-tambah-alternatif'){

    $('form').attr('action', `${base_url}/alternatif/tambahAlternatif`);
    $('h4.modal-title').text('Tambah Alternatif');

    $.ajax({
        url: `${base_url}/alternatif/formAlternatif`,
        type: 'post',
        success: function(response){
            $("#modal-alternatif .modal-body").html(response);
            $(".modal-title").text('Tambah Alternatif');
            $("button[name=submit]").show();
        }
    })
    
}

if(attrId == 'simpan-alternatif'){
    const form = $(".form-alternatif");
    let data = null
    form.find('input').each(function(i, e){
        if($(e).val().length == 0){
            Toast.fire({
                icon: 'warning',
                title: 'Tidak boleh kosong!'
              });
        } else {
            data = $(".form-alternatif").serialize();
        }

       
    })
    
    if(data!=null){
        $.ajax({
            url: `${base_url}/alternatif/tambahAlternatif`,
            type: 'post',
            data: data,
            success: function(){
               
                $("#modal-alternatif").modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Berhasil menyimpan!'
                });
                $(".table").load(`${base_url}/alternatif .table`)
            }
        })
     }
}


if(attrId == 'detail-alternatif'){
    const id = target.dataset.id;
    $.ajax({
        url: `${base_url}/alternatif/detail/id/${id}`,
        type: 'post',
        success: function(response) {
            console.log(response)
                $("#modal-alternatif .modal-body").html(response)
                $(".modal-title").text('Detail Alternatif');
                $("button[name=submit]").hide();
            }
    });
}

$('.editalternatif').click(function() {
    const id = $(this).data('idalternatif');
    console.log(id);
    $('form').attr('action', `${base_url}/alternatif/editAlternatif`);
    $('form').append(`<input type="hidden" id="id_alternatif" name="id_alternatif" value="${id}">`);
    $('h4.modal-title').text('Edit Alternatif');
   
    $('button[name=submit]').text('Update');

    $.ajax({
        url: `${base_url}/alternatif/id/${id}`,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        type: "post",
        success: function(data) {
            console.log(data)
            const penduduk = data.penduduk;
            penduduk.forEach(value => {
                
            });
        }
    });

})

$('#modal-alternatif-detail button[data-dismiss="modal"').click(() => {
    $("#modal-alternatif-detail .modal-body").html('');
})

if(attrId == "cek_nik"){
    const nik = $("#nik").val();
   
    $.ajax({
        url: `${base_url}/penduduk/nik/${nik}`,
        contentType: "application/json; charset=utf-8",
        dataType: 'json',
        type: 'post',
        success: function(data){
            const penduduk = data.penduduk;
            if(penduduk.length > 0){
                penduduk.forEach(value =>{
                        $("#nama_alternatif").val(value.nama)
                })
            } else {
                 Toast.fire({
                    icon: 'warning',
                    title: 'Penduduk tidak ditemukan.'
                  });
                 $("#nama_alternatif").val('')
            }
            
        }
    })
}

    
})