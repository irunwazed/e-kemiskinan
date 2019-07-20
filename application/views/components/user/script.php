<script>

    var myTable = $('#table-user').DataTable();
    var page = 1;
    var dataAll = [];
    getData();
    function getData(_page = 1){
        page = _page;

        let url = base_url+"data/pengaturan/pengguna/page-"+page;
        let data = {
            page : page,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                setTable(respon.data);
                dataAll = respon.data;
            }else{

            }
        });
    }

    function setTable(data){
        myTable.clear();
        no = 1;
        data.forEach(element => {

            tempData = [
                no,
                element['username'],
                element['password'],
                element['level'],
                '<a class="fa fa-pencil" style="padding:5px;" href="#" onclick="setUpdate('+element['id_user']+')" data-toggle="modal" data-target="#modal-form" > </a>'+
                '<a class="fa fa-trash" style="padding:5px;" href="#"  data-setFunction="doDelete('+element['id_user']+')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate(){
        $("#form-action").attr("action", base_url+"data/pengaturan/pengguna/create")
    }

    function setUpdate(id){
        $("#form-action").attr("action", base_url+"data/pengaturan/pengguna/update");
        
        dataPilih = getDataPilih(id);
        setForm(dataPilih);
    }

    function getDataPilih(id){
        dataPilih = {};
        dataAll.forEach(element => {
            if(id == element['id_user']){
                dataPilih = element;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='id_user']").val(data['id_user']);
        $("input[name='username']").val(data['username']);
        $("input[name='password']").val(data['password']);
        $("select[name='level']").val(data['level']);
    }

    function doDelete(id){
        let url = base_url+"data/pengaturan/pengguna/delete";
        let data = {
            id_user : id
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
            // setPesanIsi("pesan-keluarga-anggota", respon.status, respon.pesan)
            // $("#pesan-no-kk").text(respon.pesan);
            $("#modal-pesan").modal("hide");

        });
    }

    $("#form-action").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        console.log("as");
        $("#modal-form").modal("hide");
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

</script>