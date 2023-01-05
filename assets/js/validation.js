const contactRulesHandler = {
    dateAnniversaire: {
        validateDate: true
    }
};
const errorMessagesContactHandler = {
    nom: {
        required: stringFormat(formControlErrorMessage.required, "nom"),
        minlength: stringFormat(formControlErrorMessage.minlength, 3),
        maxlength: stringFormat(formControlErrorMessage.maxlength, 50)
    },
    prenom: {
        required: stringFormat(formControlErrorMessage.required, "prenom"),
        minlength: stringFormat(formControlErrorMessage.minlength, 2),
        maxlength: stringFormat(formControlErrorMessage.maxlength, 50)
    },
    numero: {
        required: stringFormat(formControlErrorMessage.required, "numero"),
        minlength: stringFormat(formControlErrorMessage.minlength, 3),
        maxlength: stringFormat(formControlErrorMessage.maxlength, 20)
    },
    email: {
        minlength: stringFormat(formControlErrorMessage.minlength, 5),
        maxlength: stringFormat(formControlErrorMessage.maxlength, 100),
        email: formControlErrorMessage.email.toString()
    },
    address: {
        maxlength: stringFormat(formControlErrorMessage.maxlength, 100),
    },
    note: {
        maxlength: stringFormat(formControlErrorMessage.maxlength, 100),
    },
};

jQuery.validator.addMethod("validateDate", function (value) {
    const regex = new RegExp("\\d{4}-\\d{2}-\\d{2}");
    return value === "" ? true : regex.test(value);
}, userErrorMessage.date);


function validationModification() {

    const form = $("#detailsModificationForm");

    // Validation du nom
    const nom = $("#nom").val();
    const isValidNom = validateNom(nom);

    //Validation du Prenom
    const prenom = $("#prenom").val();
    const isValidPrenom = validatePrenom(prenom);

    //validation numéro
    const numero = $("#numero").val();
    const isValidNumero = validateNumero(numero);

    //validation Email
    const email = $("#email").val();
    const isValidEmail = validateEmail(email);

    //validation adresse
    const address = $("#address").val();
    const isValidAdresse = validateAdresse(address);

    //validation note
    const note = $("#note").val();
    const isValidNote = validateNote(note);

    if (!isValidNom || !isValidPrenom || !isValidNumero || !isValidAdresse || !isValidNote || !isValidEmail) {
        form.preventDefault();
    }
}

function validateEventListener() {
    validateNomEventListener();
    validatePrenomEventListener();
    validateNumeroEventListener();
    validateEmailEventListener();
    validateAdresseEventListener();
    validateNoteEventListener();
}

function validateNom(value) {
    let isValide = true;
    const champError = $("#errorNom");
    const nomChamp = "nom";

    if (checkEmpty(value)) {
        champError.text(stringFormat(userErrorMessage.empty, nomChamp));
        isValide = false;
    } else if (checkMinLength(value, 3)) {
        champError.text(stringFormat(userErrorMessage.minLength, nomChamp, 3));
        isValide = false;
    } else if (checkMaxLength(value, 50)) {
        champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 50));
        isValide = false;
    }

    return isValide;
}

function validateNomEventListener() {
    $("#nom").on("keyup", () => {
        const champError = $("#errorNom");
        const nomChamp = "nom";
        const nom = $("#nom").val();

        if (checkEmpty(nom)) {
            champError.text(stringFormat(userErrorMessage.empty, nomChamp));
        } else if (checkMinLength(nom, 3)) {
            champError.text(stringFormat(userErrorMessage.minLength, nomChamp, 3));
        } else if (checkMaxLength(nom, 50)) {
            champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 50));
        } else {
            champError.text("");
        }
    });

}

function validatePrenom(value) {
    let isValide = true;
    const champError = $("#errorPrenom");
    const nomChamp = "prenom";

    if (checkEmpty(value)) {
        champError.text(stringFormat(userErrorMessage.empty, nomChamp));
        isValide = false;
    } else if (checkMinLength(value, 3)) {
        champError.text(stringFormat(userErrorMessage.minLength, nomChamp, 3));
        isValide = false;
    } else if (checkMaxLength(value, 50)) {
        champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 50));
        isValide = false;
    }

    return isValide;
}

