var todayDate = new Date();
//google.load('visualization', '1', {
//    packages : [ 'table' ]
//});
//google.load("visualization", "1", {
//    packages:["corechart"]
//});

jQuery(function() {
    jQuery("#startdate").datepicker({
        maxDate : todayDate
    });
    $("#enddate").datepicker({
        minDate : $('#startDate').val(),
        maxDate : todayDate,
        onSelect : function(dateText, inst) {
            get_keyword();
        }
    });

    $("#statistics").tabs();
});
$(document).ready(function() {
    get_keyword();      
});

function get_keyword() {
    $.ajax({
        //        url : "http://localhost:8888/googleplay_seo/index.php/compete/get_keyword",
        //		url : "http://ec2-54-251-4-64.ap-southeast-1.compute.amazonaws.com/googleplay_seo/index.php/compete/get_keyword",
        url : getRootUrl() + "/googleplay_seo/index.php/compete/get_keyword",
	
        type : "POST",
        data : {
            'startdate' : $('#startdate').val(),
            'enddate' : $('#enddate').val()
        },
        dataType : "json",
        success : function(result) {
            console.log(result);
            google.setOnLoadCallback(statistics(result));
        }
    });
}
function statistics(result) {
    var end = result.end;
    var start = result.start;
    var today = result.today;
    var reg = result.reg;
    var sum_start = result.sum_start;
    var sum_end = result.sum_end;
    var sum_reg = result.sum_reg;
    
    var data = result.keyword_rank; //download counter
	
    var summaryTable = new google.visualization.DataTable();// keywword compete
    var summaryTable2 = new google.visualization.DataTable();// keywword compete
    
    // summary
    var insideTable = new google.visualization.DataTable();// keyword compete
    var insideTable2 = new google.visualization.DataTable();// keyword compete
    // inside
    var summaryData = [];
    var insideData = [];

    for ( var i = 0; i < end.length; i++) {
        summaryData[i] = new Array();
        insideData[i] = new Array();
		
        summaryData[i][0] = end[i].keyword_id;
        summaryData[i][2] = end[i].keyword;
        summaryData[i][8] = end[i].keyword_specify_flag
        
        
        insideData[i][0] = end[i].keyword_id;
        insideData[i][2] = end[i].keyword;
        insideData[i][8] = end[i].keyword_specify_flag;
        
        
		
        // get register day ranking
        var exist = false;
        for ( var j = 0; j < reg.length; j++) {
            if (reg[j].keyword_id == end[i].keyword_id) {
                summaryData[i][3] = reg[j].insert_date;//co the trong bang reg bi thieu
                summaryData[i][4] = reg[j].search_view_rank;
                insideData[i][3] = reg[j].insert_date;
                exist = true;
                break;
            }
        }
        if (!exist) {
            summaryData[i][3] = '-';
            summaryData[i][4] = "-";
            insideData[i][3] = '-';
        }
        
        // get start day keyword ranking
        exist = false;
        for ( var j = 0; j < start.length; j++) {
            if (start[j].keyword_id == end[i].keyword_id) {
                summaryData[i][5] = start[j].keyword_rank;
                exist = true;
                break;
            }
        }
        if (!exist) {
            summaryData[i][5] = '-';
        }
		
        // get today keyword download number
        exist = false;
        for ( var j = 0; j < today.length; j++) {
            if (today[j].keyword_id == end[i].keyword_id) {
                //				summaryData[i][8] = 0;
                summaryData[i][1] = today[j].search_view_rank;
				
                insideData[i][1] = today[j].search_view_rank;
                exist = true;
                break;
            }
        }
        if (!exist) {
            //			summaryData[i][8] = '-';
            summaryData[i][1] = '-';
            insideData[i][1] = '-';
        }
        
        /*****************start of summary counter********************/
        //get summary counter registration date
        exist = false;
        for ( var j = 0; j < sum_reg.length; j++) {
            if (sum_reg[j].keyword_id == end[i].keyword_id){	
                insideData[i][4] = sum_reg[j].sum_key_counter;
                exist = true;
                break;
            }
        }
        if (!exist) {
            insideData[i][4] = '-';
        }
        // get start day keyword ranking
        exist = false;
        for ( var j = 0; j < sum_end.length; j++) {
            if (sum_end[j].keyword_id == end[i].keyword_id) {
                insideData[i][5] = sum_end[j].sum_key_counter;
                exist = true;
                break;
            }
        }
        if (!exist) {
            insideData[i][5] = '-';
        }
		 
        
        //get summary counter star date
        exist = false;
        for ( var j = 0; j < sum_start.length; j++) {
            if (sum_start[j].keyword_id == end[i].keyword_id){	
                insideData[i][6] = sum_start[j].sum_key_counter;
                exist = true;
                break;
            }
        }
        
        if (!exist) {
            insideData[i][6] = '-';
        }
        /*****************end of summary counter********************/
        
        summaryData[i][6] = end[i].search_view_rank;
        var s = summaryData[i][5] == '' ? 0 : summaryData[i][5];
        var e = summaryData[i][6] == '' ? 0 : summaryData[i][6];
        summaryData[i][7] = e - s;
		
        s = insideData[i][5] == '-' ? 0 : insideData[i][5];
        e = insideData[i][6] == '-' ? 0 : insideData[i][6];
        insideData[i][7] = e - s;
    }

    // data
    summaryTable.addColumn('string', 'keyword_id'); // 0
    summaryTable.addColumn('string', 'Keyword ranking'); // 1
    summaryTable.addColumn('string', 'Keyword'); // 2
    summaryTable.addColumn('string', 'register day'); // 3
    summaryTable.addColumn('string', 'register day ranking');// 4
    summaryTable.addColumn('string', 'start day ranking'); // 5
    summaryTable.addColumn('string', 'end day ranking'); // 6
    summaryTable.addColumn('number', 'Dif'); // 7
    summaryTable.addColumn('string', 'specific_flag'); // 8
    
    //	summaryTable.addColumn('string', 'download counter'); // 8
    //draw table summary 1
    drawTable(summaryTable, summaryData, 'summary_table1', [ 0 , 8]);
    
    var summaryData2 = new Array();
    var j = 0;
    for(var i = 0; i < summaryData.length; i++){
        if(summaryData[i][8] == '1'){
            summaryData2[j++] = summaryData[i];
        }
    }
    summaryTable2.addColumn('string', 'keyword_id'); // 0
    summaryTable2.addColumn('string', 'Keyword ranking'); // 1
    summaryTable2.addColumn('string', 'Keyword'); // 2
    summaryTable2.addColumn('string', 'register day'); // 3
    summaryTable2.addColumn('string', 'register day ranking');// 4
    summaryTable2.addColumn('string', 'start day ranking'); // 5
    summaryTable2.addColumn('string', 'end day ranking'); // 6
    summaryTable2.addColumn('number', 'Dif'); // 7
    summaryTable2.addColumn('string', 'specific_flag'); // 8
    drawTable(summaryTable2, summaryData2, 'summary_table2', [ 0 , 8]);


    insideTable.addColumn('string', 'keyword_id'); 			// 0
    insideTable.addColumn('string', 'Keyword ranking'); 	//1
    insideTable.addColumn('string', 'Keyword'); 			//2
    insideTable.addColumn('string', 'Register day'); 		// 3
    insideTable.addColumn('string', 'Registration date summary counter'); 		// 4
    insideTable.addColumn('string', 'Last summary counter'); 	// 5
    insideTable.addColumn('string', 'Current summary counter');	// 6
    insideTable.addColumn('number', 'Dif'); 			//7				// 8
    insideTable.addColumn('string', 'specific_flag'); 		//8				// 8
	
        
    drawTable(insideTable, insideData, 'details_table1', [ 0, 8 ]);
    var insideData2 = new Array();
    var j = 0;
    for(var i = 0; i < insideData.length; i++){
        if(summaryData[i][8] == '1'){
            insideData2[j++] = insideData[i];
        }
    }
    insideTable2.addColumn('string', 'keyword_id'); 			// 0
    insideTable2.addColumn('string', 'Keyword ranking'); 	//1
    insideTable2.addColumn('string', 'Keyword'); 			//2
    insideTable2.addColumn('string', 'Register day'); 		// 3
    insideTable2.addColumn('string', 'Registration date summary counter'); 		// 4
    insideTable2.addColumn('string', 'Last summary counter'); 	// 5
    insideTable2.addColumn('string', 'Current summary counter');	// 6
    insideTable2.addColumn('number', 'Dif'); 			//7				// 8
    insideTable2.addColumn('string', 'specific_flag'); 		//8				// 8
	
    drawTable(insideTable, insideData2, 'details_table2', [ 0 , 8]);

    console.log(data);
    drawLineChart(data, 'graphic', 'keyword search ranking');
}

