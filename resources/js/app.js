import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.data("dashboard", () => ({
    init() {
        // this.spawnBarChart();
    },
    // spawnBarChart() {
    //     var options = {
    //         series: [
    //             {
    //                 name: "Inflation",
    //                 data: [
    //                     2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5,
    //                     0.2,
    //                 ],
    //             },
    //         ],
    //         chart: {
    //             height: 350,
    //             type: "bar",
    //         },
    //         plotOptions: {
    //             bar: {
    //                 borderRadius: 10,
    //                 dataLabels: {
    //                     position: "top", // top, center, bottom
    //                 },
    //             },
    //         },
    //         dataLabels: {
    //             enabled: true,
    //             formatter: function (val) {
    //                 return val + "%";
    //             },
    //             offsetY: -20,
    //             style: {
    //                 fontSize: "12px",
    //                 colors: ["#304758"],
    //             },
    //         },

    //         xaxis: {
    //             categories: [
    //                 "Jan",
    //                 "Feb",
    //                 "Mar",
    //                 "Apr",
    //                 "May",
    //                 "Jun",
    //                 "Jul",
    //                 "Aug",
    //                 "Sep",
    //                 "Oct",
    //                 "Nov",
    //                 "Dec",
    //             ],
    //             position: "top",
    //             axisBorder: {
    //                 show: false,
    //             },
    //             axisTicks: {
    //                 show: false,
    //             },
    //             crosshairs: {
    //                 fill: {
    //                     type: "gradient",
    //                     gradient: {
    //                         colorFrom: "#D8E3F0",
    //                         colorTo: "#BED1E6",
    //                         stops: [0, 100],
    //                         opacityFrom: 0.4,
    //                         opacityTo: 0.5,
    //                     },
    //                 },
    //             },
    //             tooltip: {
    //                 enabled: true,
    //             },
    //         },
    //         yaxis: {
    //             axisBorder: {
    //                 show: false,
    //             },
    //             axisTicks: {
    //                 show: false,
    //             },
    //             labels: {
    //                 show: false,
    //                 formatter: function (val) {
    //                     return val + "%";
    //                 },
    //             },
    //         },
    //         title: {
    //             text: "Monthly Inflation in Argentina, 2002",
    //             floating: true,
    //             offsetY: 330,
    //             align: "center",
    //             style: {
    //                 color: "#444",
    //             },
    //         },
    //     };

    //     var chart = new ApexCharts(
    //         document.querySelector("#barchart"),
    //         options
    //     );
    //     chart.render();
    // },
}));

Alpine.data("printPDF", () => ({
    toggle: false,
    printElement() {
        const pdf = new window.jspdf.jsPDF();
        const element = document.getElementById('element-to-print');
        pdf.html(element, { x: 20, y: 20 });
        pdf.save('sample.pdf');
    },
}));


Alpine.data('tenantShow', () => ({
    toggle : false,
    spawnAdditionField : false,
    error : null,
    toggleAction(){
        this.toggle = !this.toggle
    },
    checkNameIsNotRent(e){
        const data = e.target.value;
        if(data === 'rent'){
            this.spawnAdditionField = false
            return
        }

        this.spawnAdditionField = true
    },
    calculateTotalAmount(e){
        const pReading = document.querySelector('#previous_reading').value;
        const cReading = document.querySelector('#current_reading').value;
        let amount = document.querySelector("#amount")
        let reading = document.querySelector("#reading")

        console.log(pReading);

        if(pReading === ''){
            this.error = 'please input previous reading first!'
        }

        reading.value = cReading - pReading

        amount.value = reading.value * e.target.value;

    }
}));

Alpine.start();
