// SIDEBAR TOGGLE

var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar() {
    if(!sidebarOpen) {
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen = true;
    }
}

function closeSidebar() {
    if(sidebarOpen) {
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen = false;
    }
}

// ----- CHARTS ------ //

// BAR CHART */

var barChartOptions = {
    series: [
        {
    data: [10, 8, 6, 4, 2],
    name: "Products",
        },
    ],
    chart: {
        type: "bar",
        background: "transparent",
        height: 350,
        toolbar: {
            show: false,
        },
    },
  colors: [
    "#2962ff",
    "#d50000",
    "#2e7d32",
    "#ff6d00",
    "#583cb3"],
  plotOptions: {
    bar: {
        distributed: true,
      borderRadius: 4,
      horizontal: false,
      columnWidth: "40%",
    },
  },
  dataLabels: {
    enabled: false,
  },
  fill: {
    opacity: 1,
  },
  grid: {
    borderColor: "#55596e",
    yaxis: {
        lines: {
            show: true,
        },
    },
    xaxis: {
        lines: {
            show: true,
        },
    },
  },
  legend: {
    labels: {
        colors: "black",
    },
    show: true,
    position: "top",
  },
  stroke: {
    colors: ['transparent'],
    show: true,
    width: 2,
  },
  tooltip: {
    shared: true,
    intersect: false,
    theme: "dark",
  },
  xaxis: {
    categories: ["Can Goods"," Frozen Goods", "Fruits & Vegetables", "Beverages","Pantry"],
    title: {
        style: {
            color: "black",
        },
    },
    axisBorder: {
        show: true,
        color: "#55596e",
    },
    labels: {
        style: {
            colors: "black",
        },
    },
  },
  yaxis: {
    title: {
        text: "Count",
        style: {
            colors: "#f5f7ff",
        },
    },
    axisBorder: {
        color: "#55596e",
        show: true,
    },
    axisTicks: {
        color: "#55596e",
        show: true,
    },
    labels: {
        style: {
            colors: "transparent",
        },
    },
  },
};
  var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
  barChart.render();

// AREA CHART //
var areaChartOptions = {
  series: [{
    name: "Purchase Orders", 
    data: [31, 40, 28, 51, 42, 109, 100],
}, {
  name: "Sales Orders",
  data: [11, 32, 45, 32, 34, 52, 41],
}],
  chart: {
    type: "area",
    background: "transparent",
    height: 350,
    stacked: false,
    toolbar: {
      show: false,
    },
  },
  colors:["#00ab57", "#d50000"],
labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
dataLabels: {
  enabled: false,
},
fill: {
  gradient: {
    opacityFrom: 0.4,
    opacityTo: 0.1,
    shadeIntensity: 1,
    stops: [0, 100],
    type: "vertical",
  },
  type: "gradient",
},
grid: {
  borderColor: "#55596e",
  yaxis: {
    lines: {
      show: true,
    },
  },
  xaxis: {
    lines: {
      show: true,
    },
  },
},
legend: {
  labels: {
    colors: "black",
  },
  show: true,
  position: "top",
},
markers: {
  size: 6,
  strokeColors: "#1b2635",
  strokeWidth: 3,
},
stroke: {
  curve: "smooth",
},
xaxis: {
  axisBorder: {
    color: "#55596e",
    show: true,
  },
  axisTicks: {
    color: "#55596e",
    show: true,
  },
  labels: {
    offsetY: 5,
    style: {
      colors: "#black",
    },
  },
},

yaxis: 
[
  {
    title: {
      text: "Purchase Orders",
      style: {
        color: "black",
      },
    },
    labels: {
      style: {
        colors: "black",
      },
    },
  },
  {
    opposite: true,
    title: {
      text: "Sales Orders",
      style: {
        color: "black",
      },
    },
    labels: {
      style: {
        colors: ["black"],
      },
    },
  },
  ], 
tooltip: {
  shared: true,
  intersect: false,
  theme: "dark",
}
};

var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
areaChart.render();
// Pie Chart //
const config = {
  type: 'pie',
  data: data,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart.js Pie Chart'
      }
    }
  },
};
const DATA_COUNT = 5;
const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};

const data = {
  labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
  datasets: [
    {
      label: 'Dataset 1',
      data: Utils.numbers(NUMBER_CFG),
      backgroundColor: Object.values(Utils.CHART_COLORS),
    }
  ]
};
const actions = [
  {
    name: 'Randomize',
    handler(chart) {
      chart.data.datasets.forEach(dataset => {
        dataset.data = Utils.numbers({count: chart.data.labels.length, min: 0, max: 100});
      });
      chart.update();
    }
  },
  {
    name: 'Add Dataset',
    handler(chart) {
      const data = chart.data;
      const newDataset = {
        label: 'Dataset ' + (data.datasets.length + 1),
        backgroundColor: [],
        data: [],
      };

      for (let i = 0; i < data.labels.length; i++) {
        newDataset.data.push(Utils.numbers({count: 1, min: 0, max: 100}));

        const colorIndex = i % Object.keys(Utils.CHART_COLORS).length;
        newDataset.backgroundColor.push(Object.values(Utils.CHART_COLORS)[colorIndex]);
      }

      chart.data.datasets.push(newDataset);
      chart.update();
    }
  },
  {
    name: 'Add Data',
    handler(chart) {
      const data = chart.data;
      if (data.datasets.length > 0) {
        data.labels.push('data #' + (data.labels.length + 1));

        for (let index = 0; index < data.datasets.length; ++index) {
          data.datasets[index].data.push(Utils.rand(0, 100));
        }

        chart.update();
      }
    }
  },
  {
    name: 'Remove Dataset',
    handler(chart) {
      chart.data.datasets.pop();
      chart.update();
    }
  },
  {
    name: 'Remove Data',
    handler(chart) {
      chart.data.labels.splice(-1, 1); // remove the label first

      chart.data.datasets.forEach(dataset => {
        dataset.data.pop();
      });

      chart.update();
    }
  }
];


    
     