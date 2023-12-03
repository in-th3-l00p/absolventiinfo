// handling joining
const canJoinCheck = document.querySelector("#can_join");
const joinContainer = document.querySelector("#has-join");

function showJoinContainer(show) {
    if (show)
        joinContainer.classList.remove("visually-hidden");
    else {
        joinContainer.classList.add("visually-hidden");
        for (const input of joinContainer.getElementsByTagName("input"))
            input.value = "";
    }
}

showJoinContainer(canJoinCheck.checked);
canJoinCheck.onchange = (e) => showJoinContainer(e.target.checked);
