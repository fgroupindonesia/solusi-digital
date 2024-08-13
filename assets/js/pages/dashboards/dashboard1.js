/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
const MONTHS_LABEL = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];

//var dataMale = [2, 5, 2, 6, 2, 5, 2, 4]
//var dataMale = [2, 5, 2, 6, 2, 5, 2, 4, 2,1, 3, 3];
//var dataFemale = [2, 5, 2, 7, 1, 9, 1, 6, 2, 5, 2, 4];
var dataMale = [0];
var dataFemale = [0];
var urlNa = "/request-statistics";
var CALL_ROUTINE = 1;
var chartExist = document.getElementById('ct-visits');

function getDataStatistic(sex){

let dataIni = {'sex' : sex};
   
 $.ajax({
        url: urlNa,
        data: dataIni,
        cache : false,
        type: 'POST',
        success: function(data){
                 
            if(CALL_ROUTINE == 1){
              dataMale = JSON.parse(data);
              

              // continue
              CALL_ROUTINE++;
              secondCall();

            }else if(CALL_ROUTINE == 2) {
                dataFemale = JSON.parse(data);

                // end it
                CALL_ROUTINE = -1;
                if(chartExist){
                applyAnimationStatistics();
                    }
            }      

                          console.log('we got ' + data);

        }
    });

}

function firstCall(){
    getDataStatistic('male');
}

function secondCall(){
   getDataStatistic('female');
}

function getManyData(){
    let max = 0;

    if(dataMale.length != 0 || dataFemale != 0){
        if(dataMale.length > dataFemale.length){
            max = dataMale.length;
        }else{
            max = dataFemale.length;
        }
    }

    //console.log('total data is ' + max);
    return max;
}

function applyAnimationStatistics() {
    
 new Chartist.Line('#ct-visits', {
        labels: MONTHS_LABEL,
        series: [
            dataMale
            , dataFemale
        ]
    }, {
        top: getManyData()+1,
        low: 0,
        showPoint: true,
        fullWidth: true,
        plugins: [
            Chartist.plugins.tooltip()
        ],
        axisY: {
            onlyInteger : true,
            labelInterpolationFnc: function (value) {
                if(value > 1){
                    return value + ' users';
                }else {
                    return value + ' user';
                }   
            }
        },
        showArea: true
    });


}

$(function () {
    "use strict";

    CALL_ROUTINE = 1;
    setTimeout(firstCall, 1000);

    //ct-visits
       if(chartExist){
                applyAnimationStatistics();
                    }

    var chart = [chart];

    var sparklineLogin = function () {
        $('#sparklinedash').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '30',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#7ace4c'
        });
        $('#sparklinedash2').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '30',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#7460ee'
        });
        $('#sparklinedash3').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '30',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#11a0f8'
        });
        $('#sparklinedash4').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '30',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#f33155'
        });
    }
    var sparkResize;
    $(window).on("resize", function (e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparklineLogin, 500);
    });
    sparklineLogin();
});


