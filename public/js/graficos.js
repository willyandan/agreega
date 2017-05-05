$(function() {
	graficoDesempenhoAnual()
});
function graficoDesempenhoAnual() {
	var options = {
    	responsive: true
    };

	var data = {
		labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
		datasets: [
			{
				label: "Ano Passado",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [20, 30, 20, 25, 28, 31, 35, 49, 50, 57, 60, 71]
            },
            {
            	label: "Ano Atual",
            	fillColor: "rgba(218, 68, 83, 0.2)",
            	strokeColor: "rgba(218, 68, 83, 1)",
            	pointColor: "rgba(218, 68, 83, 1)",
            	pointStrokeColor: "#fff",
            	pointHighlightFill: "#fff",
            	pointHighlightStroke: "rgba(218, 68, 83,1)",
            	data: [28, 48, 28, 30, 32, 35, 40, 55, 57, 62, 70, 81]
			}
		]
	};               
		
    window.onload = function(){
		var ctx = document.getElementById('graficoDesenpenhoEscolar').getContext("2d");
	    var LineChart = new Chart(ctx).Line(data, options);
	}
}