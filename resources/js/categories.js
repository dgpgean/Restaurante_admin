const btnNew = document.querySelector('#btnNew');
const btnDelete = document.querySelectorAll('.btnDelete');
const btnEdit = document.querySelectorAll('.btnEdit');
const newUrl = document.querySelector('#category_new');
const deleteUrl = document.querySelector('#category_delete');
const updateUrl = document.querySelector('#category_update');
//AJAX CADASTRO DE CATEGORIA

btnNew.addEventListener('click', () => {
    Swal.fire({
        title: "Cadastro de categoria",
        input: "text",
        inputAttributes: {
            autocapitalize: "off",
            placeholder: "Nome da Categoria",
            name: 'name',
            id: "nameCategory"
        },
        showCancelButton: true,
        confirmButtonText: "Cadastrar",
        cancelButtonText: "Cancelar",
        showLoaderOnConfirm: true,
        preConfirm: async (login) => {
            try {
                const url = newUrl.value
                const data = {
                    name: document.querySelector('#nameCategory').value
                }
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'url': '/payment',
                        "X-CSRF-Token": document.querySelector('input[name=_token]')
                            .value
                    },
                    body: JSON.stringify(data),
                });
                if (!response.ok) {
                    let error = await response.json()
                    return Swal.showValidationMessage(`
                    ${error.message}
                `);
                }
                return response.json();
            } catch (error) {
                Swal.showValidationMessage(`
                Request failed: ${error}
            `);
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: "success",
                title: "Categoria cadastrada com sucesso!",
                showConfirmButton: true,
            }).then(result => {
                if(result.isConfirmed){
                    window.location.reload();
                }
              });
        }
    });
})



//AJAX EDITAR CATEGORIA
btnEdit.forEach(btn => {
    btn.addEventListener('click', () => {
        Swal.fire({
            title: "Atualização de categoria",
            input: "text",
            showCloseButton: true,
            inputValue:btn.value.split(',')[1],

            inputAttributes: {
                autocapitalize: "off",
                placeholder: "Nome da Categoria",
                name: 'name',
                id: "nameCategory"
            },
            showCancelButton: true,
            confirmButtonText: "Ataulizar",
            cancelButtonText: "Excluir",
            cancelButtonColor: "#d33",
            showLoaderOnConfirm: true,
            preConfirm: async (login) => {
                try {
                    const url = updateUrl.value + '/' +btn.value.split(',')[0]
                    const data = {
                        name: document.querySelector('#nameCategory').value
                    }
                    const response = await fetch(url, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            "X-CSRF-Token": document.querySelector('input[name=_token]').value
                        },
                        body: JSON.stringify(data),
                    });

                    if (!response.ok) {
                        let error = await response.json()
                        return Swal.showValidationMessage(`
                        ${error.message}
                    `)};


                } catch (error) {
                    alert(error)
                    Swal.showValidationMessage(`
                    Request failed: ${error}
                `);
                }
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "success",
                    title: "Categoria ataulizada com sucesso!",
                    showConfirmButton: true,
                }).then(result => {
                    if(result.isConfirmed){
                        window.location.reload();
                    }
                  });
            }
            else if (result.dismiss == 'cancel'){
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                      confirmButton: "btn btn-success ml-2",
                      cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                  });
                  swalWithBootstrapButtons.fire({
                    title: "Deseja excluir essa categoria?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Comfirmar",
                    cancelButtonText: "Cancelar",
                    reverseButtons: true
                  }).then((result) => {
                    if (result.isConfirmed) {
                        async function deleteCategory () {
                            try {
                                const url = deleteUrl.value + '/' + btn.value.split(',')[0]
                                const response = await fetch(url, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'url': '/payment',
                                        "X-CSRF-Token": document.querySelector('input[name=_token]')
                                            .value
                                    }
                                 });
                                const result = await response.json();
                                if (!result) {
                                    console.log(response)
                                    return
                                }
                                swalWithBootstrapButtons.fire({
                                    title: "Categoria excluída!",
                                    icon: "success"
                                  }).then(result => {
                                    if(result.isConfirmed){
                                        window.location.reload();
                                    }
                                  });
                            } catch (error) {
                                Swal.showValidationMessage(`
                                Request failed: ${error}
                            `);
                            }
                        }
                        deleteCategory()
                    } else if (
                      /* Read more about handling dismissals below */
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                      swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "Categoria não excluída",
                        icon: "error"
                      });

                    }
                  });
            }
        });
    })

})
