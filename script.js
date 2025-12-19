function showSignup() {
document.getElementById('login').classList.add('hidden');
document.getElementById('signup').classList.remove('hidden');
}


function showLogin() {
document.getElementById('signup').classList.add('hidden');
document.getElementById('login').classList.remove('hidden');
}




const btnHabitat = document.getElementById("btnHabitat");
const habitat= document.querySelector(".habitat");
const habitatCancel = document.getElementById("habitatCancel");


btnHabitat.addEventListener("click",function(){
    habitat.classList.remove("hidden");

})

    habitatCancel.addEventListener('click', ()=>{
    habitat.classList.add("hidden");
    })