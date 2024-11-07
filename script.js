function validateForm() {
    const form = document.forms["studentForm"];
    let isValid = true;
    let messages = [];

    const firstName = form["firstName"].value.trim();
    if (firstName === ''){
        messages.push("Oops..!, You Forgot to fill First Name");
        isValid = false;
    }

    const lastName = form["lastName"].value.trim();
    if (lastName === ''){
        messages.push("Oops..!, You Forgot to fill Last Name");
        isValid = false;
    }

    const regNo = form["regNumber"].value.trim();
    if (regNo === ''){
        messages.push("Oops..!, You Forgot to fill Registration Number");
        isValid = false;
    }
    if (regNo.length < 8) {
        messages.push("Oops..!, Your Regisration Number should be at least 8 characters long");
        isValid = false;
    }

    const phone = form["phoneNumber"].value.trim();
    if (phone === ''){
        messages.push("Oops..!, You Forgot to fill Mobile Number");
        isValid = false;
    }
    if (phone.length < 10 || !/^\d{10}$/.test(phone)){
        messages.push("Oops..!, Your Mobile Number should be 10 digits long");
        isValid = false;
    }

    const email = form["emailAddress"].value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === ''){
        messages.push("Oops..!, You Forgot to fill Email Address");
        isValid = false;
    }
    if (!emailPattern.test(email)){
        messages.push("Oosp..!, Your Email Address is not valid");
        isValid = false;
    }
    
    const address = form["studentAddress"].value.trim();
    if (address === ''){
        messages.push("Oops..! You Forgot to fill the Student Address");
        isValid = false;
    }

    if (isValid) {
        alert(messages.jooin("\n"));
    }
    
    return isValid;
}