function validatePrenomEventListener() {

    $("#prenom").on("keyup", () => {
        const champError = $("#errorPrenom");
        const nomChamp = "prenom";
        const prenom = $("#prenom").val();

        if (checkEmpty(prenom)) {
            champError.text(stringFormat(userErrorMessage.empty, nomChamp));
        } else if (checkMinLength(prenom, 3)) {
            champError.text(stringFormat(userErrorMessage.minLength, nomChamp, 3));
        } else if (checkMaxLength(prenom, 50)) {
            champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 50));
        } else {
            champError.text("")
        }
    });
}

function validateNumero(value) {
    let isValide = true;
    const champError = $("#errorNumero");
    const nomChamp = "numéro";

    if (checkEmpty(value)) {
        champError.text(stringFormat(userErrorMessage.empty, nomChamp));
        isValide = false;
    } else if (checkMinLength(value, 5)) {
        champError.text(stringFormat(userErrorMessage.minLength, nomChamp, 5));
        isValide = false;
    } else if (checkMaxLength(value, 20)) {
        champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 20));
        isValide = false;
    } else if (!checkIsNotNumber(value)) {
        champError.text(stringFormat(userErrorMessage.number));
        isValide = false;
    }

    return isValide;
}

function validateNumeroEventListener() {
    $("#numero").on("keyup", () => {
        const champError = $("#errorNumero");
        const nomChamp = "numéro";
        const numero = $("#numero").val();

        if (checkEmpty(numero)) {
            champError.text(stringFormat(userErrorMessage.empty, nomChamp));
        } else if (checkMinLength(numero, 5)) {
            champError.text(stringFormat(userErrorMessage.minLength, nomChamp, 5));
        } else if (checkMaxLength(numero, 20)) {
            champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 20));
        } else if (!checkIsNotNumber(numero)) {
            champError.text(stringFormat(userErrorMessage.number));
        } else {
            champError.text("")
        }
    });
}

function validateEmail(value) {
    let isValide = true;
    const champError = $("#errorEmail");
    const nomChamp = "Email";

    if (checkMaxLength(value, 100)) {
        champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 100));
        isValide = false;
    } else if (!checkIsNotEmail(value)) {
        champError.text(stringFormat(userErrorMessage.email));
        isValide = false;
    }

    return isValide;
}

function validateEmailEventListener() {
    $("#email").on("keyup", () => {
        const champError = $("#errorEmail");
        const nomChamp = "Email";
        const email = $("#email").val();

        if (checkMaxLength(email, 100)) {
            champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 100));
        } else if (!checkIsNotEmail(email)) {
            champError.text(stringFormat(userErrorMessage.email));
        } else {
            champError.text("")
        }
    });
}


function validateAdresse(value) {
    let isValide = true;
    const champError = $("#errorAdresse");
    const nomChamp = "adresse";
    if (checkMaxLength(value, 100)) {
        champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 100));
        isValide = false;
    }

    return isValide;
}

function validateAdresseEventListener() {
    $("#address").on("keyup", () => {
        const champError = $("#errorAdresse");
        const nomChamp = "adresse";
        const adresse = $("#address").val();
        ;
        if (checkMaxLength(adresse, 100)) {
            champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 100));
        } else {
            champError.text("")
        }
    })
}

function validateNote(value) {
    let isValide = true
    const champError = $("#errorNote");
    const nomChamp = "note";
    if (checkMaxLength(value, 100)) {
        champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 100));
        isValide = false;
    }

    return isValide;
}

function validateNoteEventListener() {
    $("#note").on("keyup", () => {
        const champError = $("#errorNote");
        const nomChamp = "Note";
        const note = $("#note").val();
        ;
        if (checkMaxLength(note, 100)) {
            champError.text(stringFormat(userErrorMessage.maxLength, nomChamp, 100));
        } else {
            champError.text("")
        }
    })
}

function checkIsNotEmail(value) {
    const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(\\".+\\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    return regex.test(value);
}

function checkIsNotNumber(element) {
    const regex = /^\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/;
    return regex.test(element);
}

function checkMinLength(element, length) {
    return element.trim().length < length && element.trim().length !== 0;
}

function checkMaxLength(element, length) {
    return element.trim().length > length && element.trim().length !== 0;
}

function checkEmpty(element) {
    return element.trim().length === 0;
}