const Product = {
    table: null,
    datatable() {
        const settings = {
            el: '#datatables',
            columns: [{
                    title: 'ID',
                    data: 'id'
                },
                {
                    title: 'Nombre',
                    data: 'name'
                },
                {
                    title: 'Categoría',
                    data: 'category.description'
                },
                {
                    title: 'Stock',
                    data: 'stock'
                },
                {
                    title: 'Precio',
                    data: 'price'
                },
            ],
            othersButtons: (row) => {
                return `<a class="dropdown-item" href="/sales/${row.id}"><i class="fas fa-shopping-cart"></i> Vender</a>`
            }
        }

        this.table = new DataTable(settings)
    }
}


const Category = {
    modalElement: $("#modalCategory"),
    submitButton: null,
    init() {
        this.submitButton = this.modalElement.find('form').find('button[type=submit]');

        //Llamar a todas las categorías
        this.get();

        //Botón para mostrar el modal
        $("select[name=category_id]").parent().find('button').click(() => {
            this.modalElement.modal('show')
        })

        //Enviar formulario por ajax
        this.modalElement.find('form').submit((e) => {

            e.preventDefault();

            let data = {
                description: this.modalElement.find('input[name=description]').val(),
            }

            if (data.description == "") {
                return;
            }

            //Carga al botón
            this.submitButton.html('<i class="fas fa-spinner fa-spin"></i> Guardar').attr('disabled', 'disabled');

            this.store(data);
        })
    },
    async get() {
        let data = await $ajax.get('/categories');

        let select2Html = '';
        let categorySelect2 = $("select[name=category_id]");
        data.forEach((item) => {
            select2Html += `<option value="${item.id}">${item.description}</option>`;
        })

        categorySelect2.html(select2Html);

        let value = categorySelect2.data('value');

        if (value) {
            categorySelect2.val(value).trigger('change')
        }

    },
    async store(data) {
        let response = await $ajax.post('/categories/store', data);

        this.submitButton.html('Guardar').removeAttr('disabled');

        if (!response.isSuccess) {
            return alert(`Error: ${response.message}`);
        }

        //Actualizar el select de categorías
        this.get();

        //LImpiar input
        this.modalElement.find('input[name=description]').val("")

        return alert(`Éxito: ${response.message}`);

    }
}
