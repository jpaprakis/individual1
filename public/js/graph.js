var x = parseInt(document.getElementById("x").value);
var y= parseInt(document.getElementById("y").value);
var z = parseInt(document.getElementById("z").value);
var m = parseInt(document.getElementById("m").value);

$.jqplot('chartdiv',  
	[[['Technology', x], ['Travel',y], ['Health',z], ['Education',m]]], 
	{series:
		[{renderer:$.jqplot.PieRenderer, 
			rendererOptions: {
		          // Put data labels on the pie slices.
		          // By default, labels show the percentage of the slice.
          		showDataLabels: true
        	}
    	}],
    	legend: { show:true, location: 'e' }
	}
);