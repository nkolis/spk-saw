const base_url = 'http://localhost:5000';


   

    

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
$(document).click(function(e){
    const target = e.target;
    const attrId = target.getAttribute('id');
   
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

if(attrId == 'form-edit-alternatif'){
   

    const id = $(target).data('idalternatif');
    

    $('form').attr('action', `${base_url}/alternatif/editAlternatif`);
    $('h4.modal-title').text('Edit Alternatif');
   
  
    $.ajax({
        url: `${base_url}/alternatif/formEditAlternatif`,
        type: 'post',
        success: function(response){
            $("#modal-alternatif .modal-body").html(response);
            $("#id_alternatif").val(id);
            $(".modal-title").text('Edit Alternatif');
            $("button[name=submit]").show();
        }
    })
    $.ajax({
        url: `${base_url}/alternatif/id/${id}`,
        type: 'post',
        dataType: 'json',
        success: function(data){
            const alternatif = data.alternatif[0]
            for(let key in alternatif){
                let selector = `#${key}`;
                $(selector).val(alternatif[key])
            }
        }
    })
  
    
   // $('#simpan-alternatif').attr('id', 'simpan-edit-alternatif')

    
    
}


if(attrId == 'simpan-alternatif'){
   
    const formTambah = $(".form-alternatif");
    const formEdit = $(".form-edit-alternatif");
  
    let data = null
    if(formTambah.length) {
    formTambah.find('input').each(function(i, e){
        if($(e).val().length == 0){
            Toast.fire({
                icon: 'warning',
                title: 'Tidak boleh kosong!'
              });
        } else {
            data = $(".form-alternatif").serialize();
        }

       
    })
    
    $.ajax({
        url: `${base_url}/alternatif/tambahAlternatif`,
        type: 'post',
        data: data,
        success: function(){
           
            $("#modal-alternatif").modal('hide');
            $(location).attr('href', `${base_url}/alternatif`)
            Toast.fire({
                icon: 'success',
                title: 'Berhasil menyimpan!'
            });
           
        
        }
    })

    }

if(formEdit.length){
    data = formEdit.serialize();
    
    
    $.ajax({
        url: `${base_url}/alternatif/editAlternatif`,
        type: 'post',
        data: data,
        success: function(){
          
            $("#modal-alternatif").modal('hide');
            $(location).attr('href', `${base_url}/alternatif`)
            Toast.fire({
                icon: 'success',
                title: 'Berhasil update!'
            });
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
                $("#modal-alternatif .modal-body").html(response)
                $(".modal-title").text('Detail Alternatif');
                $("button[name=submit]").hide();
            }
    });
}


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