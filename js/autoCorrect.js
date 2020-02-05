//Global variables
const search = document.getElementById('search');
const matchList = document.getElementById('match-list');

//Compare input value to JSON transformed from PHP
const searchCities = async searchText =>{
    let matches = cities.filter(cities => {
        //^ - starts with  |  gi - global incase sensitive
        const regExp = new RegExp(`^${searchText}`, 'gi');
        return cities.name.match(regExp) || cities.id.match(regExp);
    });
    
    if(searchText.length === 0){
        matches = [];
        matchList.innerHTML = '';
    }
    //console.log(matches);
    outputHtml(matches);
}

//Show results in HTML
const outputHtml = matches => {
    if(matches.length > 0) {
        //Backticks for easier using of variables
        const html = matches.map(match => `
        <div class="card card-body firstUpper text-center">
            <h4 value="${match.id}">${match.name}</h4>
        </div>
        `
        //Transform into html
        ).join('');

    //console.log(html);
    matchList.innerHTML = html;
    }
};

//Move match value to input element for later php filtering
function moveValue(){
    search.value = this.innerHTML;
    //More than one symbol for splitting (| acts as separator)
    let splittedValue = search.value.split(/<|>/);
    let cityName = splittedValue[4];
    search.value = cityName;
    matchList.innerHTML = '';

    //console.log(cityName);
}


//Event listeners for input and click 
//Trying to use fat arrow (arrown func)
search.addEventListener('input', () => searchCities(search.value));
matchList.addEventListener('click', moveValue);
