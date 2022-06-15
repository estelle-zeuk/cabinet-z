// Example POST method implementation:
async function postData(url = '', data, method = 'POST') {
    // Default options are marked with *

    const response = await fetch(url, {
        method: method, // *GET, POST, PUT, DELETE, etc.
        mode: 'cors', // no-cors, *cors, same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-Token": $('input[name="_token"]').val()
            // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify(data) // body data type must match "Content-Type" header
    });

    return response.json(); // parses JSON response into native JavaScript objects
}

// Example POST method implementation:
async function postFormData(url = '', data, method = 'POST') {
    // Default options are marked with *

    const response = await fetch(url, {
        method: method, // *GET, POST, PUT, DELETE, etc.
        mode: 'cors', // no-cors, *cors, same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-Token": $('input[name="_token"]').val()
            // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: data // body data type must match "Content-Type" header
    });

    return response.json(); // parses JSON response into native JavaScript objects
}

function uploadImage(source, url) {
    let imageSource = $('#loadedImage').val(source);
    console.log(imageSource);
    const formData = new FormData();
    formData.append('images', imageSource);
    formData.append('array', 'true');

    /* uploadFile(url, formData).then(response => {
             console.log(response);
         },
         error => {
             console.log(error);
         });*/
}

const  simpleFetch = async(url)=> {
    const response = await fetch(url, { // Your POST endpoint
        method:'GET',
        mode:'no-cors'
    });
    return response.json();
};

const  ajaxSubmitForm = async(form, dataType = 'json')=> {
    let data = new FormData(form[0]);
    let url = form.attr("action"), method = form.attr("method");
    return new Promise((resolve, reject) => {
        $.ajax({
            url: url,
            method: method,
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            dataType: dataType
        }).done(response=>{
            resolve(response);
        }).fail(error =>{
            reject(error);
        });
    });
};



