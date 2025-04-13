const header = document.querySelector('header');
    const menu = document.querySelector('#menu-btn');

    function fixedNavbar() {
        header.classList.toggle('scroll', window.pageYOffset > 0);
    }
    window.addEventListener('scroll', fixedNavbar);

    menu.addEventListener('click', function() {
        console.log('Menu button clicked');
        let nav = document.querySelector('.navbar');
        nav.classList.toggle('active');
        console.log(nav.classList);
    });

    document.querySelector('.dropbtn').addEventListener('mouseover', function() {
        document.querySelector('.dropdown-content').style.display = 'block';
    });

    document.querySelector('.dropdown').addEventListener('mouseleave', function() {
        document.querySelector('.dropdown-content').style.display = 'none';
    });