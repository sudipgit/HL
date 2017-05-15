/* ==========================================================
 * AdminKIT v1.5
 * charts.helper.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

var charts = 
{
	// init charts on finances page
	initFinances: function()
	{
		// init simple chart
		this.chart_simple.init();
	},
	
	// init charts on Charts page
	initCharts: function()
	{
		// init simple chart
		this.chart_simple.init();

		// init lines chart with fill & without points
		this.chart_lines_fill_nopoints.init();

		// init ordered bars chart
		this.chart_ordered_bars.init();

		// init donut chart
		this.chart_donut.init();

		// init stacked bars chart
		this.chart_stacked_bars.init();

		// init pie chart
		this.chart_pie.init();
		
			// init Length pie chart
		this.chart_length_pie.init();
		
		// init Texture pie chart
		this.chart_tex_pie.init();
		
		// init Length pie chart
		this.chart_process_pie.init();
		
		
		// init Length pie chart
		this.chart_condition_pie.init();
		
		// init Length pie chart
		this.chart_hstyle_pie.init();
		
		
		// init Length pie chart
		this.chart_des_pie.init();
		

		// init horizontal bars chart
		this.chart_horizontal_bars.init();

		// init live chart
		this.chart_live.init();
	},
	
	// init charts on dashboard
	initIndex: function()
	{
		// chart_ordered_bars
		this.chart_ordered_bars.init();

		// init traffic sources pie
		this.traffic_sources_pie.init();
	},

	// utility class
	utility:
	{
		chartColors: [ themerPrimaryColor, "#444", "#777", "#999", "#DDD", "#EEE" ],
		chartBackgroundColors: ["#fff", "#fff"],

		applyStyle: function(that)
		{
			that.options.colors = charts.utility.chartColors;
			that.options.grid.backgroundColor = { colors: charts.utility.chartBackgroundColors };
			that.options.grid.borderColor = charts.utility.chartColors[0];
			that.options.grid.color = charts.utility.chartColors[0];
		},
		
		// generate random number for charts
		randNum: function()
		{
			return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
		}
	},

	traffic_sources_pie: 
	{
		// data
		data: [
			{ label: "organic",  data: 60 },
			{ label: "direct",  data: 22.1 },
			{ label: "referral",  data: 16.9 },
			{ label: "cpc",  data: 1 }
		],
		
		// chart object
		plot: null,
		
		// chart options
		options: {
			series: {
	            pie: {
	                show: true,
	                redraw: true,
	                radius: 1,
	                tilt: 0.6,
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div style="font-size:8pt;text-align:center;padding:5px;color:#fff;">'+Math.round(series.percent)+'%</div>';
	                    },
	                    background: { opacity: 0.8 }
	                }
	            }
	        },
	        legend: {
	            show: true
	        },
	        colors: [],
	        grid: { hoverable: true },
	        tooltip: true,
			tooltipOpts: {
				content: "<strong>%y% %s</strong>",
				dateFormat: "%y-%0m-%0d",
				shifts: {
					x: 10,
					y: 20
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			this.plot = $.plot($("#pie"), this.data, this.options);
		}
	},

	// traffic sources dataTables
	// we are now using Google Charts instead of Flot
	traffic_sources_dataTables:
	{
		// tables data
		data: 
		{
			tableSources:  
			{
				data: null,
				init: function()
				{
					var data = new google.visualization.DataTable();
			        data.addColumn('string', 'source');
			        data.addColumn('string', 'medium');
			        data.addColumn('number', 'visits');
			        data.addColumn('number', 'pg_views');
			        data.addColumn('string', 'avg_time');

			        data.addRows(7);
			        data.setCell(0, 0, 'google', null, {'style': 'text-align: center;'});
			        data.setCell(0, 1, 'organic', null, {'style': 'text-align: center;'});
			        data.setCell(0, 2, 89, null, {'style': 'text-align: center;'});
			        data.setCell(0, 3, 299, null, {'style': 'text-align: center;'});
			        data.setCell(0, 4, '00:01:48', null, {'style': 'text-align: center;'});
			        data.setCell(1, 0, '(direct)', null, {'style': 'text-align: center;'});
			        data.setCell(1, 1, '(none)', null, {'style': 'text-align: center;'});
			        data.setCell(1, 2, 14, null, {'style': 'text-align: center;'});
			        data.setCell(1, 3, 34, null, {'style': 'text-align: center;'});
			        data.setCell(1, 4, '00:03:15', null, {'style': 'text-align: center;'});
			        data.setCell(2, 0, 'yahoo', null, {'style': 'text-align: center;'});
			        data.setCell(2, 1, 'organic', null, {'style': 'text-align: center;'});
			        data.setCell(2, 2, 3, null, {'style': 'text-align: center;'});
			        data.setCell(2, 3, 3, null, {'style': 'text-align: center;'});
			        data.setCell(2, 4, '00:00:00', null, {'style': 'text-align: center;'});
			        data.setCell(3, 0, 'ask', null, {'style': 'text-align: center;'});
			        data.setCell(3, 1, 'organic', null, {'style': 'text-align: center;'});
			        data.setCell(3, 2, 1, null, {'style': 'text-align: center;'});
			        data.setCell(3, 3, 3, null, {'style': 'text-align: center;'});
			        data.setCell(3, 4, '00:01:34', null, {'style': 'text-align: center;'});
			        data.setCell(4, 0, 'bing', null, {'style': 'text-align: center;'});
			        data.setCell(4, 1, 'organic', null, {'style': 'text-align: center;'});
			        data.setCell(4, 2, 1, null, {'style': 'text-align: center;'});
			        data.setCell(4, 3, 1, null, {'style': 'text-align: center;'});
			        data.setCell(4, 4, '00:00:00', null, {'style': 'text-align: center;'});
			        data.setCell(5, 0, 'conduit', null, {'style': 'text-align: center;'});
			        data.setCell(5, 1, 'organic', null, {'style': 'text-align: center;'});
			        data.setCell(5, 2, 1, null, {'style': 'text-align: center;'});
			        data.setCell(5, 3, 1, null, {'style': 'text-align: center;'});
			        data.setCell(5, 4, '00:00:00', null, {'style': 'text-align: center;'});
			        data.setCell(6, 0, 'google', null, {'style': 'text-align: center;'});
			        data.setCell(6, 1, 'cpc', null, {'style': 'text-align: center;'});
			        data.setCell(6, 2, 1, null, {'style': 'text-align: center;'});
			        data.setCell(6, 3, 1, null, {'style': 'text-align: center;'});
			        data.setCell(6, 4, '00:00:00', null, {'style': 'text-align: center;'});

			        this.data = data;
			        return data;
				}
			},
			tableReffering:
			{
				data: null,
				init: function()
				{
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'source');
			        data.addColumn('number', 'pg_views');
			        data.addColumn('string', 'avg_time');
			        data.addColumn('string', 'exits');
			        
					data.addRows(6);
					data.setCell(0, 0, 'google.ro');
					data.setCell(0, 1, 14, null, {'style': 'text-align: center;'});
					data.setCell(0, 2, '00:05:51', null, {'style': 'text-align: center;'});
					data.setCell(0, 3, '3', null, {'style': 'text-align: center;'});
					data.setCell(1, 0, 'search.sweetim.com');
					data.setCell(1, 1, 5, null, {'style': 'text-align: center;'});
					data.setCell(1, 2, '00:03:29', null, {'style': 'text-align: center;'});
					data.setCell(1, 3, '1', null, {'style': 'text-align: center;'});
					data.setCell(2, 0, 'start.funmoods.com');
					data.setCell(2, 1, 5, null, {'style': 'text-align: center;'});
					data.setCell(2, 2, '00:01:02', null, {'style': 'text-align: center;'});
					data.setCell(2, 3, '1', null, {'style': 'text-align: center;'});
					data.setCell(3, 0, 'google.md');
					data.setCell(3, 1, 2, null, {'style': 'text-align: center;'});
					data.setCell(3, 2, '00:03:56', null, {'style': 'text-align: center;'});
					data.setCell(3, 3, '1', null, {'style': 'text-align: center;'});
					data.setCell(4, 0, 'searchmobileonline.com');
					data.setCell(4, 1, 2, null, {'style': 'text-align: center;'});
					data.setCell(4, 2, '00:02:21', null, {'style': 'text-align: center;'});
					data.setCell(4, 3, '1', null, {'style': 'text-align: center;'});
					data.setCell(5, 0, 'google.com');
					data.setCell(5, 1, 1, null, {'style': 'text-align: center;'});
					data.setCell(5, 2, '00:00:00', null, {'style': 'text-align: center;'});
					data.setCell(5, 3, '1', null, {'style': 'text-align: center;'});
					
					this.data = data;
					return data;
				}
			}
		},
		
		// chart
		chart: 
		{
			tableSources: null,
			tableReffering: null
		},
		
		// options
		options: 
		{
			tableSources: 
			{
				page: 'enable',
				pageSize: 6,
				allowHtml: true,
				cssClassNames: {
					headerRow: 'tableHeaderRow',
					tableRow: 'tableRow',
					selectedTableRow: 'selectedTableRow',
					hoverTableRow: 'hoverTableRow'
				},
				width: '100%',
				alternatingRowStyle: false,
				pagingSymbols: { prev: '<span class="btn btn-inverse">prev</btn>', next: '<span class="btn btn-inverse">next</span>' }
			},
			
			tableReffering:
			{
				page: 'enable',
				pageSize: 6,
				allowHtml: true,
				cssClassNames: {
					headerRow: 'tableHeaderRow',
					tableRow: 'tableRow',
					selectedTableRow: 'selectedTableRow',
					hoverTableRow: 'hoverTableRow'
				},
				width: '100%',
				alternatingRowStyle: false,
				pagingSymbols: { prev: '<span class="btn btn-inverse">prev</btn>', next: '<span class="btn btn-inverse">next</span>' }
			}
		},
		
		// initialize
		init: function()
		{
			// data
			charts.traffic_sources_dataTables.data.tableSources.init();
			charts.traffic_sources_dataTables.data.tableReffering.init();
			
			// charts
			charts.traffic_sources_dataTables.drawTableSources();
			charts.traffic_sources_dataTables.drawTableReffering();
		},

		// draw Traffic Sources Table
		drawTableSources: function()
		{
			this.chart.tableSources = new google.visualization.Table(document.getElementById('dataTableSources'));
			this.chart.tableSources.draw(this.data.tableSources.data, this.options.tableSources);
		},

		// draw Refferals Table
		drawTableReffering: function()
		{
			this.chart.tableReffering = new google.visualization.Table(document.getElementById('dataTableReffering'));
			this.chart.tableReffering.draw(this.data.tableReffering.data, this.options.tableReffering);
		}
	},
	
	// simple chart
	chart_simple:
	{
		// data
		data: 
		{
			sin: [],
			cos: []
		},
		
		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			grid: 
			{
				show: true,
			    aboveData: true,
			    color: "#3f3f3f",
			    labelMargin: 5,
			    axisMargin: 0, 
			    borderWidth: 0,
			    borderColor:null,
			    minBorderMargin: 5,
			    clickable: true, 
			    hoverable: true,
			    autoHighlight: true,
			    mouseActiveRadius: 20,
			    backgroundColor : { }
			},
	        series: {
	        	grow: {active: false},
	            lines: {
            		show: true,
            		fill: false,
            		lineWidth: 4,
            		steps: false
            	},
	            points: {
	            	show:true,
	            	radius: 5,
	            	symbol: "circle",
	            	fill: true,
	            	borderColor: "#fff"
	            }
	        },
	        legend: { position: "se" },
	        colors: [],
	        shadowSize:1,
	        tooltip: true, //activate tooltip
			tooltipOpts: {
				content: "%s : %y.3",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},

		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);

			if (this.plot == null)
			{
				for (var i = 0; i < 14; i += 0.5) 
				{
			        this.data.sin.push([i, Math.sin(i)]);
			        this.data.cos.push([i, Math.cos(i)]);
			    }
			}
			this.plot = $.plot(
				$("#chart_simple"),
	           	[{
	    			label: "Sin", 
	    			data: this.data.sin,
	    			lines: {fillColor: "#DA4C4C"},
	    			points: {fillColor: "#fff"}
	    		}, 
	    		{	
	    			label: "Cos", 
	    			data: this.data.cos,
	    			lines: {fillColor: "#444"},
	    			points: {fillColor: "#fff"}
	    		}], this.options);
		}
	},
	
	// lines chart with fill & without points
	chart_lines_fill_nopoints: 
	{
		// chart data
		data: 
		{
			d1: [],
			d2: []
		},

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			grid: {
				show: true,
			    aboveData: true,
			    color: "#3f3f3f",
			    labelMargin: 5,
			    axisMargin: 0, 
			    borderWidth: 0,
			    borderColor:null,
			    minBorderMargin: 5 ,
			    clickable: true, 
			    hoverable: true,
			    autoHighlight: true,
			    mouseActiveRadius: 20,
			    backgroundColor : { }
			},
	        series: {
	        	grow: {active:false},
	            lines: {
            		show: true,
            		fill: true,
            		lineWidth: 2,
            		steps: false
            	},
	            points: {show:false}
	        },
	        legend: { position: "nw" },
	        yaxis: { min: 0 },
	        xaxis: {ticks:11, tickDecimals: 0},
	        colors: [],
	        shadowSize:1,
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.0",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},

		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			// generate some data
			this.data.d1 = [[1, 3+charts.utility.randNum()], [2, 6+charts.utility.randNum()], [3, 9+charts.utility.randNum()], [4, 12+charts.utility.randNum()],[5, 15+charts.utility.randNum()],[6, 18+charts.utility.randNum()],[7, 21+charts.utility.randNum()],[8, 15+charts.utility.randNum()],[9, 18+charts.utility.randNum()],[10, 21+charts.utility.randNum()],[11, 24+charts.utility.randNum()],[12, 27+charts.utility.randNum()],[13, 30+charts.utility.randNum()],[14, 33+charts.utility.randNum()],[15, 24+charts.utility.randNum()],[16, 27+charts.utility.randNum()],[17, 30+charts.utility.randNum()],[18, 33+charts.utility.randNum()],[19, 36+charts.utility.randNum()],[20, 39+charts.utility.randNum()],[21, 42+charts.utility.randNum()],[22, 45+charts.utility.randNum()],[23, 36+charts.utility.randNum()],[24, 39+charts.utility.randNum()],[25, 42+charts.utility.randNum()],[26, 45+charts.utility.randNum()],[27,38+charts.utility.randNum()],[28, 51+charts.utility.randNum()],[29, 55+charts.utility.randNum()], [30, 60+charts.utility.randNum()]];
			this.data.d2 = [[1, charts.utility.randNum()-5], [2, charts.utility.randNum()-4], [3, charts.utility.randNum()-4], [4, charts.utility.randNum()],[5, 4+charts.utility.randNum()],[6, 4+charts.utility.randNum()],[7, 5+charts.utility.randNum()],[8, 5+charts.utility.randNum()],[9, 6+charts.utility.randNum()],[10, 6+charts.utility.randNum()],[11, 6+charts.utility.randNum()],[12, 2+charts.utility.randNum()],[13, 3+charts.utility.randNum()],[14, 4+charts.utility.randNum()],[15, 4+charts.utility.randNum()],[16, 4+charts.utility.randNum()],[17, 5+charts.utility.randNum()],[18, 5+charts.utility.randNum()],[19, 2+charts.utility.randNum()],[20, 2+charts.utility.randNum()],[21, 3+charts.utility.randNum()],[22, 3+charts.utility.randNum()],[23, 3+charts.utility.randNum()],[24, 2+charts.utility.randNum()],[25, 4+charts.utility.randNum()],[26, 4+charts.utility.randNum()],[27,5+charts.utility.randNum()],[28, 2+charts.utility.randNum()],[29, 2+charts.utility.randNum()], [30, 3+charts.utility.randNum()]];
			
			// make chart
			this.plot = $.plot(
				'#chart_lines_fill_nopoints', 
				[{
         			label: "Visits", 
         			data: this.data.d1,
         			lines: {fillColor: "#fff8f2"},
         			points: {fillColor: "#88bbc8"}
         		}, 
         		{	
         			label: "Unique Visits", 
         			data: this.data.d2,
         			lines: {fillColor: "rgba(0,0,0,0.1)"},
         			points: {fillColor: "#ed7a53"}
         		}], 
         		this.options);
		},
		setData: function(dataArr1,dataArr2)
		{
			charts.utility.applyStyle(this);

				this.plot = $.plot(
				'#chart_lines_fill_nopoints', 
				[{
         			label: "Visits", 
         			data: dataArr1,
         			lines: {fillColor: "#fff8f2"},
         			points: {fillColor: "#88bbc8"}
         		}, 
         		{	
         			label: "Unique Visits", 
         			data: dataArr2,
         			lines: {fillColor: "rgba(0,0,0,0.1)"},
         			points: {fillColor: "#ed7a53"}
         		}], 
         		this.options);
		}
	},

	// ordered bars chart
	chart_ordered_bars:
	{
		// chart data
		data: null,

		// will hold the chart object
		plot: null,

		// chart options
		options:
		{
			bars: {
				show:true,
				barWidth: 0.2,
				fill:1
			},
			grid: {
				show: true,
			    aboveData: false,
			    color: "#3f3f3f" ,
			    labelMargin: 5,
			    axisMargin: 0, 
			    borderWidth: 0,
			    borderColor:null,
			    minBorderMargin: 5 ,
			    clickable: true, 
			    hoverable: true,
			    autoHighlight: false,
			    mouseActiveRadius: 20,
			    backgroundColor : { }
			},
	        series: {
	        	grow: {active:false}
	        },
	        legend: { position: "ne" },
	        colors: [],
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.0",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},

		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			//some data
			var d1 = [];
		    for (var i = 0; i <= 10; i += 1)
		        d1.push([i, parseInt(Math.random() * 30)]);
		 
		    var d2 = [];
		    for (var i = 0; i <= 10; i += 1)
		        d2.push([i, parseInt(Math.random() * 30)]);
		 
		    var d3 = [];
		    for (var i = 0; i <= 10; i += 1)
		        d3.push([i, parseInt(Math.random() * 30)]);
		 
		    var ds = new Array();
		 
		    ds.push({
		     	label: "Data One",
		        data:d1,
		        bars: {order: 1}
		    });
		    ds.push({
		    	label: "Data Two",
		        data:d2,
		        bars: {order: 2}
		    });
		    ds.push({
		    	label: "Data Three",
		        data:d3,
		        bars: {order: 3}
		    });
			this.data = ds;

			this.plot = $.plot($("#chart_ordered_bars"), this.data, this.options);
		},
		setData: function(dataArr)
		{
			charts.utility.applyStyle(this);

			this.plot = $.plot($("#chart_ordered_bars"), dataArr, this.options);
		}
	},

	// donut chart
	chart_donut:
	{
		// chart data
		data: [
		    { label: "African American/Black",  data: 38 },
		    { label: "Caucasian",  data: 23 },
		    { label: "European",  data: 15 },
		    { label: "Spanish/Latin",  data: 9 },
		    { label: "Asian",  data: 12 },
		    { label: "Indian",  data: 3 }
		],

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			series: {
				pie: { 
					show: true,
					innerRadius: 0.4,
					highlight: {
						opacity: 0.1
					},
					radius: 1,
					stroke: {
						color: '#fff',
						width: 8
					},
					startAngle: 2,
				    combine: {
	                    color: '#EEE',
	                    threshold: 0.05
	                },
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div class="label label-inverse">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
	                    }
	                }
				},
				grow: {	active: false}
			},
			legend:{show:false},
			grid: {
	            hoverable: true,
	            clickable: true,
	            backgroundColor : { }
	        },
	        colors: [],
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.1"+"%",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			this.plot = $.plot($("#chart_donut"), this.data, this.options);
		},
		setData: function(dataArr)
		{
			charts.utility.applyStyle(this);

			this.plot = $.plot($("#chart_donut"), dataArr, this.options);
		}
	},

	// horizontal bars chart
	chart_horizontal_bars:
	{
		// chart data
		data: null,

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			grid: {
				show: true,
			    aboveData: false,
			    color: "#3f3f3f" ,
			    labelMargin: 5,
			    axisMargin: 0, 
			    borderWidth: 0,
			    borderColor:null,
			    minBorderMargin: 5 ,
			    clickable: true, 
			    hoverable: true,
			    autoHighlight: false,
			    mouseActiveRadius: 20,
			    backgroundColor : { }
			},
	        series: {
	        	grow: {active:false},
		        bars: {
		        	show:true,
					horizontal: true,
					barWidth:0.2,
					fill:1
				}
	        },
	        legend: { position: "ne" },
	        colors: [],
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.0",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			var d1 = [];
		    for (var i = 0; i <= 5; i += 1)
		        d1.push([parseInt(Math.random() * 30),i ]);

		    var d2 = [];
		    for (var i = 0; i <= 5; i += 1)
		        d2.push([parseInt(Math.random() * 30),i ]);

		    var d3 = [];
		    for (var i = 0; i <= 5; i += 1)
		        d3.push([ parseInt(Math.random() * 30),i]);

		    this.data = new Array();
		    this.data.push({
		        data: d1,
		        bars: {
		            horizontal:true, 
		            show: true, 
		            barWidth: 0.2, 
		            order: 1
		        }
		    });
			this.data.push({
			    data: d2,
			    bars: {
			        horizontal:true, 
			        show: true, 
			        barWidth: 0.2, 
			        order: 2
			    }
			});
			this.data.push({
			    data: d3,
			    bars: {
			        horizontal:true, 
			        show: true, 
			        barWidth: 0.2, 
			        order: 3
			    }
			});

			this.plot = $.plot($("#chart_horizontal_bars"), this.data, this.options);
		}
	},

	// pie chart
	chart_pie:
	{
		// chart data
		data: [
		    { label: "African/ Black",  data: 38 },
		    { label: "Caucasian",  data: 23 },
		    { label: "European",  data: 15 },
		    { label: "Spanish/Latin",  data: 9 },
		    { label: "Asian",  data: 12 },
		    { label: "Indian",  data: 3 }
		],

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			series: {
				pie: { 
					show: true,
					highlight: {
						opacity: 0.1
					},
					radius: 1,
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2,
				    combine: {
	                    color: '#353535',
	                    threshold: 0.05
	                },
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div class="label label-inverse">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
	                    }
	                }
				},
				grow: {	active: false}
			},
			colors: [],
			legend:{show:false},
			grid: {
	            hoverable: true,
	            clickable: true,
	            backgroundColor : { }
	        },
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			this.plot = $.plot($("#chart_pie"), this.data, this.options);
		},
		setData: function(dataArr)
		{
			charts.utility.applyStyle(this);

			this.plot = $.plot($("#chart_pie"), dataArr, this.options);
		}
	},

	
	//length pie chart
	chart_length_pie:
	{
		// chart data
		data: [
		    { label: "Very Short",  data: 38 },
		    { label: "Short",  data: 23 },
		    { label: "Medium",  data: 15 },
		    { label: "Long",  data: 19 },
		    { label: "Very Long",  data: 12 }
		   
		],

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			series: {
				pie: { 
					show: true,
					highlight: {
						opacity: 0.1
					},
					radius: 1,
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2,
				    combine: {
	                    color: '#353535',
	                    threshold: 0.05
	                },
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div class="label label-inverse">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
	                    }
	                }
				},
				grow: {	active: false}
			},
			colors: [],
			legend:{show:false},
			grid: {
	            hoverable: true,
	            clickable: true,
	            backgroundColor : { }
	        },
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.1"+"%",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			this.plot = $.plot($("#chart_length_pie"), this.data, this.options);
		},
		setData: function(dataArr)
		{
			charts.utility.applyStyle(this);

			this.plot = $.plot($("#chart_length_pie"), dataArr, this.options);
		}
	},
	
	//Texture pie chart
	chart_tex_pie:
	{
		// chart data
		data: [
		    { label: "1a",  data: 38 },
		    { label: "2a",  data: 23 },
		    { label: "2b",  data: 15 },
		    { label: "2c",  data: 9 },
		    { label: "3a",  data: 12 },
		    { label: "3b",  data: 3 },
			 { label: "3c",  data: 9 },
		    { label: "4a",  data: 12 },
		    { label: "4b",  data: 3 },
		    { label: "4c",  data: 3 }
		],

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			series: {
				pie: { 
					show: true,
					highlight: {
						opacity: 0.1
					},
					radius: 1,
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2,
				    combine: {
	                    color: '#353535',
	                    threshold: 0.05
	                },
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div class="label label-inverse">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
	                    }
	                }
				},
				grow: {	active: false}
			},
			colors: [],
			legend:{show:false},
			grid: {
	            hoverable: true,
	            clickable: true,
	            backgroundColor : { }
	        },
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.1"+"%",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			this.plot = $.plot($("#chart_tex_pie"), this.data, this.options);
		},
		setData: function(dataArr)
		{
			charts.utility.applyStyle(this);

			this.plot = $.plot($("#chart_tex_pie"), dataArr, this.options);
		}
	},
	
	//Process pie chart
	chart_process_pie:
	{
		// chart data
		data: [
		    { label: "Colored Hair",  data: 38 },
		    { label: "Relaxed Straight",  data: 23 },
		    { label: " Permed Curly",  data: 15 }
		],

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			series: {
				pie: { 
					show: true,
					highlight: {
						opacity: 0.1
					},
					radius: 1,
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2,
				    combine: {
	                    color: '#353535',
	                    threshold: 0.05
	                },
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div class="label label-inverse">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
	                    }
	                }
				},
				grow: {	active: false}
			},
			colors: [],
			legend:{show:false},
			grid: {
	            hoverable: true,
	            clickable: true,
	            backgroundColor : { }
	        },
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.1"+"%",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			this.plot = $.plot($("#chart_process_pie"), this.data, this.options);
		},
		setData: function(dataArr)
		{
			charts.utility.applyStyle(this);

			this.plot = $.plot($("#chart_process_pie"), dataArr, this.options);
		}
	},
	//Condition pie chart
	chart_condition_pie:
	{
		// chart data
		data: [
		    { label: "Oily Scalp",  data: 38 },
		    { label: "Pattern Baldness",  data: 23 },
		    { label: "Alopecia",  data: 15 },
		    { label: "Grey Hair",  data: 9 },
		    { label: "Split Ends",  data: 12 },
		    { label: "Normal",  data: 3 }
		],

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			series: {
				pie: { 
					show: true,
					highlight: {
						opacity: 0.1
					},
					radius: 1,
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2,
				    combine: {
	                    color: '#353535',
	                    threshold: 0.05
	                },
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div class="label label-inverse">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
	                    }
	                }
				},
				grow: {	active: false}
			},
			colors: [],
			legend:{show:false},
			grid: {
	            hoverable: true,
	            clickable: true,
	            backgroundColor : { }
	        },
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.1"+"%",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			this.plot = $.plot($("#chart_condition_pie"), this.data, this.options);
		},
		setData: function(dataArr)
		{
			charts.utility.applyStyle(this);

			this.plot = $.plot($("#chart_condition_pie"), dataArr, this.options);
		}
	},
	
	
	//Hair Style pie chart
	chart_hstyle_pie:
	{
		// chart data
		data: [
		    { label: "Weave",  data: 38 },
		    { label: "Relaxed Straight Hair",  data: 23 },
		    { label: "Braids",  data: 15 },
		    { label: "Wigs",  data: 9 },
		    { label: "Dreds",  data: 12 },
		    { label: "Permed/Texturized Hair",  data: 3 },
			{ label: "Naturally Curly Hair",  data: 12 },
			{ label: "Naturally Straight Hair",  data: 12 }
		],

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			series: {
				pie: { 
					show: true,
					highlight: {
						opacity: 0.1
					},
					radius: 1,
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2,
				    combine: {
	                    color: '#353535',
	                    threshold: 0.05
	                },
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div class="label label-inverse">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
	                    }
	                }
				},
				grow: {	active: false}
			},
			colors: [],
			legend:{show:false},
			grid: {
	            hoverable: true,
	            clickable: true,
	            backgroundColor : { }
	        },
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.1"+"%",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			this.plot = $.plot($("#chart_hstyle_pie"), this.data, this.options);
		},
		setData: function(dataArr)
		{
			charts.utility.applyStyle(this);

			this.plot = $.plot($("#chart_hstyle_pie"), dataArr, this.options);
		}
	},
	//Description pie chart
	chart_des_pie:
	{
		// chart data
		data: [
		    { label: "Coarse",  data: 38 },
		    { label: "Soft",  data: 23 },
		    { label: "Fine",  data: 15 },
		    { label: "Thin",  data: 9 }
		],

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			series: {
				pie: { 
					show: true,
					highlight: {
						opacity: 0.1
					},
					radius: 1,
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2,
				    combine: {
	                    color: '#353535',
	                    threshold: 0.05
	                },
	                label: {
	                    show: true,
	                    radius: 1,
	                    formatter: function(label, series){
	                        return '<div class="label label-inverse">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
	                    }
	                }
				},
				grow: {	active: false}
			},
			colors: [],
			legend:{show:false},
			grid: {
	            hoverable: true,
	            clickable: true,
	            backgroundColor : { }
	        },
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.1"+"%",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			this.plot = $.plot($("#chart_des_pie"), this.data, this.options);
		},
		setData: function(dataArr)
		{
			charts.utility.applyStyle(this);

			this.plot = $.plot($("#chart_des_pie"), dataArr, this.options);
		}
	},
	
	
	
	// stacked bars chart
	chart_stacked_bars:
	{
		// chart data
		data: null,

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			grid: {
				show: true,
			    aboveData: false,
			    color: "#3f3f3f" ,
			    labelMargin: 5,
			    axisMargin: 0, 
			    borderWidth: 0,
			    borderColor:null,
			    minBorderMargin: 5 ,
			    clickable: true, 
			    hoverable: true,
			    autoHighlight: true,
			    mouseActiveRadius: 20,
			    backgroundColor : { }
			},
	        series: {
	        	grow: {active:false},
	        	stack: 0,
                lines: { show: false, fill: true, steps: false },
                bars: { show: true, barWidth: 0.5, fill:1}
		    },
	        xaxis: {ticks:11, tickDecimals: 0},
	        legend: { position: "ne" },
	        colors: [],
	        shadowSize:1,
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.0",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			var d1 = [];
		    for (var i = 0; i <= 10; i += 1)
		        d1.push([i, parseInt(Math.random() * 30)]);
		 
		    var d2 = [];
		    for (var i = 0; i <= 10; i += 1)
		        d2.push([i, parseInt(Math.random() * 20)]);
		 
		    var d3 = [];
		    for (var i = 0; i <= 10; i += 1)
		        d3.push([i, parseInt(Math.random() * 20)]);
		 
		    this.data = new Array();
		 
		    this.data.push({
		     	label: "Data One",
		        data: d1
		    });
		    this.data.push({
		    	label: "Data Two",
		        data: d2
		    });
		    this.data.push({
		    	label: "Data Three",
		        data: d3
		    });

		    this.plot = $.plot($("#chart_stacked_bars"), this.data, this.options);
		},
		setData: function(dataArr)
		{
			charts.utility.applyStyle(this);

			this.plot = $.plot($("#chart_stacked_bars"), dataArr, this.options);
		}
	},

	// live chart
	chart_live:
	{
		// chart data
		data: [],
		totalPoints: 300,
	    updateInterval: 200,

		// we use an inline data source in the example, usually data would
	    // be fetched from a server
		getRandomData: function()
		{
			if (this.data.length > 0)
	            this.data = this.data.slice(1);

	        // do a random walk
	        while (this.data.length < this.totalPoints) 
		    {
	            var prev = this.data.length > 0 ? this.data[this.data.length - 1] : 50;
	            var y = prev + Math.random() * 10 - 5;
	            if (y < 0)
	                y = 0;
	            if (y > 100)
	                y = 100;
	            this.data.push(y);
	        }

	        // zip the generated y values with the x values
	        var res = [];
	        for (var i = 0; i < this.data.length; ++i)
	            res.push([i, this.data[i]])
	        return res;
		},

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			series: { 
	        	grow: { active: false },
	        	shadowSize: 0,
	        	lines: {
            		show: true,
            		fill: true,
            		lineWidth: 2,
            		steps: false
	            }
	        },
	        grid: {
				show: true,
			    aboveData: false,
			    color: "#3f3f3f",
			    labelMargin: 5,
			    axisMargin: 0, 
			    borderWidth: 0,
			    borderColor:null,
			    minBorderMargin: 5 ,
			    clickable: true, 
			    hoverable: true,
			    autoHighlight: false,
			    mouseActiveRadius: 20,
			    backgroundColor : { }
			}, 
			colors: [],
	        tooltip: true,
			tooltipOpts: {
				content: "Value is : %y.0",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			},	
	        yaxis: { min: 0, max: 100 },
	        xaxis: { show: true}
		},
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			this.plot = $.plot($("#chart_live"), [ this.getRandomData() ], this.options);
			setTimeout(this.update, charts.chart_live.updateInterval);
		},

		// update
		update: function()
		{
			charts.chart_live.plot.setData([ charts.chart_live.getRandomData() ]);
	        charts.chart_live.plot.draw();
	        
	        setTimeout(charts.chart_live.update, charts.chart_live.updateInterval);
		},
		updateLive: function()
		{
			charts.chart_live.plot.setData([ charts.chart_live.getRandomData() ]);
	        charts.chart_live.plot.draw();
	        
	        setTimeout(charts.chart_live.update, charts.chart_live.updateInterval);
		}
	}
};