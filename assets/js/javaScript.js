function formIndexToDetailsSubmit(id) {
    document.getElementById("id").value = id;
    $("#formIndexToDetails").submit();
}

function modificationDetailsSubmit() {
    let detailsModifictionForm = $("#detailsModificationForm");

    detailsModifictionForm.submit();
}

function submitDeleteForm() {
    $("#deleteFormIndex").submit();
}

function deleteContactSubmit() {
    let deleteForm = $("#deleteForm");
    deleteForm.submit();
}

function selectBoxSubmit() {
    $("#selectBox").submit();
}

function getId(id) {
    document.getElementById("idDelete").value = id;
}

function modificationContactHtmlActions() {
    disabledElementById("nom");
    disabledElementById("prenom");
    disabledElementById("numero");
    disabledElementById("email");
    disabledElementById("dateAnniversaire");
    disabledElementById("address");
    disabledElementById("note");
    showOrHideElementById("submitButton", true);
    showOrHideElementById("cancelButton", true);
    showOrHideElementById("modificationButton", false);
    showOrHideElementById("deleteButton", false);
}

function hideElements() {
    $("#submitButton").hide();
    $("#cancelButton").hide();
}

function saveMyContact() {
    const ajoutForm = $("#ajoutContactForm");

    ajoutForm.validate({
        rules: contactRulesHandler,
        messages: errorMessagesContactHandler,
    });
    ajoutForm.validate();

    if (ajoutForm.validate()) {
        ajoutForm.submit();
    }
}

function refreshPage() {
    location.reload();
}


