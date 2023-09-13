console.log('Debugging: Session message exists');
if (sessionData.message) {
    console.log('Debugging: Session message found');
    var type = sessionData.alertType;
    switch (type) {
        case 'info':
            console.log('Debugging: Displaying info message');
            toastr.info(sessionData.message);
            break;
        case 'success':
            console.log('Debugging: Displaying success message');
            toastr.success(sessionData.message);
            break;
        case 'warning':
            console.log('Debugging: Displaying warning message');
            toastr.warning(sessionData.message);
            break;
        case 'error':
            console.log('Debugging: Displaying error message');
            toastr.error(sessionData.message);
            break;
    }
}
