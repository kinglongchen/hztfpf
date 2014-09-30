$(function () {

    $('#chart_month_container').highcharts({

        chart: {
            type: 'heatmap',
            //marginTop: 2,
            //marginBottom: 2
        },
		credits: {
			enabled:false
			},

        title: {
            text: '交通状态月趋势分析'
        },

        xAxis: {
			allowDecimals:false,
           // showLastLabel: false,
            tickLength: 5
        },

        yAxis: {
			allowDecimals:false,
			 title: {
                text: null
            },
            labels: {
                format: '{value}号'
            },
            minPadding: 0,
            maxPadding: 0,
            startOnTick: false,
            endOnTick: false,
            //tickPositions: [0, 6, 12, 18, 24],
            tickWidth: 1,
            //reversed: true
        },

        colorAxis: {
             stops: [
                [0, '#08F62C'],
                [0.5, '#F7F707'],
                [1, '#FF1900']
            ],
            min: 0,
            max: 2,
            startOnTick: false,
            endOnTick: false,
            labels: {
                format: '{value}'
            }
        },

        legend: {
            align: 'right',
            layout: 'vertical',
            margin: 0,
            verticalAlign: 'top',
            y: 25,
            symbolHeight: 320
        },

        tooltip: {
            formatter: function () {
                return '<b>' + this.series.xAxis.categories[this.point.x] + '</b> sold <br><b>' +
                    this.point.value + '</b> items on <br><b>' + this.series.yAxis.categories[this.point.y] + '</b>';
            }
        },

        series: [{
            name: 'Sales per employee',
            //borderWidth: 1,
            data: [],
            dataLabels: {
                enabled: false,
                color: 'black',
                style: {
                    textShadow: 'none',
                    HcTextStroke: null
                }
            }
        }]

    });
});

$(function () {

    $('#chart_year_container').highcharts({

        chart: {
            type: 'heatmap',
            //marginTop: 2,
            //marginBottom: 2
        },
		credits: {
			enabled:false
			},

        title: {
            text: '交通状态年趋势分析'
        },

        xAxis: {
			allowDecimals:false,
           // showLastLabel: false,
            tickLength: 5
        },

        yAxis: {
			allowDecimals:false,
			 title: {
                text: null
            },
            labels: {
                format: '{value}月'
            },
            minPadding: 0,
            maxPadding: 0,
            startOnTick: false,
            endOnTick: false,
            //tickPositions: [0, 6, 12, 18, 24],
            tickWidth: 1,
            //reversed: true
        },

        colorAxis: {
             stops: [
                [0, '#08F62C'],
                [0.5, '#F7F707'],
                [1, '#FF1900']
            ],
            min: 0,
            max: 2,
            startOnTick: false,
            endOnTick: false,
            labels: {
                format: '{value}'
            }
        },

        legend: {
            align: 'right',
            layout: 'vertical',
            margin: 0,
            verticalAlign: 'top',
            y: 25,
            symbolHeight: 320
        },

        tooltip: {
            formatter: function () {
                return '<b>' + this.series.xAxis.categories[this.point.x] + '</b> sold <br><b>' +
                    this.point.value + '</b> items on <br><b>' + this.series.yAxis.categories[this.point.y] + '</b>';
            }
        },

        series: [{
            name: 'Sales per employee',
            //borderWidth: 1,
            data: [],
            dataLabels: {
                enabled: false,
                color: 'black',
                style: {
                    textShadow: 'none',
                    HcTextStroke: null
                }
            }
        }]

    });
});


$(function () {
    $('#chart_day_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '交通状态日趋势分析'
        },
        xAxis: {
			startOnTick: false,
            endOnTick: false,
			allowDecimals:false,
            //categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
			showLastLabel: true
        },
        yAxis: {
            min: 0,
            title: {
                text: null
            }
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'percent'
            }
        },
            series: [{
            name: '拥堵',
			color:'#FF0000',
            data: []
        }, {
            name: '一般',
			color:'#FFA500',
            data: []
        }, {
            name: '通畅',
			color:'#00FF00',
            data: []
        }]
    });
});


/*$(function () {
    $('#pie_container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '交通状态月分布'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    });
});*/

function setYCateg(month) {
	
	}
	
	
