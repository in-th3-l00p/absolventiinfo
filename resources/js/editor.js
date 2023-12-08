function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

const element = document.querySelector( '#editor' );
ClassicEditor.create(element, {
    // plugins: [ SimpleUploadAdapter ],
    simpleUpload: {
        uploadUrl: uploadRoute,
        withCredentials: true,
        headers: {
            "X-XSRF-TOKEN": getCookie("XSRF-TOKEN") // have no idea why i need to send it :(
        }
    }
})
    .then(editor => {
        editor.setData(content || "");
        window.editor = editor;
    });

document.querySelector("#main-form").onsubmit = (e) => {
    const content = window.editor.getData();
    document.querySelector("#content").value = content;
    return true;
}

window.addEventListener("beforeunload", function (e) {
    let confirmationMessage = 'It looks like you have been editing something. '
        + 'If you leave before saving, your changes will be lost.';

    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
    return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
});
