function validate(form) {
    let fail = '';
    fail = validateFirstname(form.firstname.value);
    fail += validateLastname(form.lastname.value);
    fail += validateUsername(form.username.value);
    fail += validatePassword(form.password.value);
    fail += validateAge(form.age.value);
    fail += validateEmail(form.email.value);
    if (fail === '') {
        return true;
    } else {
        alert(fail);
        return false;
    }
}

function validateFirstname(field) {
    return (field === "" || field.trim().length === 0) ? "First Name is required.\n" : "";
}

function validateLastname(field) {
    return (field === "" || field.trim().length === 0) ? "Last Name is required.\n" : "";
}

function validateUsername(field) {
    if (field === "" || field.trim().length === 0) {
        return "User Name is required.\n";
    } else if (field.length < 5) {
        return "User Name must be at least 5 characters.\n";
    } else if (/[^a-zA-Z0-9_-]/.test(field)) {
        return "Only a-z, A-Z, 0-9, - , and _ allowed in User Name"
    }
    return "";
}

function validatePassword(field) {
    if (field === "" || field.trim().length === 0) {
        return "Password is required.\n";
    } else if (field.length < 6) {
        return "Password must be at least 6 characters.\n";
    } else if (!/[a-z]/.test(field) || !/[A-Z]/.test(field) || !/[0-9]/.test(field)) {
        return "Password require one each of a-z, A-Z, and 0-9.\n";
    }
    return "";
}

function validateAge(field) {
    if (isNaN(field)||field=="") {
        return "Number Age is required.\n";
    } else if (field < 18 || field > 110) {
        return "Age must be between 18 and 110.\n";
    }
    return "";
}

function validateEmail(field) {
    if (field === "" || field.trim().length === 0) {
        return "Email is required.\n";
    } else if (!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field)) {
        return "Email is not valid.\n";
    }
    return "";
}