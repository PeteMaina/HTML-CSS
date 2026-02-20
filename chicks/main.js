document.addEventListener('DOMContentLoaded', () => {
    // Update footer year
    const yearSpan = document.getElementById('year');
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }

    // Add smooth entry animations or other interactive elements here
    console.log('Feathery Friends Farm site loaded.');
});
