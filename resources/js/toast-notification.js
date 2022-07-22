const toast = document.querySelector("#toast") ?? false;

if (toast) {
    setTimeout(() => {
        toast.style.opacity = 0;
        toast.style.visibility = "hidden";
    }, 1500);
}
