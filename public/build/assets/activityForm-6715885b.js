const o=document.querySelector("#can_join"),n=document.querySelector("#has-join");function c(e){if(e)n.classList.remove("visually-hidden");else{n.classList.add("visually-hidden");for(const t of n.getElementsByTagName("input"))t.value=""}}c(o.checked);o.onchange=e=>c(e.target.checked);