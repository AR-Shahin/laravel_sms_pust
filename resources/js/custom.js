
window.myFun = (params) => {
    Swal.fire(params)
}

globalThis.setSwalMessage = (title = "Success",msg='Data Save Successfully!',flag= 'success') => {
    Swal.fire(
    title,
    msg,
    flag
    )
}

globalThis.base_path = window.location.origin
