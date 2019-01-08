var danger_speed = 10;
var danger_water_level = 10;
var speed = 0;
var myChart;
var date = new Array(), water_level = new Array();
var file = new XMLHttpRequest();
var data = new XMLHttpRequest();

function convertTS(ts) {
  var ts = new Date(ts*1000);
  return ts.getHours()+":"+ts.getMinutes()+":"+ts.getSeconds();
};

file.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		var text = this.responseText;
		var data = text.split("\n");
		data = data.slice(0, -1);
		var length = data.length;
		if(length > 60) length = 60;
		speed = data[2] - data[0] ;
		for(var i = length-1; i > -1; i--){
			if(i%2) date.push(data[i]);
			else water_level.push(Number(data[i]));
		}
		myChart = new Chart(document.getElementById("chartjs-0"),	{"type":"line",	"data":{"labels":date, "datasets":[{"label":"ποσοστό πληρότητας (%)", "data":water_level, "fill":false, "borderColor":"aqua", "lineTension":0.1}]}, "options":{scales: {yAxes: [{ ticks: { beginAtZero:true }}]} }});

		if(speed >= danger_speed && water_level[length/2-1] <= danger_water_level) alert("πιθανή διακοπή νερού")
		else if (speed >= danger_speed && water_level[length/2-1] <= 50) alert("επικίνδυνη ταχύτητα πτώσης νερού")
		else if(water_level[length/2-1] <= danger_water_level) alert("πολύ χαμηλή στάθμη νερού")
		var current_water_level = water_level[length/2-1].toString()+"%";
		document.getElementById("water").style.height = current_water_level;
    }
};
file.open("GET", "data.txt", true);
file.send();

data.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var data = this.responseText.split(",");
    data[1] = convertTS(data[1]);
    var length = water_level.length;
    if (data[1] == date[length-1]) return;
    date.shift();
    water_level.shift();
    date.push(data[1]);
    water_level.push(Number(data[0]));
    speed = water_level[length-2] - water_level[length-1];
    myChart.data.labels = date;
    myChart.data.datasets[0].data = water_level;
    myChart.update();
    if(speed >= danger_speed && water_level[length-1] <= danger_water_level) alert("πιθανή διακοπή νερού")
    else if (speed >= danger_speed && water_level[length-1] <= 50) alert("επικίνδυνη ταχύτητα πτώσης νερού")
    else if(water_level[length-1] <= danger_water_level) alert("πολύ χαμηλή στάθμη νερού")
    var current_water_level = water_level[length-1].toString()+"%";
    document.getElementById("water").style.height = current_water_level;
    $.ajax({
      type: 'POST',
      url: "./write_sensor_data.php",//url of receiver file on server
      data: {date: data[1], water_level: water_level[length-1].toString()}, //your data
    });
  }
};

setInterval(function(){
  data.open("GET", "last.txt", true);
  data.send();
}, 1000);
