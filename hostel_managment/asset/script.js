const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',

    data: {
        labels: ['Students','Rooms','Allocations','Payments'],

        datasets: [{
            label: 'Hostel Data',

            data: [
                studentCount,
                roomCount,
                allocationCount,
                paymentCount
            ],

            backgroundColor:[
                '#3498db',
                '#2ecc71',
                '#f39c12',
                '#e74c3c'
            ],

            borderRadius:10
        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio: true,
        plugins:{
            legend:{
                display:true
                
            }
        }
    }
});