function update_data(data) {
	
	/*var max_val = -1;
	var max_val_time=0;
	var avg_val = -1;
	var total_val = 0;*/
	
	chart_day_data = data[0];
	chart_month_data = data[1];
	chart_year_data = data[2];
	/*pie_data = new Array();
	pie_data.push(new Array("状态为1",0));
	pie_data.push(new Array("状态为2",0));
	pie_data.push(new Array("状态为3",0));*/
		
/*	for (var i=0;i < data.length;i++) {
		hdv=data[i];
		h = hdv[0];
		d = hdv[1];
		v = hdv[2];
		if(v>max_val){
			max_val = v;
			max_time = h; 
			}
		//total_val+=v;
		//index = parseInt(v/20<5?v/20:4);
		//if (i == 0) {alert(v);alert(index)}
		if (v>=0&&v<1)pie_data[0][1]+=1/data.length
		if (v>=1&&v<2)pie_data[1][1]+=1/data.length
		if (v>=2&&v<3)pie_data[2][1]+=1/data.length
		}*/
		
//	$('#max_val').text(String(max_val));
//	$('#time').text(String(max_time));
//	$('#arv_val').text(String(avg_val/24));
	//$('#total_val').text(String(total_val)
	$('#chart_month_container').highcharts().series[0].setData(chart_month_data);
	$('#chart_year_container').highcharts().series[0].setData(chart_year_data);
	
	$('#chart_day_container').highcharts().series[0].setData(chart_day_data[0]);
	$('#chart_day_container').highcharts().series[1].setData(chart_day_data[1]);
	$('#chart_day_container').highcharts().series[2].setData(chart_day_data[2]);
	$('#pie_container').highcharts().series[0].setData(pie_data);
	}
	
function data_req(year,month,data) {
	data = data_generate(year,month,data)
	update_data(data)
	}
	
$(document).ready(function(e) {
	
	
	var def_date = new Date();
	def_year = def_date.getYear();
	def_month = def_date.getMonth();
	def_day = def_date.getDay();
	def_zone = 1;//默认的区域编号
	data_req(def_year,def_month,def_day,def_zone); 
//	history_req(def_year,def_month,def_day,def_zone)
//	hot_data_req(def_year,def_month,def_day,def_zone)	
});


function history_update(data) {
	$('#his_max_val').text(data[0])
	$('#his_min_val').text(data[1])
	$('#last_arv_max_val').text(data[2])
	$('#last_arv_arv_val').text(data[3])
	$('#last_arv_total_val').text(data[4])
	}
	
	
function hot_data_update(data) {
	$('#xh_max_val').text(data[0][0])
	$('#xh_avg_val').text(data[0][1])
	$('#xh_total_val').text(data[0][2])
	
	
	$('#xc_max_val').text(data[0][0])
	$('#xc_avg_val').text(data[0][1])
	$('#xc_total_val').text(data[0][2])
	
	
	$('#sh_max_val').text(data[0][0])
	$('#sh_avg_val').text(data[0][1])
	$('#sh_total_val').text(data[0][2])
	
	$('#gs_max_val').text(data[0][0])
	$('#gs_avg_val').text(data[0][1])
	$('#gs_total_val').text(data[0][2])
	}	
function history_req(year,month,day,zone) {
	data = generate_his_data()
	history_update(data)
	}

function hot_data_req(year,month,day,zone) {
	data = generate_hot_data()
	hot_data_update(data)
	}
//function test
function data_generate(year,month,day) {
	pdate = new Date(year,month-1,1)
	ldate = new Date(year,month,1)
	daynum = (ldate-pdate)/(1000*60*60*24)
	var datas = new Array()
	var data = new Array()
	for (var i=0;i<3;i++) {
		stadata = new Array()
		for (var j = 1;j<=24;j++) {
			stadata.push(parseInt(Math.random()*10))
			}
		data.push(stadata)
		}
	datas.push(data)
	
	
	var data = new Array()
	a = Math.random()*10
	for (var i=1;i<=24;i++) {
		for (var j=1;j<=daynum;j++) {
			var rs = Math.random()*3
			data.push(new Array(i,j,rs.toFixed(2)))
			}
		
		}
	datas.push(data)
	
	var data = new Array()
	a = Math.random()*10
	for (var i=1;i<=24;i++) {
		for (var j=1;j<=12;j++) {
			var rs = Math.random()*3
			data.push(new Array(i,j,rs.toFixed(2)))
			}
		
		}
	datas.push(data)
	
	return datas
	
	}
	
	
function generate_his_data() {
	data = new Array()
	data.push(100)
	data.push(200)
	data.push(300)
	data.push(400)
	data.push(1000)
	return data
	}
function generate_hot_data() {
	data = new Array()
	for (var i = 0;i<4;i++) {
		h_data = new Array()
		h_data.push(100)
		h_data.push(200)
		h_data.push(300)
		data.push(h_data)
		}
	return data
	}
