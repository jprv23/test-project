class DataTable {

    constructor(config) {

        this._CONFIG = config;
        this._TABLE = null;



        if ($(this._CONFIG.el).length > 0) {

            $(this._CONFIG.el).html(`

                <div class="table-responsive text-nowrap">
                    <table class="table">
                    </table>
                </div>
            `)

            this.render();
        }

    }


    render() {

        this._TABLE = $(`${this._CONFIG.el} table`).DataTable({
            "autoWidth": false,
            "bFilter": true,
            "sDom": 'fBtlpi',
            'pagingType': 'numbers',
            "language": {
                search: ' ',
                sLengthMenu: '_MENU_',
                searchPlaceholder: "Buscar...",
                searchPlaceholder: "Buscar...",
                info: "_START_ - _END_ of _TOTAL_ registros",
            },
            initComplete: (settings, json) => {
                $('.dataTables_filter').appendTo('#tableSearch');
                $('.dataTables_filter').appendTo('.search-input');
            },
            processing: true,
            serverSide: true,
            ajax: window.location,
            responsive: true,
            "bLengthChange": false,
            order: [
                [0, 'desc']
            ],
            columns: [
                ...this._CONFIG.columns,
                {
                    title: '',
                    className: 'w-action',
                    width: '5%',
                    render: (data, x, row) => {
                        const currentRow = window.location;
                        const _token = $('meta[name="csrf-token"]').attr('content')
                        let actions = '';
                        if (this._CONFIG.othersButtons) {
                            actions = this._CONFIG.othersButtons(row, currentRow)
                        }

                        let editButton = `<a class="dropdown-item" href="${currentRow}/${row.id}/edit"><i class="fas fa-edit mr-2"></i> Editar</a>`

                        if (this._CONFIG.showEditButton === false) {
                            editButton = '';
                        }

                        let deleteButton = `

                                <form class="form-delete" action="${currentRow}/${row.id}" method="POST">
                                    <input type="hidden" name="_token" value="${ _token }">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a class="confirm-text dropdown-item">
                                        <i class="fas fa-trash-alt mr-2"></i> Eliminar
                                    </a>
                                </form>

                        `

                        if (this._CONFIG.showDeleteButton === false) {
                            deleteButton = '';
                        }

                        return `
                        <div class="btn-group">
                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu">
                                ${editButton}
                                ${actions}
                                ${deleteButton}
                            </div>
                        </div>
                        `;
                    },
                    orderable: false,
                    visible: this._CONFIG.actions === false ? false : true,

                }
            ],
            fnDrawCallback: () => {
                $(".confirm-text").on("click", function () {

                    if (confirm("¿Desea eliminar el registro?") == true) {
                        $(this).parent().submit();
                    }
                });


                if (this._CONFIG.fnDrawCallback) {
                    this._CONFIG.fnDrawCallback();
                }
            }
        });

    }

}
