const forms = document.getElementsByClassName("confirm-form");
for (const form of forms) {
    form.onsubmit = (e) => {
        e.preventDefault();
        const modalElement = document.createElement("div");
        modalElement.classList.add("modal", "fade");
        modalElement.id = "confirmModal";
        modalElement.setAttribute("tabindex", "-1");
        modalElement.setAttribute("role", "dialog");
        modalElement.setAttribute("aria-labelledby", "confirmModalLabel");
        modalElement.setAttribute("aria-hidden", "true");
        modalElement.innerHTML = `
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Esti sigur(a) ?</h5>
                        <button
                            type="button"
                            class="btn-close close"
                            about="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                            <div class="modal-buttons">
                                <button id="confirm" class="btn btn-danger">Da</button>
                                <button
                                    id="cancel"
                                    class="btn btn-dark close"
                                >
                                    Nu
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        `;

        modalElement
            .getElementsByTagName("button")
            .item(1)
            .onclick = () => form.submit();
        document.body.appendChild(modalElement);

        const modal = new bootstrap.Modal(document.getElementById("confirmModal"), {});
        for (const button of modalElement.getElementsByClassName("close"))
            button.onclick = () => modal.hide();
        modal._element.addEventListener("hidden.bs.modal", () => {
            document.body.removeChild(modalElement);
        });
        modal.show();
    }
}
