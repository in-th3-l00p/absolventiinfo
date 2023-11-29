import axios from "axios";

const element = document.querySelector( '#editor' );
const editor = await ClassicEditor.create(element, {
    // plugins: [ SimpleUploadAdapter ],
    simpleUpload: {
        uploadUrl: "/announcements/1/upload",
        withCredentials: true
    }
});
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
