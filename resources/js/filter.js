const desc = document.querySelector("#sortDesc");
const listRadioSort = document.querySelectorAll("input[data-id='sortRadio']");
const listLabelSort = document.querySelectorAll("label[data-id='sortRadio']");
const listRadioType = document.querySelectorAll("input[data-id='typeRadio']");

listRadioType?.forEach((el) => {
    el.addEventListener("change", (e) => {
        desc.textContent = e.target.getAttribute("id");
        enablePriceSort();
    });
});

function enablePriceSort() {
    listLabelSort.forEach((el) => {
        el.classList.remove("text-neutral-400");
        el.classList.add("text-neutral-600");
    });

    listRadioSort.forEach((el) => el.removeAttribute("disabled"));
}

// Handle multiple form submit
const searchForm = document.querySelector("#searchForm");
const filterForm = document.querySelector("#filterForm");
const queryInput = document.querySelector("#query");
const keywordInput = document.querySelector("#keywordInput");

// Everytime searchbar (queryInput) input changed, the value will be get copy to 'keywordInput'
queryInput?.addEventListener("input", () =>
    keywordInput.setAttribute("value", queryInput.value)
);

searchForm?.addEventListener("submit", (e) => {
    e.preventDefault();
    filterForm.submit();
});
