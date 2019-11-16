const search = document.getElementById('search');
const matchList = document.getElementById('match-list');
let states;

// Get states
const getStates = async () => {
 const res = await fetch('../data/states.json');
 states = await res.json();
};

// FIlter states
const searchStates = searchText => {
 // Get matches to current text input
 let matches = states.filter(state => {
  const regex = new RegExp(`^${searchText}`, 'gi');
  return state.name.match(regex) || state.abbr.match(regex);
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

window.addEventListener('DOMContentLoaded', getStates);
search.addEventListener('input', () => searchStates(search.value));


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