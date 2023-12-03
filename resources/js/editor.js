import axios from "axios";

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

        const save = async () => {
            await axios.put(updateRoute, {
                content: editor.getData()
            }, {
                withCredentials: true
            });
        }

        // saves each 5 sec
        setInterval(save, 5000);
        window.onbeforeunload = save;

        document.querySelector("#visibility").onchange = () => {
            document
                .querySelector("#main-form")
                .submit();
        }
    });
