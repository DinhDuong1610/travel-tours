const sigin = document.getElementById('sigin');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    sigin.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    sigin.classList.remove("active");
});
document.getElementById('closeBtn').addEventListener('click', function() {
    document.querySelector('.sigin').style.display = 'none';
});
document.getElementById("signinButton").addEventListener("click", function() {
    window.location.href = "signin.html";
});
document.getElementById("sigin-index").addEventListener("click", function(event) {
    event.preventDefault();
});

