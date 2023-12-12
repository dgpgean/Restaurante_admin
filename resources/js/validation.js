const fieldsRequired = document.querySelectorAll('.required')
const btnSubmit = document.querySelector('.btn-submit')
const formSubmit = document.querySelector('form-submit')

btnSubmit.addEventListener('click', (e) => {
    formSubmit.addEventListener('submit', (event) => {
        event.preventDefault()
        if(validateFieldRequired()){
            formSubmit.submit()
        }
        // process data and submit a request manually
      })
})

function validateFieldRequired(){
    fieldsRequired.forEach((field)=>{
        if(field.value == '' || field.value == undefined){
            alert('teste')
            return false
        }
    })

    return true
}
