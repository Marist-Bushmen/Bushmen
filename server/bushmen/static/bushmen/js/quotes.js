// quotes.js
// All functionality for the quotes page
// Daniel Nicolas Gisolfi

// Populate the Modals with nessecary 
// data to make the request via the server

function confirmDelete(qid) {
    $(`#delete`).modal({
        show: true
    });

    $(`[name=qid]`).val(qid);
}