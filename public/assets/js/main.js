
$(document).ready(() => {

    //Remover alerta después de cierto tiempo
    setTimeout(() => {
        $(".alert-message").remove();
    }, 3000)

    //Validaciones para los formularios
    $.validate({
        modules: 'location, date, security, file',
        lang: 'es'
    });


    let select2Elemnt = $(".select2");

    if(select2Elemnt.length > 0){
        select2Elemnt.select2();
    }


})

//Para controlar todas las peticiones AJAX
class Ajax {
    constructor() {
      this.__METHOD = 'GET';
      this.__STATUS = null;
    }
    post(url, data) {
      this.__METHOD = 'POST';
      return this.__send(url, data);
    }

    get(url, data) {
      this.__METHOD = 'GET';
      return this.__send(url, data);
    }

    async __send(url, data) {
      const response = await fetch(url, {
        method: this.__METHOD, // *GET, POST, PUT, DELETE, etc.
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*',
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        mode: 'cors',
        body: this.__METHOD == 'POST' ? JSON.stringify(data) : undefined, // body data type must match "Content-Type" header
      })
        .then((response) => {
          this.__STATUS = response.status;
          return response.json();
        })
        .catch((e) => {
          console.log(`Error Interno: ${e.message}`);
        });

      return response;
    }
  }


  const $ajax = new Ajax();
