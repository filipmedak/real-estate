//-------------------------------------------------------------------------------------------------------------------
//Search engine autocorrect

const search = document.getElementById('search');
const matchList = document.getElementById('match-list');
let cities;

// Get cities
const getCity = async () => {
        const res = await fetch('../data/cities.json');
        cities = await res.json();
};

// FIlter cities
const searchCities = searchText => {
 // Get matches to current text input
 let matches = cities.filter(city => {
        const regex = new RegExp(`^${searchText}`, 'gi');
        return city.name.match(regex) || city.abbr.match(regex);
       });

        // Clear when input or matches are empty
        if (searchText.length === 0) {
        matches = [];
        matchList.innerHTML = '';
        }

        outputHtml(matches);
};

// Show results in HTML
const outputHtml = matches => {
 if (matches.length > 0) {
  const html = matches
   .map(
    match => `<div class="card card-body mb-1 p-2">
            <h4><a href="#">${match.name} (${match.abbr})</a></h4>
            </div>`
   )
   .join('');
  matchList.innerHTML = html;
 }
};

window.addEventListener('DOMContentLoaded', getCity);
search.addEventListener('input', () => searchCities(search.value));


//-------------------------------------------------------------------------------------------------------------------
//Hide language sticky element
let previousScrollPosition = window.pageYOffset;
const items = document.getElementById("sticky");

window.onscroll = function() {
        let currentScrollPosition = window.pageYOffset;
        if (previousScrollPosition > currentScrollPosition){
                items.style.opacity = "1";
        }
        else{
                items.style.opacity = "0";
                items.style.transitionDuration = "1.25s";
        }
        previousScrollPosition = currentScrollPosition;
}
//-------------------------------------------------------------------------------------------------------------------





// Hide/show login/signup
let buttonProfile = document.getElementById("dropdownProfile");
let windowProfile = document.getElementById("profileNavigation");
let windowCloseBtn = document.querySelector(".profileBtn");

buttonProfile.onclick = function(){
        windowProfile.style.display = "flex";
        windowCloseBtn.setAttribute("onclick", "closeWindow()");
}

function closeWindow(){
        windowProfile.style.display = "none";
}



// Slider value
let rangeslider = document.getElementById("sliderRange");
let output = document.getElementById("demo");
output.innerHTML = rangeslider.value;

rangeslider.oninput = function(){
        output.innerHTML = this.value;
        
}
