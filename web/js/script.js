$(document).ready(function() {

    $('.mySlick').slick({
        slidesToShow: 10,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        autoplaySpeed: 2000,
        accessibility: false,
        autoplaySpeed: 5000,
        speed: 2000,
    });


    const image = $('.update_image');

    image.on('click', function (){
        console.log('111');
    })

    image.on('mousemove', rotate_start)
    image.on('mouseout', rotate_end)
    function rotate_start (e) {
        const halfImage = this.offsetHeight / 2;
        this.style.transform = 'rotateX('+ -(e.offsetY - halfImage) / 6 +'deg) rotateY('+ -(e.offsetX - halfImage) / 6 +'deg)';
        this.style.transition = 'none';
    }

    function rotate_end (e) {
        this.style.transform = 'rotateX(0deg) rotateY(0deg)';
        this.style.transition = '1s';
    }

});
