import { AdvanceSearch } from './advance-search';

const selected = {
    watefront: [1],
    bedrooms: [1, 2],
    waterfront: [1]
};

// Example with selected values
// const advSearch = new AdvanceSearch(selected);

// Example without selected values
const advSearch = new AdvanceSearch();

document.addEventListener('DOMContentLoaded', () => {
    const advSearchElem = document.querySelector('advance-search');
    advSearchElem.innerHTML = advSearch.render();
});