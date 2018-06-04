$(function() {
  $.ajax({
    type: "GET",
    url: "user/getAllUser/"
  }).done(function(countries) {
    countries.unshift({ id: "0", name: "" });

    $("#jsGrid").jsGrid({
      height: "300px",
      width: "100%",
      filtering: true,
      inserting: true,
      editing: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 10,
      pageButtonCount: 5,
      deleteConfirm: "Do you really want to delete client?",
      controller: {
        loadData: function(filter) {
          return $.ajax({
            type: "GET",
            url: "user/getAllUser/",
            data: filter
          });
        },
        insertItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "user/addUser/",
            data: item
          });
        },
        updateItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "user/editUser/",
            data: item
          });
        },
        deleteItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "user/deleteUser/",
            data: item
          });
        }
      },
      fields: [ 
        {
          name: "id_user",
          title: "ID User",
          type: "text",
          width: 75
        },
         {
          name: "NIK",
          title: "NIK",
          type: "text",
          width: 100
        },
         {
          name: "nama",
          title: "Nama User",
          type: "text",
          width: 150
        },
        {
          name: "username",
          title: "Username / Email",
          type: "text",
          width: 150
        },
         {
          name: "password",
          title: "Password",
          type: "password",
          width: 150
        },
         {
          name: "tglLahir",
          title: "Tanggal Lahir",
          type: "text",
          width: 150
        },
         {
          name: "alamat",
          title: "Alamat",
          type: "text",
          width: 150
        },
         {
          name: "jenis_kelamin",
          title: "Jenis Kelamin",
          type: "text",
          width: 150
        },
        {
          name: "kota",
          title: "Kota Asal",
          type: "text",
          width: 150
        },
        {
          name: "pendidikan_terakhhir",
          title: "Pendidikan Terakhir",
          type: "text",
          width: 50
        },
        {
          name: "pekerjaan",
          title: "Pekerjaan",
          type: "text",
          width: 50
        },
        {
          name: "status",
          title: "status",
          type: "text",
          width: 50
        },
            {
          name: "umur",
          title: "Umur",
          type: "text",
          width: 50
        },
        {
          name: "status_user",
          title: "Status User",
          type: "text",
          width: 50
        },
        { type: "control" }
      ]
    });
  });
});
