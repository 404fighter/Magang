/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

// $(document).ready(function () {
//     $("#addMenuForm").submit(function (e) {
//         e.preventDefault();

//         $.ajax({
//             type: "POST",
//             url: "<?php echo base_url('menu'); ?>",
//             data: $(this).serialize(),
//             dataType: "json",
//             success: function (response) {
//                 if (response.success) {
//                     alert(response.message);
//                     location.reload(); // Reload halaman setelah menambahkan menu
//                 } else {
//                     alert('Failed to add menu');
//                 }
//             }
//         });
//     });
// });
