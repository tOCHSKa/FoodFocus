const searchContainer = document.querySelector('.search-bar');
const searchResultContainer = document.querySelector('.search-result-container');
const search = document.querySelector('#search');
const body = document.querySelector('body');

search.addEventListener('keyup', () => {
    const trimmedValue = search.value.trim();
    const regex = /^[a-zA-Z\s]+$/;

    profileContainer.style.opacity = '0.5';
    dateContainer.style.opacity = '0.5';
    gaugeContainer.style.opacity = '0.5';
    macrosPersonalInfoSection.style.opacity = '0.5';
    rightSection.style.opacity = '0.5';
    suiviContainer.style.opacity = '0.5';

    body.classList.add('search-active');

    searchResultContainer.style.display = 'block';
    searchContainer.style.borderRadius = '20px 20px 0 0';
    searchContainer.style.borderBottom = '1px solid var(--primary-color)';

    if (!regex.test(trimmedValue) || trimmedValue === '') {
        profileContainer.style.opacity = '1';
        dateContainer.style.opacity = '1';
        gaugeContainer.style.opacity = '1';
        macrosPersonalInfoSection.style.opacity = '1';
        rightSection.style.opacity = '1';
        suiviContainer.style.opacity = '1';

        body.classList.remove('search-active');

        searchResultContainer.style.display = 'none';
        searchContainer.style.borderRadius = '20px';
        searchContainer.style.borderBottom = 'none';
    }
});


const searchAlimentQuantity = document.querySelector('.search-aliment-quantity');
const ajoutAlimnet = document.querySelector('#plus-aliment-button');

searchAlimentQuantity.addEventListener('keyup', () => {
    const trimmedValue = searchAlimentQuantity.value.trim();
    const regex = /^[1-9]\d*$/;

    ajoutAlimnet.disabled = !regex.test(trimmedValue);

});