function drawLineChart(data, container, titles) {
    var dataLine = google.visualization.arrayToDataTable(data);

    var options = {
        title : titles,
        pointSize: 5,
        hAxis:  {title: 'Date',  titleTextStyle: {color: '#FF0000'}},
        vAxis: {title: 'search view number', titleTextStyle: {color: '#FF0000'},
            format: ''
        }
        
    };

    var chart = new google.visualization.LineChart(document
        .getElementById(container));
    chart.draw(dataLine, options);

}


function drawTable(data, summaryData, container, hiden) {

    if (data.getNumberOfRows() != 0)
        data.removeRows(0, data.getNumberOfRows());
    data.addRows(summaryData);
    var view = new google.visualization.DataView(data);
    view.hideColumns(hiden);
    var con = document.getElementById(container);
    var table = new google.visualization.Table(con);
    table.draw(view, {
        showRowNumber : true
    });

    // add listener when click on table row
    google.visualization.events.addListener(table, 'select', selectHandler);
    function selectHandler(e) {
        //        var link = "http://localhost:8888/googleplay_seo/index.php/compete/app_compete/";
        //		var link = "http://ec2-54-251-4-64.ap-southeast-1.compute.amazonaws.com/googleplay_seo/index.php/compete/app_compete/";
        var link = getRootUrl() + "/googleplay_seo/index.php/compete/app_compete/";
        onRowClickHandler(table, data, link, 0);
    }
}
function onRowClickHandler(table, data, link, index) {
    var selection = table.getSelection();
    var keyword_id = '';
    for ( var i = 0; i < selection.length; i++) {
        var item = selection[0];
        var row = item.row == null ? 0 : item.row;
        keyword_id = data.getFormattedValue(row, index);
    }
    link += keyword_id;
    // go to compete application
    window.location = link;
}

function getRootUrl() {
    var defaultPorts = {
        "http:":80,
        "https:":443
    };

    return window.location.protocol + "//" + window.location.hostname
    + (((window.location.port)
        && (window.location.port != defaultPorts[window.location.protocol]))
    ? (":"+window.location.port) : "");
}