(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});


    // Calender
    $('#calender').datetimepicker({
        inline: true,
        format: 'L'
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav : false
    });


    // Chart Global Color
    Chart.defaults.color = "#6C7293";
    Chart.defaults.borderColor = "#000000";


    // Worldwide Sales Chart
    var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels: ["2019", "2020", "2021", "2022", "2023", "2024", "2025"],
            datasets: [{
                    label: "Fees",
                    data: [15, 30, 55, 65, 60, 80, 95],
                    backgroundColor: "rgba(235, 22, 22, .7)"
                },
                {
                    label: "Expenses",
                    data: [8, 35, 40, 60, 70, 55, 75],
                    backgroundColor: "rgba(235, 22, 22, .5)"
                },
                
            ]
            },
        options: {
            responsive: true
        }
    });


    // Salse & Revenue Chart
    var ctx2 = $("#salse-revenue").get(0).getContext("2d");
    var myChart2 = new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["January", "February", "march", "April", "May", "June", "July","August","September","November"],
            datasets: [{
                    label: "Students",
                    data: [15, 30, 55, 45, 70, 65, 85],
                    backgroundColor: "rgba(235, 22, 22, .7)",
                    fill: true
                },
                {
                    label: "Teachers",
                    data: [99, 135, 170, 130, 190, 180, 270],
                    backgroundColor: "rgba(235, 22, 22, .5)",
                    fill: true
                }
            ]
            },
        options: {
            responsive: true
        }
    });
    


    // Single Line Chart
    var ctx3 = $("#line-chart").get(0).getContext("2d");
    var myChart3 = new Chart(ctx3, {
        type: "line",
        data: {
            labels: [2023,2024, 2025, 2026, 2027,2028,2029,2030],
            datasets: [{
                label: "Students Progress",
                fill: false,
                backgroundColor: "rgba(235, 22, 22, .7)",
                data: [10, 20, 30, 100, 40, 50, 60, 70, 80, 90]
            }]
        },
        options: {
            responsive: true
        }
    });


    // Single Bar Chart
    var ctx4 = $("#bar-chart").get(0).getContext("2d");
    var myChart4 = new Chart(ctx4, {
        type: "bar",
        data: {
            labels: ["2022", "2023", "2024", "2025", "2026","2027","2028","2029"],
            datasets: [{
                label: "collected",
                fill: false,
                backgroundColor: [
                    "rgba(235, 22, 22, .7)",
                    "rgba(235, 22, 22, .6)",
                    "rgba(235, 22, 22, .5)",
                    "rgba(235, 22, 22, .4)",
                    "rgba(235, 22, 22, .3)"
                ],
                data: [20000, 35000, 44000, 24000, 15000]
            }]
        },
        options: {
            responsive: true
        }
    });


    // Pie Chart
    var ctx5 = $("#pie-chart").get(0).getContext("2d");
    var myChart5 = new Chart(ctx5, {
        type: "pie",
        data: {
            labels: ["Grade 1", "Grade 2", "Grade 3", "Grade 4", "Grade 5","Grade 6","Grade 7","Grade 8","Grade 9","Grade 10","Grade 11","Grade 12","Grade 13"],
            datasets: [{
                backgroundColor: [
                    "rgba(255, 120, 0, .9)",
                    "rgba(255, 120, 0, .8)",
                    "rgba(255, 120, 0, .7)",
                    "rgba(255, 120, 0, .6)",
                    "rgba(255, 130, 0, .5)",
                    "rgba(255, 140, 0, .5)",
                    "rgba(255, 150, 0, .5)",
                    "rgba(255, 160, 0, .5)",
                    "rgba(255, 170, 0, .5)",
                    "rgba(255, 180, 0, .5)",
                    "rgba(255, 190, 0, .5)",
                    "rgba(255, 200, 0, .5)",
                    "rgba(255, 210, 0, .5)",
                    "rgba(255, 220, 0, .5)"
                    
                    
                ],
                data: [studentFor1, studentFor2, studentFor3, studentFor4, studentFor5,studentFor6,studentFor7,studentFor8,studentFor9,studentFor10,studentFor11,studentFor12,studentFor13]
            }]
        },
        options: {
            responsive: true
        }
    });


    // Doughnut Chart
    var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
    var myChart6 = new Chart(ctx6, {
        type: "doughnut",
        data: {
            labels: ["Male", "Female"],
            datasets: [{
                backgroundColor: [
                    "rgba(255, 120, 0, .7)",
                    "rgba(255, 170, 0, .8)"
                    
                ],
                data: [male, female]
            }]
        },
        options: {
            responsive: true
        }
    });

    
})(jQuery);


//doughnut
var ctxD = document.getElementById("doughnutChart").getContext('2d');
var myLineChart = new Chart(ctxD, {
  type: 'doughnut',
  data: {
    labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
    datasets: [{
      data: [300, 50, 100, 40, 120],
      backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
      hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
    }]
  },
  options: {
    responsive: true
  }
});
