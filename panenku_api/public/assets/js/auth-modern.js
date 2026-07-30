document.addEventListener('DOMContentLoaded',function(){

    const card = document.querySelector('.auth-card');
    const image = document.querySelector('.farm-3d');

    if(!card || !image){
        return;
    }

    document.addEventListener('mousemove',function(e){

        const x = (window.innerWidth / 2 - e.clientX) / 40;
        const y = (window.innerHeight / 2 - e.clientY) / 40;

        image.style.transform =
            `translateY(-10px) rotateY(${x}deg) rotateX(${y}deg)`;

    });


    card.addEventListener('mouseenter',function(){

        image.style.transition = '0.3s';

    });


    card.addEventListener('mouseleave',function(){

        image.style.transform =
            'translateY(0) rotateY(0) rotateX(0)';

    });


});