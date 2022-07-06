const tabItems = document.querySelectorAll("a[data-id='tabItem']");

tabItems?.forEach((item) => {
    item?.addEventListener("click", (e) => {
        const isActive = e.target.classList.contains("active");
        if (isActive) return;

        const activeTab = document.querySelector("a.active");
        toggleTabItem(activeTab);
        toggleTabItem(e.target);
        console.log("To tab: ", e.target.getAttribute("data-target"));
    });
});

function toggleTabItem(item) {
    item.classList.toggle("active");
    item.classList.toggle("not-active");
}
