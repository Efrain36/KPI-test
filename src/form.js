fetch('CountryData.json')
    .then(response => response.json())
    .then(data => {
        const select = document.getElementById('fcountry');
        data.forEach(item => {
            const option = document.createElement('option');
            option.value = item.iso;
            option.text = `${item.name}`;
            select.appendChild(option);
        });
    })
    .catch(error => console.error('Error:', error));

function updatePrefix(country) {
    fetch('../src/getPrefix.php?country=' + country)
        .then(response => {
            if (!response.ok) {
                throw new Error('errorS');
            }
            return response.text();
        })
        .then(data => {
            document.getElementById('fprefix').value = data;
        })
        .catch(error => {
            console.error('Error updating the prefix', error);
        });
}

function submitForm(e) {
    document.getElementById('form').reset();
}
