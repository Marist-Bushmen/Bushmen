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

function searchByAuthor(author) {
    $(`[name=query]`).val(`author=${author}`);
    $( `[name=search]`).trigger( "click" );
}

function checkErr(err) {
    if (err == 1) {
        $('#success').removeClass('collapse');
    } else {
        $('#failure').removeClass('collapse');
    }
}