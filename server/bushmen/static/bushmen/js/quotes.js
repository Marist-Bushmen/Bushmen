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
    
    // $( ``).trigger( "click" );
}


// $(document).ready(function() { 
//     $('.SearchByAuthor').click(function() {
//         $(`[name=query]`).val(`author=dan`);
//         $('[name=search]').submit();
//     });
// });

function checkErr(err) {
    if (err == 1) {
        $('#success').removeClass('collapse');
    } else {
        $('#failure').removeClass('collapse');
    }
}