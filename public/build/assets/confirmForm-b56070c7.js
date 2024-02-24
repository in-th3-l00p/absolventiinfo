const n=document.getElementsByClassName("confirm-form");for(const o of n)o.onsubmit=d=>{d.preventDefault();const t=document.createElement("div");t.classList.add("modal","fade"),t.id="confirmModal",t.setAttribute("tabindex","-1"),t.setAttribute("role","dialog"),t.setAttribute("aria-labelledby","confirmModalLabel"),t.setAttribute("aria-hidden","true"),t.innerHTML=`
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
        `,t.getElementsByTagName("button").item(1).onclick=()=>o.submit(),document.body.appendChild(t);const e=new bootstrap.Modal(document.getElementById("confirmModal"),{});for(const a of t.getElementsByClassName("close"))a.onclick=()=>e.hide();e._element.addEventListener("hidden.bs.modal",()=>{document.body.removeChild(t)}),e.show()};
