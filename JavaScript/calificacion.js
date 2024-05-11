const stars = document.querySelectorAll('.star');

stars.forEach((star, index) => {
  star.addEventListener('click', () => {
    for (let i = 0; i < stars.length; i++) {
      if (i <= index) {
        stars[i].classList.add('checked');
      } else {
        stars[i].classList.remove('checked');
      }
    }
  });
});
