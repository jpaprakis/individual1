var x = parseInt(document.getElementById("tech").value);
var y= parseInt(document.getElementById("travel").value);
var z = parseInt(document.getElementById("health").value);
var m = parseInt(document.getElementById("education").value);
var q = parseInt(document.getElementById("finance").value);
$.jqplot('chartdiv',  
	[[['Technology', x], ['Travel',y], ['Health',z], ['Education',m], ['Finance',q]]], 
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