const toast = document.querySelector("#toast") ?? false;

if (toast) {
    setTimeout(() => {
        toast.style.opacity = 0;
    }, 1500);
}
