document.querySelector('input[name="email"]').addEventListener('input', function() {
    this.classList.remove('input-error');
});

document.querySelector('input[name="password"]').addEventListener('input', function() {
    this.classList.remove('input-error');
});