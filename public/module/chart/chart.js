$(document).ready(function(){
    //Chart.init();
});

window.Chart = {
    init: function(){
        google.load("visualization", "1", {packages:["corechart"]});
    },
    drawChart: function(data,id_name,caption){
        $("#container_chart").empty();
        $("#container_chart").html('<div id="'+id_name+'"></div>');
        var oldArr =[["Y","Value",{role:"style"}]];
        var data = google.visualization.arrayToDataTable($.merge(oldArr,data));
        var view = new google.visualization.DataView(data);
        //view.setColumns([0,1,{calc:"stringify",type:"string",role:"annotation"},2]);
        var options = {title:caption,width:1000,height:700,bar: {groupWidth: "95%"},legend:{position:"none"}};
        var chart = new google.visualization.ColumnChart(document.getElementById(id_name));
        chart.draw(view, options);
    }
};

window.Helper = {
    sendForm: function(id_form,id_chart_block,caption){
        $('#'+id_form).ajaxForm(function(e) {
            function callbackChart(){
                Chart.drawChart(JSON.parse(e),id_chart_block,caption);
            }
            callbackChart();
        });
    },
    chainBind: function(url){
        $("#city").remoteChained({
            parents : "#country",
            url : url
        });
        $("#place").remoteChained({
            parents : "#city",
            url : url
        });
    }
};