/**
 * Event Countdown Logic
 */

document.addEventListener('DOMContentLoaded', () => {
    const daysEl = document.getElementById('cd-days');
    const hoursEl = document.getElementById('cd-hours');
    const minsEl = document.getElementById('cd-mins');
    const secsEl = document.getElementById('cd-secs');

    if (!daysEl) return; // Exit if not on home page

    // Set target date to October 6 of the current year (or next year if already passed)
    const now = new Date();
    let targetYear = now.getFullYear();
    let targetDate = new Date(`October 6, ${targetYear} 18:00:00`);

    if (now.getTime() > targetDate.getTime()) {
        targetYear++;
        targetDate = new Date(`October 6, ${targetYear} 18:00:00`);
    }

    function updateCountdown() {
        const currentTime = new Date().getTime();
        const difference = targetDate.getTime() - currentTime;

        if (difference <= 0) {
            daysEl.innerText = '00';
            hoursEl.innerText = '00';
            minsEl.innerText = '00';
            secsEl.innerText = '00';
            return;
        }

        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        daysEl.innerText = days.toString().padStart(2, '0');
        hoursEl.innerText = hours.toString().padStart(2, '0');
        minsEl.innerText = minutes.toString().padStart(2, '0');
        secsEl.innerText = seconds.toString().padStart(2, '0');
    }

    // Initial call
    updateCountdown();
    // Update every second
    setInterval(updateCountdown, 1000);
});
