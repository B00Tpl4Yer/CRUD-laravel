// Function to toggle between Dark Mode and Light Mode
const toggleMode = () => {
    const body = document.body;
    const toggleBtn = document.querySelector(".toggle-btn");
    const toggleIcon = document.querySelector("#toggle-icon");
    const sidebar = document.querySelector(".sidebar");
    const latar = document.querySelector(".card");
    const p = document.querySelector(".p");
    const modal = document.querySelectorAll(".modal-content");

    body.classList.toggle("dark-mode");
    sidebar.classList.toggle("dark-sidebar");
    latar.classList.toggle("dark-card");
    p.classList.toggle("dark-p");
    modal.forEach((modal) => {
        modal.classList.toggle("modal-dark"); // Tambahkan atau hilangkan class "modal-dark" pada setiap modal
    });
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.querySelector(".toggle-btn");
        toggleBtn.addEventListener("click", toggleMode);
    });

    if (body.classList.contains("dark-mode")) {
        toggleIcon.classList.remove("fa-toggle-on");
        toggleIcon.classList.add("fa-toggle-off");
        toggleBtn.classList.add("on");
    } else {
        toggleIcon.classList.remove("fa-toggle-off");
        toggleIcon.classList.add("fa-toggle-on");
        toggleBtn.classList.remove("on");
    }
    if (!sidebar.classList.contains("dark-sidebar")) {
        sidebar.classList.add("dark-sidebar");
    }
    if (!latar.classList.contains("dark-card")) {
        latar.classList.add("dark-card");
    }
    if (!p.classList.contains("dark-p")) {
        p.classList.add("dark-p");
    }
};

//jam analog
const secondHand = document.querySelector(".jarum_detik");
const minuteHand = document.querySelector(".jarum_menit");
const jarum_jam = document.querySelector(".jarum_jam");

function setDate() {
    const now = new Date();

    const seconds = now.getSeconds();
    const secondsDegrees = (seconds / 60) * 360 + 90;
    secondHand.style.transform = `rotate(${secondsDegrees}deg)`;
    if (secondsDegrees === 90) {
        secondHand.style.transition = "none";
    } else if (secondsDegrees >= 91) {
        secondHand.style.transition =
            "all 0.05s cubic-bezier(0.1, 2.7, 0.58, 1)";
    }

    const minutes = now.getMinutes();
    const minutesDegrees = (minutes / 60) * 360 + 90;
    minuteHand.style.transform = `rotate(${minutesDegrees}deg)`;

    const hours = now.getHours();
    const hoursDegrees = (hours / 12) * 360 + 90;
    jarum_jam.style.transform = `rotate(${hoursDegrees}deg)`;
}

setInterval(setDate, 1000);
